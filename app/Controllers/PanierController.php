<?php
namespace App\Controllers;

use App\Models\ProduitModel;
use App\Models\PanierModel;
use App\Models\CommandeModel;
use CodeIgniter\HTTP\RedirectResponse;

class PanierController extends BaseController
{
    public function panier_view()
    {
        // Récupérer le panier depuis la session
        $panier = session()->get('panier');
        echo view('panier_view', ['panier' => $panier, 'quantite_totale' => $this->countPanierItems()]);
    }

    public function afficher_panier()
    {
        $session = session();
        $panier = $session->get('panier') ?? [];
        echo view('panier_view', ['panier' => $panier, 'quantite_totale' => $this->countPanierItems()]);
    }

    public function ajouter_au_panier()
    {
        // Vérifier que l'utilisateur est connecté
        if (!session()->has('user_id')) {
            return redirect()->to(base_url('Users'))->with('error', 'Veuillez vous connecter pour continuer le processus.');
        }

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
                    'id' => $id_produit,
                    'designation' => $article['designation'],
                    'prix' => $article['prix'],
                    'quantite' => $quantite,
                ];
            }
            session()->set('panier', $panier);

            // Compter les articles dans le panier
            $quantiteTotale = array_sum(array_column($panier, 'quantite'));

            return $this->response->setJSON(['status' => 'success', 'quantite_totale' => $quantiteTotale]);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Erreur lors de l\'ajout au panier.']);
        }
    }

    public function compter_articles_panier()
    {
        $panier = session()->get('panier') ?? [];
        $quantiteTotale = array_sum(array_column($panier, 'quantite'));
        return $this->response->setJSON(['quantite_totale' => $quantiteTotale]);
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
        $commandeModel = new CommandeModel();

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
                'pays' => $pays,
                'date_ajout' => date('Y-m-d H:i:s')
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

        // Sauvegarder le contenu du panier dans une session
        session()->set('last_order_cart_' . $user_id, $panier);

        // Vider le panier après la commande
        session()->remove('panier');

        // Supposons que l'enregistrement a réussi
        session()->setFlashdata('success', 'Votre commande a été passée avec succès.');

        return redirect()->to(base_url('panier_view'))->with('success', 'Votre commande a été enregistrée.');
    } else {
        return redirect()->to(base_url('panier_view'))->with('error', 'Votre panier est vide ou les informations de livraison sont manquantes.');
    }
}


    public function update_quantite()
    {
        // Récupérer l'ID de l'article et la nouvelle quantité depuis la requête POST
        $articleId = $this->request->getPost('article_id');
        $nouvelleQuantite = $this->request->getPost('quantite');

        // Charger le modèle du panier ou effectuer la mise à jour directement
        $panier = session()->get('panier');

        if (isset($panier[$articleId])) {
            $panier[$articleId]['quantite'] = $nouvelleQuantite;
            session()->set('panier', $panier);
            return $this->response->setJSON(['status' => 'success']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Article non trouvé']);
        }
    }

    public function remove_article()
    {
        $article_id = $this->request->getPost('article_id');

        // Récupérer le panier depuis la session
        $panier = session()->get('panier');

        if (isset($panier[$article_id])) {
            unset($panier[$article_id]);
            session()->set('panier', $panier);
            return $this->response->setJSON(['status' => 'success']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Article non trouvé']);
        }
    }

    public function cart()
    {
        // Vérifier que l'utilisateur est connecté
        if (!session()->has('user_id')) {
            return redirect()->to(base_url('Users'))->with('error', 'Veuillez vous connecter pour voir votre dernier panier.');
        }

        // Obtenir l'identifiant de l'utilisateur connecté
        $user_id = session()->get('user_id');

        // Obtenir le dernier panier commandé depuis la session avec l'identifiant de l'utilisateur
        $last_order_cart = session()->get('last_order_cart_' . $user_id);

        if ($last_order_cart) {
            echo view('cart', ['panier' => $last_order_cart, 'quantite_totale' => $this->countPanierItems()]);
        } else {
            return redirect()->to(base_url('panier_view'))->with('error', 'Aucun panier trouvé.');
        }
    }

    protected function countPanierItems()
    {
        $panier = session()->get('panier') ?? [];
        return array_sum(array_column($panier, 'quantite'));
    }

    public function mes_commandes()
    {
        // Vérifier que l'utilisateur est connecté
        if (!session()->has('user_id')) {
            return redirect()->to(base_url('Users'))->with('error', 'Veuillez vous connecter pour voir vos commandes.');
        }
    
        // Obtenir l'identifiant de l'utilisateur connecté
        $user_id = session()->get('user_id');
    
        // Charger les commandes de l'utilisateur depuis la table panier
        $panierModel = new PanierModel();
        $commandes = $panierModel->where('user_id', $user_id)->orderBy('date_ajout', 'DESC')->findAll();
    
        echo view('commandes_utilisateur', ['commandes' => $commandes]);
    }
    

}
