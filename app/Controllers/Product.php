<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Products;

class Product extends Controller
{
    public function allProducts(){
        // $product = new Products();
        // $datos['product'] = $product->orderBy('id', 'ASC')->findAll();

        $datos['header'] = view('components/header');
        $datos['footer'] = view('components/footer');
        return view('Products/productos', $datos);
    }
    public function index()
    {
        $product = new Products();
        //consulta a bd
        $datos['product'] = $product->orderBy('id', 'ASC')->findAll();

        $datos['header'] = view('components/header');
        $datos['footer'] = view('components/footer');
        return view('Products/listar', $datos);
    }
    public function add()
    {
        $datos['header'] = view('components/header');
        $datos['footer'] = view('components/footer');
        return view('Products/addProduct', $datos);
    }
    public function save()
    {
        $product = new Products();
        $request = service('request');

        $nombre = $request->getPost('nombre');
        $descripcion = $request->getPost('descripcion');
        $img = $request->getFile('img');
        $precio = $request->getPost('precio');
        $cantidad = $request->getPost('cantidad');

        if ($img = $request->getFile('img')) {
            $newName = $img->getRandomName();
            $img->store('../../app/assets/img', $newName);

            $data = [
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'img' => $newName,
                'precio' => $precio,
                'cantidad' => $cantidad,
            ];
            $product->insert($data);
        }
        return redirect()->to(base_url('/listar'));
    }
    public function borrar($id = null)
    {
        $product = new Products();
        $dataProduct = $product->where('id', $id)->first();

        $route = ("app\assets\img/" . $dataProduct['img']);
        unlink($route);


        $product->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/listar'));
    }
}
