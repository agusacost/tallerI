<?php

namespace App\Controllers;

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

    public function save($id = null)
    {
        $product = new Products();

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'id_categoria' => $this->request->getPost('id_categoria'),
            'cantidad' => $this->request->getPost('cantidad'),
            'precio' => $this->request->getPost('precio'),
        ];

        //verificar existencia
        $imagen = $this->request->getFile('imagen');

        if ($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
            $newNameImagen = $imagen->getRandomName();
            $imagen->store('../../assets/img', $newNameImagen);

            $data['imagen'] = $newNameImagen;
        } elseif ($id) {

            $productId = $product->find($id);
            $data['imagen'] = $productId['imagen'];
        }

        if ($id) {
            $productId = $product->find($id);
            if (!$productId) {
                return redirect()->to('/listar')->with('error', 'Producto no encontrado');
            }
            $product->update($id, $data);
            return redirect()->to('/listar')->with('mensaje', 'Producto actualizado');
        } else {
            $productFound = $product->where('nombre', $data['nombre'])->first();

            if ($productFound) {
                return redirect()->back()->with('error', 'Producto ya existe');
            } else {
                $product->insert($data);
                return redirect()->to('/listar')->with('Mensaje', 'Producto actualizado con exito');
            }
        }
    }
    public function form($id = null)
    {
        $product = new Products();
        $data['product'] = $id ? $product->find($id) : null;

        echo view('components/header');
        echo view('Products/productForm', $data);
        echo view('components/footer');
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
