<?php

namespace App\Controllers;

use App\Models\Consultas;

class Consulta extends BaseController
{
    public function index()
    {
        echo view('components/header');
        echo  view('/Pages/contact');
        echo view('components/footer');
    }
    public function sendConsulta()
    {
        $session = session();
        $consulta = new Consultas();
        $data = [
            'fullname' => $this->request->getPost('fullname'),
            'email' => $this->request->getPost('email'),
            'message' => $this->request->getPost('message'),
        ];

        $consulta->insert($data);
        $session->setFlashdata('mensaje', 'Consulta enviada con exito');
        return redirect()->to('/contact');
    }
    public function listaConsulta()
    {

        $consultas = new Consultas();
        $data['consultas'] = $consultas->orderBy('id_consulta', 'ASC')->findAll();

        echo view('components/header');
        echo  view('/Pages/listaconsultas', $data);
        echo view('components/footer');
    }
}
