<?php

namespace App\Controllers;
use App\Models\ProduitModel;

class Article extends BaseController
{
    public function article(): string
    {
        $produitmodel = new ProduitModel();
        $donnees["articles"] = $produitmodel->findAll();
        return view('articles_view', $donnees);

        // return view('articles_view');
    }

}
