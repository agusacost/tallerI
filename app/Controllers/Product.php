<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Products;
use PhpParser\Node\Stmt\Echo_;

class Product extends Controller
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

        $nombre = $request->getPost('nombre');
        $descripcion = $request->getPost('descripcion');
        $img = $request->getFile('imagen');
        $precio = $request->getPost('precio');
        $cantidad = $request->getPost('cantidad');

        if ($img = $request->getFile('img')) {
            $newName = $img->getRandomName();
            $img->store('../../app/assets/img', $newName);

            $data = [
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'imagen' => $newName,
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

        $route = ("app\assets\img/" . $dataProduct['imagen']);
        unlink($route);


        $product->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/listar'));
    }
}
