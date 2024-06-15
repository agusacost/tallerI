<?php

namespace App\Controllers;

use App\Models\User;

class Login extends BaseController
{
    public function login()
    {
        echo view('components/header');
        echo view('/Pages/auth/login');
        echo view('components/footer');
    }

    public function auth()
    {
        $session = session();
        $model = new User();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password') ?? '';

        if (is_null($password)) {
            $session->setFlashdata('msg', $password);
            return redirect()->to(base_url('/login'));
        }

        $data = $model->where('email', $email)->first();

        if ($data) {
            $pass = $data['password'];

            if (password_verify($password, $pass)) {
                if ($data['baja'] == 'NO') {

                    $sess_data = [
                        'id' => $data['id'],
                        'name' => $data['name'],
                        'surname' => $data['surname'],
                        'email' => $data['email'],
                        'id_perfil' => $data['id_perfil'],
                        'isLoggedIn' => true,
                    ];

                    $session->set($sess_data);

                    $session->setFlashdata('msg', 'Bienvenido');
                    if ($sess_data['id_perfil'] == 1) {
                        return redirect()->to(base_url('/listar/pagina/1'));
                    } else {
                        return redirect()->to(base_url('/'));
                    }
                } else {
                    return redirect()->to('/login')->with('msg', 'Tu cuenta está desactivada. Contacta al administrador.');
                }
            } else {
                $session->setFlashdata('msg', 'Clave incorrecta');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Completa los campos');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }
}
