<?php

namespace App\Controllers;

class ErrorController extends BaseController
{
    public function error_404(): string
    {
        return view('error_view');
    }
}
