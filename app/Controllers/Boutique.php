<?php 
namespace App\Controllers;
use App\Models\ProduitModel;

class Boutique extends BaseController
{
    public function boutique(): string
    {
        // Récupérer l'ID du produit à partir de la requête GET
        $id_produit = $this->request->getGet('id_produit');

        // Vérifier si l'ID du produit est valide
        if ($id_produit) {
            // Charger le modèle ProduitModel
            $produitmodel = new ProduitModel();

            // Récupérer les détails de l'article correspondant à partir de l'ID
            $article = $produitmodel->find($id_produit);

            // Vérifier si l'article existe
            if ($article) {
                // Envelopper l'article dans un tableau
                $data['article'] = [$article];

                // Récupérer des produits similaires (par exemple, par catégorie ou autre critère)
                $data['similaires'] = $this->getArticlesSimilaires($article);

                // Charger la vue boutique_views avec les données de l'article et des produits similaires
                return view('boutique_views', $data);
            } else {
                // Rediriger vers une page d'erreur si l'article n'existe pas
                return redirect()->to(base_url('erreur'));
            }
        } else {
            // Rediriger vers une page d'erreur si l'ID du produit n'est pas fourni
            return redirect()->to(base_url('erreur'));
        }
    }

    private function getArticlesSimilaires($article)
    {
        $produitmodel = new ProduitModel();

        // Exemple : Récupérer des produits similaires par catégorie, exclure le produit actuel
        return $produitmodel->where('categories', $article['categories'])
                            ->where('id_produit !=', $article['id_produit'])
                            ->findAll(3);  // Limiter à 3 produits similaires
    }
    
    public function ajouter_au_panier() {
        // Récupérer l'ID du produit à partir de la requête POST
        $id_produit = $this->request->getPost('id_produit');
    
        // Récupérer la quantité du produit à partir de la requête POST
        $quantite = $this->request->getPost('quantite');
    
        // Charger le modèle ProduitModel
        $produitmodel = new ProduitModel();
    
        // Récupérer les détails de l'article correspondant à partir de l'ID
        $article = $produitmodel->find($id_produit);
    
        // Vérifier si l'article existe et si la quantité est valide
        if ($article && $quantite > 0) {
            // Récupérer le panier actuel depuis la session
            $panier = session()->get('panier');
    
            // Ajouter l'article au panier
            $panier[$id_produit] = [
                'designation' => $article['designation'],
                'prix' => $article['prix'],
                'quantite' => $quantite
            ];
    
            // Mettre à jour le panier dans la session
            session()->set('panier', $panier);
    
            // Rediriger vers la vue du panier
            return redirect()->to(base_url('panier_view'));
        } else {
            // Rediriger vers une page d'erreur si l'article n'existe pas ou si la quantité est invalide
            return redirect()->to(base_url('erreur'));
        }
    }
}
