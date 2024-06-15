<?php

namespace App\Filters;

use App\Models\User;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthUserFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login')->with('msg', 'Debes iniciar sesion');
        }

        $userId = $session->get('id');
        $user = new User();
        $user = $user->find($userId);

        if (!$user || $user['baja'] == 'SI') {
            $session->destroy();
            return redirect()->to('/login')->with('msg', 'Tu cuenta esta desactivada');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
