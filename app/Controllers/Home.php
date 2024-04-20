<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends Controller{
    public function principal(){

        $datos['header'] = view('components/header');
        $datos['footer'] = view('components/footer');
        return  view('/Pages/principal', $datos);
    }
    public function about(){
        $datos['header'] = view('components/header');
        $datos['footer'] = view('components/footer');
        return  view('/Pages/about', $datos);
    }
    public function contact(){
        $datos['header'] = view('components/header');
        $datos['footer'] = view('components/footer');
        return  view('/Pages/contact', $datos);
    }
    public function frequentquestions(){
        $datos['header'] = view('components/header');
        $datos['footer'] = view('components/footer');
        return  view('/Pages/frequentquestions', $datos);
    }
    public function terms(){
        $datos['header'] = view('components/header');
        $datos['footer'] = view('components/footer');
        return  view('/Pages/terms', $datos);
    }
    public function commerce(){
        $datos['header'] = view('components/header');
        $datos['footer'] = view('components/footer');
        return  view('/Pages/commerce', $datos);
    }
    public function politics(){
        $datos['header'] = view('components/header');
        $datos['footer'] = view('components/footer');

        return view('Pages/politics', $datos);

    }
}