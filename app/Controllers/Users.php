<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class Users extends Controller{
    public function login(){
        $datos['header'] = view('components/header');
        $datos['footer'] = view('components/footer');
        return  view('/Pages/login', $datos);
    }
}