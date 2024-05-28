<?php

namespace App\Controllers;
use App\Models\UserModel;

class UserDash extends BaseController
{
    public function users_dash(): string
    {
        $usermodel = new UserModel();
        $donnees["users"] = $usermodel->findAll();
        return view('user_dashboard', $donnees);

        // return view('user_dashboard');
    }

}
