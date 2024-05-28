<?php

namespace App\Controllers;
use App\Models\ProduitModel;

class Acceuil extends BaseController
{
    public function main(): string
    {

        $produitmodel = new ProduitModel();
        $donnees["articles"] = $produitmodel->findAll(3);
        return view('index', $donnees);
        
    }
}
