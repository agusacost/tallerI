<?php 
namespace App\Controllers;

use App\Models\User;

class Register extends BaseController{

    public function __construct()
    {
        helper(['url','form']);
    }

    public function create(){
        echo view('components/header');
        echo view('/Pages/auth/register');
        echo view('components/footer');
    }

    public function formValidation(){

       $input = $this->validate([
           'name' => 'required|min_length[3]|max_length[64]',
           'surname' => 'required|min_length[3]|max_length[64]',
           'email' => 'required|min_length[4]|max_length[128]|is_unique[user.email]',
           'password'=> 'required|min_length[5]|max_length[20]'
            ],
        );

       $formModel = new User();
        
       if(!$input){
            echo view('components/header');
            echo view('/Pages/auth/register', ['validation' => $this->validator]);
            echo view('components/footer');
        }else{

            $query = $formModel->save([
                'name'=> $this ->request->getPost('name'),
                'surname'=> $this ->request->getPost('surname'),
                'email'=> $this ->request->getPost('email'),
                'password'=> password_hash('123456', PASSWORD_DEFAULT),
                'id_perfil'=> 2,
                //TODO AGREGAR PERFILID
            ]);
            if($query){
                return redirect()->to('/register')->with('success', 'Registrado correctamente');
            }else{
                return redirect()->to('/register')->with('fail', 'Algo anduvo mal');
            }
            
        }
    }
}