<?php

namespace App\Controllers;

use App\Models\Products;

class Product extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
        $this->pager = \Config\Services::pager();
    }
    public function index($page = 1)
    {
        $product = new Products();
        //consulta a bd
        $perPage = 5;
        $datos['product'] = $product->orderBy('id', 'ASC')->paginate($perPage, 'group1', $page);
        $datos['pager'] = $product->pager;

        echo view('components/header');
        echo view('Products/listar', $datos);
        echo view('components/footer');
    }
    public function publicProducts($page = 1)
    {
        $product = new Products();
        //consulta

        $perPage = 9;

        $datos['product'] = $product->where('activo', 'SI')->where('cantidad >', 0)->orderBy('id', 'ASC')->paginate($perPage, 'group1', $page);
        $datos['pager'] = $product->pager;
        echo view('components/header');
        echo view('Products/publicProducts', $datos);
        echo view('components/footer');
    }
    public function filtrarProductos($page = 1)
    {
        $product = new Products();
        $perPage = 9;
        $categoria = $this->request->getPost('id_categoria');

        if ($categoria) {
            $datos['product'] = $product->where('id_categoria', $categoria)->where('activo', 'SI')->paginate($perPage, 'group1', $page);
        } else {
            $datos['product'] = $product->orderBy('id', 'ASC')->paginate($perPage, 'group1', $page);
        }

        $datos['pager'] = $product->pager;

        echo view('components/header');
        echo view('Products/publicProducts', $datos);
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
            'activo' => 'SI',
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
                return redirect()->to('/listar/pagina/1')->with('error', 'Producto no encontrado');
            }
            $product->update($id, $data);
            return redirect()->to('/listar/pagina/1')->with('mensaje', 'Producto actualizado');
        } else {
            $productFound = $product->where('nombre', $data['nombre'])->first();

            if ($productFound) {
                return redirect()->back()->with('error', 'Producto ya existe');
            } else {
                $product->insert($data);
                return redirect()->to('/listar/pagina/1')->with('mensaje', 'Producto actualizado con exito');
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
        $product->setInactivo($id);


        return redirect()->back()->with('msg', 'Producto inactivo de forma exitosa');
    }
    public function activo($id = null)
    {
        $product = new Products();
        $product->setActivo($id);


        return redirect()->back()->with('msg', 'Producto Activado de forma exitosa');
    }
}
