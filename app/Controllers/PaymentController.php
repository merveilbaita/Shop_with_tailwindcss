<?php

namespace App\Controllers;

use Stripe\Stripe;
use Stripe\PaymentIntent;
use App\Models\PanierController;

class PaymentController extends BaseController
{
    public function __construct()
    {
        Stripe::setApiKey(getenv('STRIPE_SECRET_KEY'));
    }

    public function checkout()
    {
        $cart = session()->get('panier');
        if (!$cart) {
            return redirect()->to(base_url('panier_view'))->with('error', 'Votre panier est vide.');
        }

        // Calculer le total du panier
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['prix'] * $item['quantite'];
        }

        // Créer un PaymentIntent
        $paymentIntent = PaymentIntent::create([
            'amount' => $total * 100, // montant en centimes
            'currency' => 'usd',
            'metadata' => [
                'user_id' => session()->get('user_id'),
            ],
        ]);

        return view('checkout_view', [
            'clientSecret' => $paymentIntent->client_secret,
            'total' => $total,
        ]);
    }

    public function handlePayment()
    {
        $data = $this->request->getPost();

        // Vérifier si le paiement a été réussi
        if ($data['payment_status'] === 'succeeded') {
            // Enregistrer la commande dans la base de données
            $orderModel = new OrderModel();
            $orderData = [
                'user_id' => session()->get('user_id'),
                'amount' => $data['amount'],
                'status' => 'paid',
                'payment_intent' => $data['payment_intent'],
            ];
            $orderModel->insert($orderData);

            // Vider le panier
            session()->remove('panier');

            return redirect()->to(base_url('order_success'))->with('success', 'Paiement réussi. Merci pour votre achat!');
        } else {
            return redirect()->to(base_url('checkout'))->with('error', 'Le paiement a échoué. Veuillez réessayer.');
        }
    }
}
