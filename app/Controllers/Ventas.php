<?php

namespace App\Controllers;

use App\Models\TipoPago;
use App\Models\User;
use App\Models\VentasCabecera;

class Ventas extends BaseController
{
    public function index()
    {
        $ventas = new VentasCabecera();
        $datos['ventas'] = $ventas->orderBy('id_venta', 'ASC')->findAll();

        $usuario = new User();
        $tipoPago = new TipoPago();

        foreach ($datos['ventas'] as &$venta) {
            $email = $usuario->find($venta['usuario_id']);
            $venta['userEmail'] = $email['email'];

            $pago = $tipoPago->find($venta['tipoPago_id']);
            $venta['tipoPago_descripcion'] = $pago['descripcion'];
        }

        echo view('components/header');
        echo view('Pages/listaventas', $datos);
        echo view('components/footer');
    }

    public function ventasUser($id)
    {
        $ventas = new VentasCabecera();
        $datos['ventas'] = $ventas->orderBy('id_venta', 'ASC')->findAll();

        $usuario = new User();
        $tipoPago = new TipoPago();

        foreach ($datos['ventas'] as &$venta) {
            $email = $usuario->find($venta['usuario_id']);
            $venta['userEmail'] = $email['email'];

            $pago = $tipoPago->find($venta['tipoPago_id']);
            $venta['tipoPago_descripcion'] = $pago['descripcion'];
        }

        echo view('components/header');
        echo view('Pages/listaventas', $datos);
        echo view('components/footer');
    }
}
