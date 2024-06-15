<?php

namespace App\Controllers;

use App\Models\EnvioDetalle;
use App\Models\Products;
use App\Models\VentasCabecera;
use App\Models\VentasDetalle;

class Cart extends BaseController
{

    protected $cart;
    protected $session;

    public function __construct()
    {
        helper(['form', 'url', 'cart']);

        $session = session();
        $this->cart = \Config\Services::cart();
    }

    public function view()
    {
        $cart = $this->cart->contents();
        $model = new Products();
        $productos = [];

        foreach ($cart as $item) {
            $producto = $model->find($item['id']);
            $producto['qty'] = $item['qty'];
            $producto['rowid'] = $item['rowid'];
            $productos[] = $producto;
        }

        $data['productos'] = $productos;
        $data['cart'] = $this->cart;
        echo view('components/header');
        echo view('Products/carrito', $data);
        echo view('components/footer');
    }

    public function add()
    {
        $request = \Config\Services::request();
        $qty = $request->getPost('qty');

        // Si el campo 'qty' está vacío o no está presente en el formulario, establecerlo en 1
        if (empty($qty)) {
            $qty = 1;
        }
        $data = array(
            'id'      => $request->getPost('id'),
            'qty'     => $qty,
            'price'   => $request->getPost('price'),
            'name'    => $request->getPost('name'),
        );

        $this->cart->insert($data);
        $totalItems = $this->cart->totalItems();
        session()->set('totalItems', $totalItems);

        return redirect()->back()->with('mensaje', 'Producto agregado correctamente');
    }

    public function update()
    {
        $request = \Config\Services::request();
        $rowid = $request->getPost('rowid');
        $qty = $request->getPost('qty');

        // Si la cantidad es menor o igual a 0, eliminamos el producto del carrito
        if ($qty <= 0) {
            $this->cart->remove($rowid);
        } else {
            $data = array(
                'rowid'   => $rowid,
                'qty'     => $qty,
            );
            $this->cart->update($data);
        }

        return redirect()->back()->withInput();
    }

    public function remove($rowid)
    {
        if ($rowid === "all") {
            $this->cart->destroy();
        } else {
            $this->cart->remove($rowid);
        }
        $totalItems = session()->get('totalItems') - 1;
        session()->set('totalItems', $totalItems);

        return redirect()->back()->withInput();
    }

    public function proceder()
    {
        $cart = \Config\Services::cart();
        $carrito = $this->cart->contents();

        if (empty($carrito)) {
            return redirect()->back()->with('mensaje', 'El carrito esta vacio');
        }

        echo view('components/header');
        echo view('Products/comprar', ['productos' => $carrito, 'cart' => $cart]);
        echo view('components/footer');
    }

    public function comprar()
    {
        $productoModelo = new Products();
        $session = session();
        $cart = \Config\Services::cart();
        $db = \Config\Database::connect();
        $db->transBegin();
        try {

            $carrito = $this->cart->contents();
            if (empty($carrito)) {
                return redirect()->back()->with('mensaje', 'El carrito esta vacio');
            }

            $usuario_id = $session->get('id');

            $total_venta = $cart->total();

            $tipoPago_id = $this->request->getPost('tipoPago_id');
            $tarjeta = $this->request->getPost('tarjeta');
            $direccion = $this->request->getPost('direccion');
            $ciudad = $this->request->getPost('ciudad');
            $provincia = $this->request->getPost('provincia');
            $codigo_postal = $this->request->getPost('codigo_postal');
            $metodo_envio = $this->request->getPost('metodo_envio');
            $costo_envio = $this->request->getPost('costo_envio');

            $ventasCabecera = new VentasCabecera();
            $ventasCabeceraData = [
                'fecha' => date('Y-m-d H:i:s'),
                'usuario_id' => $usuario_id,
                'total_venta' => $total_venta,
                'tipoPago_id' => $tipoPago_id,
                'tarjeta' => $tarjeta,
            ];

            if (!empty($ventasCabeceraData)) {
                $ventasCabecera->insert($ventasCabeceraData);
                $venta_id = $ventasCabecera->insertID();
            }

            $ventasDetalle = new VentasDetalle();
            foreach ($carrito as $producto) {
                $ventasDetalleData = [
                    'venta_id' => $venta_id,
                    'producto_id' => $producto['id'],
                    'cantidad' => $producto['qty'],
                    'precio' => $producto['price'],
                ];
                $ventasDetalle->insert($ventasDetalleData);
                $producto_id = $producto['id'];
                $cantidad_actual = $productoModelo->getCantidad($producto_id);

                $nueva_cantidad = $cantidad_actual - $producto['qty'];

                $productoModelo->updateCantidad($producto_id, $nueva_cantidad);
            }
            //Guardar los datos de envio
            $enivo = new EnvioDetalle();
            $envioData = [
                'venta_id' => $venta_id,
                'direccion' => $direccion,
                'ciudad' => $ciudad,
                'provincia' => $provincia,
                'codigo_postal' => $codigo_postal,
                'metodo_envio' => $metodo_envio,
                'costo_envio' => $costo_envio,
                'fecha_envio' => date('Y-m-d H:i:s'),
            ];
            $enivo->insert($envioData);

            if ($db->transStatus() === false) {
                throw new \Exception('Error en la transaccion');
            }

            $db->transCommit();
            $cart->destroy();

            $totalItems = 0;
            session()->set('totalItems', $totalItems);

            // Redirigir a una página de éxito
            return redirect()->to('/ventas/comprobante/' . $venta_id)->with('mensaje', 'La compra se ha realizado con éxito.');
        } catch (\Exception $e) {
            $db->transRollback();
            return redirect()->back()->with('mensaje', 'Error en la compra' . $e->getMessage());
        }
    }
    public function success()
    {
        echo view('components/header');
        echo view('Products/success');
        echo view('components/footer');
    }
}
