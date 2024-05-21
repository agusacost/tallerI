<?php 
namespace App\Controllers;

use App\Models\User;

class Login extends BaseController{
    public function login(){
        echo view('components/header');
        echo view('/Pages/auth/login');
        echo view('components/footer');
    }

    public function auth() {
        $session = session();
        $model = new User();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password') ?? '';

        if(is_null($password)){
            $session->setFlashdata('msg',$password);
            return redirect()->to(base_url('/login'));
        }

        $data = $model->where('email', $email)->first();
        
        if($data){
            $pass = $data['password'];

             
            
            if(password_verify( $password, $pass )){
                $sess_data = [
                    'id'=>$data['id'],
                    'name'=>$data['name'],
                    'surname'=>$data['surname'],
                    'email'=>$data['email'],
                    'id_perfil'=>$data['id_perfil'],
                    'isLoggedIn'=>true,
                ];

                $session->set($sess_data);

                $session->setFlashdata('msg', 'Bienvenido');
                return redirect()->to(base_url('/'));
            }else{
                $session->setFlashdata('msg', 'Clave incorrecta');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg','El email es incorrecto');
            return redirect()->to('/login');
        }

    }

    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }
}