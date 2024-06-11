<?php

namespace App\Controllers;

use App\Models\EnvioDetalle;

class Envios extends BaseController
{
    public function index()
    {
        $envios = new EnvioDetalle();
        $datos['envios'] = $envios->orderBy('id_envio', 'ASC')->findAll();


        echo view('components/header');
        echo view('Pages/listaenvios', $datos);
        echo view('components/footer');
    }
}
