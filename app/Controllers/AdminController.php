<?php
namespace App\Controllers;

use App\Models\AdminModel;

class AdminController extends BaseController
{
    public function admin(): string
    {
        return view('admin');
    }

    public function admin_connect()
    {
        $username = $this->request->getPost('username_admin');
        $password = $this->request->getPost('password_admin');

        $adminModel = new AdminModel();

        // Récupérer les données de l'administrateur par nom d'utilisateur
        $admin = $adminModel->where('username_admin', $username)->first();

        // Vérification du mot de passe sans hachage
        if ($admin && $password === $admin['password_admin']) {
            session()->set('admin_id', $admin['admin_id']);
            session()->set('username_admin', $admin['username_admin']);
            return redirect()->to(base_url('Dashboard_view_controlleur'));
        } else {
            session()->setFlashdata('erreur', "L'adresse mail ou le mot de passe est incorrecte !!!");
            return redirect()->to(base_url('AdminController'));
        }
    }
}
