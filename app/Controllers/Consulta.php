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
        $validation = \Config\Services::validation();

        $rules = [
            'fullname' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email|max_length[255]',
            'message' => 'required|min_length[10]',
        ];

        $messages = [
            'fullname' => [
                'required' => 'El nombre completo es obligatorio.',
                'min_length' => 'El nombre completo debe tener al menos 3 caracteres.',
                'max_length' => 'El nombre completo no puede exceder los 255 caracteres.'
            ],
            'email' => [
                'required' => 'El correo electrónico es obligatorio.',
                'valid_email' => 'Debes proporcionar un correo electrónico válido.',
                'max_length' => 'El correo electrónico no puede exceder los 255 caracteres.'
            ],
            'message' => [
                'required' => 'El mensaje es obligatorio.',
                'min_length' => 'El mensaje debe tener al menos 10 caracteres.'
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

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
    public function borrarConsulta($id = null)
    {
        $consulta = new Consultas();
        $consulta->where('id_consulta', $id)->delete($id);
        return redirect()->back();
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
