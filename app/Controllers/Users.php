<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function users()
    {
        return view('users_view1');
    }

    public function user_create()
    {
        $session = session();
        $userModel = new UserModel();

        $data = [
            'mail' => $this->request->getPost('mail'),
            'pw' => password_hash($this->request->getPost('pw'), PASSWORD_DEFAULT),
            'role' => 'client',
        ];

        if ($userModel->insert($data)) {
            $session->setFlashdata('success', 'Compte créé avec succès.');
            return redirect()->to(base_url('Users'));
        } else {
            $session->setFlashdata('error', 'Échec de la création du compte.');
            return redirect()->back();
        }
    }

    public function user_connect()
    {
        $session = session();
        $userModel = new UserModel();

        $mail = $this->request->getPost('mail');
        $pw = $this->request->getPost('pw');

        $user = $userModel->where('mail', $mail)->first();

        if ($user && password_verify($pw, $user['pw'])) {
            $session->set([
                'user_id' => $user['user_id'],
                'mail' => $user['mail'],
                'role' => $user['role'],
                'isLoggedIn' => true
            ]);

            if ($user['role'] === 'admin') {
                return redirect()->to(base_url('Dashboard'));
            } else {
                return redirect()->to(base_url('panier_view'));
            }
        } else {
            $session->setFlashdata('error', 'Email ou mot de passe incorrect');
            return redirect()->back();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('Users'));
    }

    public function modifier_user($id = null): string
    {
        $usermodel = new UserModel();

        if ($id != null) {
            $user = $usermodel->where('user_id', $id)->first();

            if ($user) {
                return view('userEdit', ['user' => $user]);
            } else {
                return "Utilisateur non trouvé.";
            }
        } else {
            return "ID de l'utilisateur non fourni.";
        }
    }

    public function update_user()
    {
        $usermodel = new UserModel();

        $id = $this->request->getPost('user_id');
        $data = [
            'mail' => $this->request->getPost('mail'),
            'role' => $this->request->getPost('role'),
        ];

        if ($usermodel->update($id, $data)) {
            session()->setFlashdata('success', 'L\'utilisateur a été mis à jour avec succès.');
            return redirect()->to(base_url('UserDash'));
        } else {
            session()->setFlashdata('error', 'La mise à jour de l\'utilisateur a échoué.');
            return redirect()->back();
        }
    }
}
