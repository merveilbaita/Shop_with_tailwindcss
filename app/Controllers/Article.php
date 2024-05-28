<?php
namespace App\Controllers;
use App\Models\ProduitModel;

class Article extends BaseController
{
    public function article($categorie = null): string
    {
        $produitmodel = new ProduitModel();
        
        // Si une catégorie est spécifiée, filtrer les produits par catégorie
        if ($categorie) {
            $donnees["articles"] = $produitmodel->where('categories', $categorie)->findAll();
        } else {
            $donnees["articles"] = $produitmodel->findAll();
        }
        
        // Obtenir toutes les catégories distinctes pour l'affichage dans la vue
        $donnees["categories"] = $produitmodel->select('categories')->distinct()->findAll();
        
        return view('articles_view', $donnees);
    }
}
