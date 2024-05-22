<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Products;

class Product extends BaseController
{
    public function index()
    {
        $product = new Products();
        //consulta a bd
        $datos['product'] = $product->orderBy('id', 'ASC')->findAll();

        echo view('components/header');
        echo view('Products/listar', $datos);
        echo view('components/footer');
    }
    public function add()
    {
        echo view('components/header');
        echo view('Products/addProduct');
        echo view('components/footer');
    }
    public function save()
    {
        $product = new Products();
        $request = service('request');

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'id_categoria' => $this->request->getPost('id_categoria'),
            'cantidad' => $this->request->getPost('cantidad'),
            'precio' => $this->request->getPost('precio'),
        ];

        //verificar existencia
        $productFound = $product->where('nombre', $data['nombre'])->first();
        $imagen = $this->request->getFile('imagen');

        if ($imagen = $request->getFile('imagen')) {
            $newNameImagen = $imagen->getRandomName();
            $imagen->store('../../assets/img', $newNameImagen);

            $data['imagen'] = $newNameImagen;
        }

        if ($productFound) {
            return redirect()->back()->with('error', 'El producto ya existe');
        } elseif ($product->insert($data)) {
            return redirect()->to('/listar')->with('mensaje', 'Producto agregado con exito');
        } else {
            return redirect()->back()->with('error', 'Error al cargar el producto');
        }
    }
    public function borrar($id = null)
    {
        $product = new Products();
        $dataProduct = $product->where('id', $id)->first();

        $route = ("assets/img/" . $dataProduct['imagen']);
        unlink($route);


        $product->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/listar'));
    }
}
