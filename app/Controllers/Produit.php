<?php

namespace App\Controllers;
use App\Models\ProduitModel;

class Produit extends BaseController
{
    public function add_product(): string
    {

        $produitmodel = new ProduitModel();
        $donnees["products"] = $produitmodel->findAll();
        return view('produit_view', $donnees);
        // return view('produit_view');
    }

    public function ajout_produit() {
        // Récupère les données postées depuis un formulaire
        $session = session();
        $user_entry = $this->request->getPost();
    
        // Récupère le fichier téléchargé
        $file = $this->request->getFile('img');
    
        // Vérifie si un fichier a été téléchargé
        if ($file !== null) {
            // Vérifie s'il n'y a pas d'erreurs lors du téléchargement du fichier
            if ($file->isValid() && !$file->hasMoved()) {
                // Lit le contenu du fichier téléchargé
                $imgData = file_get_contents($file->getTempName());
    
                // Ajoute le contenu du fichier à l'entrée utilisateur
                $user_entry['img'] = $imgData;
            }
        }
    
        $produitmodel = new ProduitModel();
        $produitmodel->insert($user_entry);
        session()->setFlashdata('success', 'Le produit a été enregistré avec succès.');
    
        // Redirige vers une autre page après l'ajout du produit
        return redirect()->to(base_url('Produit'));
    }

        public function modifier_produit($id = null): string {
        $produitmodel = new ProduitModel();

        if ($id != null) {
            $produit = $produitmodel->where('id_produit', $id)->first();

            if ($produit) {
                return view('modifier_produit_view', ['produit' => $produit]);
            } else {
                return "Produit non trouvé.";
            }
        } else {
            return "ID de produit non fourni.";
        }
    }

    public function update_produit() {
        $produitmodel = new ProduitModel();

        $id = $this->request->getPost('id_produit');
        $data = [
            'designation' => $this->request->getPost('designation'),
            'description' => $this->request->getPost('description'),
            'description_courte' => $this->request->getPost('description_courte'),
            'prix' => $this->request->getPost('prix'),
            'qte' => $this->request->getPost('qte'),
            'categories' => $this->request->getPost('categories')
        ];

        if ($produitmodel->update($id, $data)) {
            session()->setFlashdata('success', 'Le produit a été mis à jour avec succès.');
            return redirect()->to(base_url('Produit'));
        } else {
            session()->setFlashdata('error', 'La mise à jour du produit a échoué.');
            return redirect()->back();
        }
    }

    public function delete_product($id = null) {
        $produitmodel = new ProduitModel();
    
        if ($id != null) {
            $produit = $produitmodel->where('id_produit', $id)->first();
    
            if ($produit) {
                if ($produitmodel->delete($id)) {
                    session()->setFlashdata('succes', 'Le produit a été supprimé avec succès.');
                    return redirect()->to(base_url('Produit'));
                } else {
                    session()->setFlashdata('error', 'La suppression du produit a échoué.');
                    return redirect()->back();
                }
            } else {
                return "Produit non trouvé.";
            }
        } else {
            return "ID de produit non fourni.";
        }
    }
}


