<?php

namespace App\Controllers;
use App\Models\PanierModel;
use App\Models\ProduitModel;
use App\Models\UserModel;

class Dashboard_view_controlleur extends BaseController
{
    public function dashboard_view(): string
    {
        $produitmodel = new ProduitModel();
        $donnees["total_produit"] = count($produitmodel->findAll());
        $paniermodel = new PanierModel();
        $donnees["panier"] = count($paniermodel->findAll());
        $usermodel = new UserModel();
        $donnees["total_user"] = count($usermodel->findAll());
        return view('dashboard_view', $donnees);

    }
}