<?php
namespace App\Controllers;
use App\Models\ProduitModel;

class Acceuil extends BaseController
{
    public function main(): string
    {
        $produitmodel = new ProduitModel();

        // Récupérer tous les produits
        $tousLesProduits = $produitmodel->findAll();
        
        // Mélanger les produits pour obtenir un ordre aléatoire
        shuffle($tousLesProduits);
        
        // Sélectionner les trois premiers produits après mélange
        $produitsAleatoires = array_slice($tousLesProduits, 0, 3);
        
        // Passer les produits à la vue
        $data['articles'] = $produitsAleatoires;
        
        return view('index', $data);
    }

}

