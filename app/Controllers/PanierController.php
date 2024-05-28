<?php

namespace App\Controllers;

use App\Models\ProduitModel;
use App\Models\PanierModel;
use CodeIgniter\HTTP\RedirectResponse;

class PanierController extends BaseController
{
    public function panier_view()
    {
        // Récupérer le panier depuis la session
        $panier = session()->get('panier');
        return view('panier_view', ['panier' => $panier]);
    }
    public function afficher_panier()
    {
        $session = session();
        $panier = $session->get('panier') ?? [];

        return view('panier_view', ['panier' => $panier]);
    }

    public function ajouter_au_panier(): RedirectResponse
    {
        $id_produit = $this->request->getPost('id_produit');
        $quantite = $this->request->getPost('quantite');

        $produitmodel = new ProduitModel();
        $article = $produitmodel->find($id_produit);

        if ($article && $quantite > 0) {
            $panier = session()->get('panier') ?? [];

            if (isset($panier[$id_produit])) {
                // Si le produit est déjà dans le panier, mettre à jour la quantité
                $panier[$id_produit]['quantite'] += $quantite;
            } else {
                // Sinon, ajouter le produit avec la désignation et l'identifiant
                $panier[$id_produit] = [
                    'id' => $id_produit, // Ajouter l'identifiant du produit
                    'designation' => $article['designation'],
                    'prix' => $article['prix'],
                    'quantite' => $quantite
                ];
            }

            session()->set('panier', $panier);

            return redirect()->to(base_url('panier_view'));
        } else {
            return redirect()->to(base_url('erreur'));
        }
    }


    public function vider_panier()
    {
        session()->remove('panier');
        return redirect()->to(base_url('panier_view'));
    }

    public function proceder_au_paiement(): RedirectResponse
    {
        if (!session()->has('user_id')) {
            return redirect()->to(base_url('Users'))->with('error', 'Veuillez vous connecter pour continuer le processus.');
        }

        $panier = session()->get('panier');
        $user_id = session()->get('user_id');
        $mail = session()->get('mail');
        $adresse = $this->request->getPost('adresse');
        $ville = $this->request->getPost('ville');
        $code_postal = $this->request->getPost('code_postal');
        $pays = $this->request->getPost('pays');

        if ($panier && $adresse && $ville && $code_postal && $pays) {
            $panierModel = new PanierModel();
            $produitModel = new ProduitModel();

            foreach ($panier as $produit_id => $details) {
                // Insérer la commande dans la base de données
                $panierModel->insert([
                    'user_id' => $user_id,
                    'mail' => $mail,
                    'produit_id' => $produit_id,
                    'designation' => $details['designation'],
                    'qte' => $details['quantite'],
                    'adresse' => $adresse,
                    'ville' => $ville,
                    'code_postal' => $code_postal,
                    'pays' => $pays
                ]);

                // Récupérer le produit de la base de données
                $produit = $produitModel->find($produit_id);

                // Vérifier si le produit a été trouvé
                if ($produit) {
                    // Calculer la nouvelle quantité
                    $nouvelle_quantite = $produit['qte'] - $details['quantite'];

                    // Vérifier si la nouvelle quantité est valide
                    if ($nouvelle_quantite < 0) {
                        return redirect()->to(base_url('panier_view'))->with('error', 'Stock insuffisant pour le produit : ' . $details['designation']);
                    }

                    // Mettre à jour la quantité du produit dans la base de données
                    $produitModel->update($produit_id, ['qte' => $nouvelle_quantite]);
                } else {
                    return redirect()->to(base_url('panier_view'))->with('error', 'Produit non trouvé : ' . $details['designation']);
                }
            }

            // Supposons que l'enregistrement a réussi
            session()->setFlashdata('success', 'Votre commande a été passée avec succès.');

            // Vider le panier après la commande
            session()->remove('panier');

            return redirect()->to(base_url('panier_view'))->with('success', 'Votre commande a été enregistrée.');
        } else {
            return redirect()->to(base_url('panier_view'))->with('error', 'Votre panier est vide ou les informations de livraison sont manquantes.');
        }
    }
    public function update_quantity()
    {
        $article_id = $this->request->getPost('article_id');
        $nouvelle_quantite = $this->request->getPost('quantite');

        // Récupérer le panier depuis la session
        $panier = session()->get('panier');

        foreach ($panier as &$article) {
            if ($article['id'] == $article_id) {

                $article['quantite'] = $nouvelle_quantite;
                break;
            }
        }

        // Mettre à jour le panier dans la session
        session()->set('panier', $panier);

        return redirect()->to(base_url('panier'));
    }

    // Suppression d'un article du panier
    public function remove_article()
    {
        $article_id = $this->request->getPost('article_id');

        // Récupérer le panier depuis la session
        $panier = session()->get('panier');

        // Filtrer les articles pour supprimer celui avec l'id correspondant
        $panier = array_filter($panier, function ($article) use ($article_id) {
            return $article['id'] != $article_id;
        });

        // Réindexer le tableau
        $panier = array_values($panier);

        // Mettre à jour le panier dans la session
        session()->set('panier', $panier);

        return redirect()->to(base_url('panier'));
    }
}
