<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function dashboard(): string
    {
        return view('Dashboard');
    }
}
