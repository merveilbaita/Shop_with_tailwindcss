<?php

namespace App\Controllers;
use App\Models\PanierModel;

class Pan extends BaseController
{
    public function panier_dashboard(): string
    {
        $paniermodel = new PanierModel();
        $donnees["pan"] = $paniermodel->findAll();
        return view('panier_dashboard', $donnees);

        // return view('panier_dashboard');
    }

}
