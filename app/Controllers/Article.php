<?php
namespace App\Controllers;
use App\Models\ProduitModel;

class Article extends BaseController
{
    public function article($categorie = null): string
    {
        $produitmodel = new ProduitModel();
        
        if ($categorie) {
            $donnees["articles"] = $produitmodel->where('categories', $categorie)->findAll();
        } else {
            $donnees["articles"] = $produitmodel->findAll();
        }
        
        $donnees["categories"] = $produitmodel->select('categories')->distinct()->findAll();
        
        return view('articles_view', $donnees);
    }

    // Ajoutez cette méthode pour la recherche
    public function search()
    {
        $produitmodel = new ProduitModel();
        $query = $this->request->getGet('query');
        
        $donnees["articles"] = $produitmodel->searchProducts($query);
        $donnees["categories"] = $produitmodel->select('categories')->distinct()->findAll();
        
        return view('articles_view', $donnees);
    }
}
