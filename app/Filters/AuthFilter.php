<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if (!$session->has('isLoggedIn')) {
            return redirect()->to(base_url('ErrorController'));
        }

        // Vérifiez si l'utilisateur a le bon rôle
        if (!empty($arguments) && in_array('admin', $arguments)) {
            if ($session->get('role') !== 'admin') {
                return redirect()->to(base_url('/'));
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Rien à faire ici
    }
}
