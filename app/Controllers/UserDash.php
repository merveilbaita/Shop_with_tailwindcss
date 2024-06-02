<?php

namespace App\Controllers;
use App\Models\UserModel;

class UserDash extends BaseController
{
    public function users_dash(): string
    {
        $usermodel = new UserModel();
        $donnees["users"] = $usermodel->findAll();
        $donnees['session'] = session();  // Ajouter la session au tableau de données
        return view('user_dashboard', $donnees);

        // return view('user_dashboard');
    }

    public function delete_user($user_id = null){
        $usermodel = new UserModel();

        if ($user_id != null) {
            $user = $usermodel->where('user_id', $user_id)->first();
    
            if ($user) {
                if ($usermodel->delete($user_id)) {
                    session()->setFlashdata('succes', 'L utilisateur à été supprimer.');
                    return redirect()->to(base_url('UserDash'));
                } else {
                    session()->setFlashdata('error', 'La suppression de l utilisateur a échoué.');
                    return redirect()->back();
                }
            } else {
                return "User non trouvé.";
            }
        } else {
            return "ID de l user non fourni.";
        }
    }

}
