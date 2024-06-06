<?php

namespace App\Controllers;

use App\Models\Products;

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

        return redirect()->to(base_url('productos'));
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

        return redirect()->back()->withInput();
    }
}
