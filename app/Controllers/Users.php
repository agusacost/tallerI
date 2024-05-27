<?php

namespace App\Controllers;

use App\Models\User;

class Users extends BaseController
{
    public function index()
    {
        $users = new User();
        $datos['users'] = $users->orderBy('id', 'ASC')->findAll();

        echo view('components/header');
        echo view('users/userlist', $datos);
        echo view('components/footer');
    }
    public function borrar($id = null)
    {
        $users = new User();
        $data['users']  = $users->where('id', $id)->first();

        $users->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/listar_users'));
    }
}
