<?php

namespace App\Controllers;
use App\Models\PanierModel;

class Pan extends BaseController
{
    public function panier_dashboard(): string
    {
        $paniermodel = new PanierModel();
        $donnees["pan"] = $paniermodel->findAll();
        $donnees['session'] = session();  // Ajouter la session au tableau de données
        return view('panier_dashboard', $donnees);

        // return view('panier_dashboard');
    }

    public function delete_panier($id= null){
        $paniermodel = new PanierModel();

        if ($id != null) {
            $panier = $paniermodel->where('id', $id)->first();
    
            if ($panier) {
                if ($paniermodel->delete($id)) {
                    session()->setFlashdata('succes', 'Le panier a été supprimé avec succès.');
                    return redirect()->to(base_url('Pan'));
                } else {
                    session()->setFlashdata('error', 'La suppression du produit a échoué.');
                    return redirect()->back();
                }
            } else {
                return "Panier non trouvé.";
            }
        } else {
            return "ID de panier non fourni.";
        }
    }

}
