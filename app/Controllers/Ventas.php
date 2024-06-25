<?php

namespace App\Controllers;

use App\Models\EnvioDetalle;
use App\Models\Products;
use App\Models\TipoPago;
use App\Models\User;
use App\Models\VentasCabecera;
use App\Models\VentasDetalle;

class Ventas extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
        $this->pager = \Config\Services::pager();
    }

    public function index($page = 1)
    {
        $ventas = new VentasCabecera();
        $perPage = 9;
        $datos['ventas'] = $ventas->orderBy('id_venta', 'ASC')->paginate($perPage, 'group1', $page);
        $datos['pager'] = $ventas->pager;
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

    public function ventasUser($id, $page = 1)
    {
        $ventas = new VentasCabecera();
        $perPage = 9;
        $datos['ventas'] = $ventas->where('usuario_id', $id)->orderBy('id_venta', 'ASC')->paginate($perPage, 'group1', $page);
        $datos['pager'] = $ventas->pager;
        $datos['id'] = $id;
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

    public function comprobante($id_venta)
    {
        $ventasCabecera = new VentasCabecera();
        $ventasDetalle = new VentasDetalle();
        $enviosDetalle = new EnvioDetalle();

        $ventas = $ventasCabecera->find($id_venta);
        $ventaDetalle = $ventasDetalle->where('venta_id', $id_venta)->findAll();
        $envio = $enviosDetalle->where('venta_id', $id_venta)->first();

        $datos = [
            'ventas' => $ventas,
            'ventaDetalle' => $ventaDetalle,
            'envio' => $envio,
        ];

        echo view('components/header');
        echo view('Products/comprobante', $datos);
        echo view('components/footer');
    }
}
