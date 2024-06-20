<?php

namespace App\Controllers;

use App\Models\User;

class Users extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function index($page = 1)
    {
        $users = new User();
        $perPage = 10;
        $datos['users'] = $users->orderBy('id', 'ASC')->paginate($perPage, 'group1', $page);
        $datos['pager'] = $users->pager;

        echo view('components/header');
        echo view('users/userlist', $datos);
        echo view('components/footer');
    }
    public function profile()
    {
        echo view('components/header');
        echo view('users/profile');
        echo view('components/footer');
    }

    public function form($id = null)
    {
        $users = new User();
        $data['user'] = $id ? $users->find($id) : null;

        echo view('components/header');
        echo view('/Pages/auth/register', $data);
        echo view('components/footer');
    }

    public function formValidation($id = null)
    {
        $rules =
            [
                'name' => 'required|min_length[3]|max_length[64]',
                'surname' => 'required|min_length[3]|max_length[64]',
                'email' => 'required|min_length[4]|max_length[128]|' . ($id ? '' : 'is_unique[user.email]'),
            ];

        if (!$id) {

            $rules['password'] = 'required|min_length[5]|max_length[20]';
        } else {
            $password = $this->request->getPost('password');
            if ($password) {

                $rules['password'] = 'min_length[5]|max_length[20]';
            }
        }

        $input = $this->validate($rules);
        $formModel = new User();

        if (!$input) {
            echo view('components/header');
            echo view('/Pages/auth/register', ['validation' => $this->validator, 'users' => $id ? $formModel->find($id) : null]);
            echo view('components/footer');
        } else {

            $data = [

                'name' => $this->request->getPost('name'),
                'surname' => $this->request->getPost('surname'),
                'email' => $this->request->getPost('email'),
                'id_perfil' => $this->request->getPost('id_perfil'),
            ];

            if ($this->request->getPost('password')) {
                $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
            }
            if (!$this->request->getPost('id_perfil')) {
                $data['id_perfil'] = 2;
            }
            if ($this->request->getPost('baja') == 'SI') {
                $data['baja'] = 'SI';
            } else {
                $data['baja'] = 'NO';
            }

            if ($id) {
                $formModel->update($id, $data);
                $session = session();
                if ($session->get('id') == $id) {

                    $sess_data = [
                        'name' => $data['name'],
                        'surname' => $data['surname'],
                        'email' => $data['email'],
                        'id_perfil' => $data['id_perfil'],
                        'baja' => $data['baja'],
                        'isLoggedIn' => true,
                    ];

                    $session->set($sess_data);
                }
                return redirect()->back()->with('success', 'Usuario actualizado');
            } else {
                $data['id_perfil'] = 2;
                $data['baja'] = 'NO';
                $formModel->save($data);
                return redirect()->to('/login')->with('success', 'Registrado correctamente');
            }
        }
    }
    public function borrar($id = null)
    {
        $model = new User();

        // Marcar usuario como "de baja"
        $model->marcarComoBaja($id);

        // Redireccionar a la lista de usuarios con mensaje de éxito
        return redirect()->back()->with('success', 'Usuario marcado como de baja exitosamente.');
    }
}
