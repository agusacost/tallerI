<?php

namespace App\Models;

use CodeIgniter\Model;

class Products extends Model
{
    protected $table      = 'product';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'descripcion', 'imagen', 'id_categoria', 'cantidad', 'precio', 'activo'];

    public function getCantidad($id)
    {
        $producto = $this->find($id);
        return $producto['cantidad'];
    }

    public function updateCantidad($id, $nueva_cantidad)
    {
        $data = ['cantidad' => $nueva_cantidad];
        $this->update($id, $data);
    }

    public function setInactivo($id)
    {
        return $this->update($id, ['activo' => 'NO']);
    }
    public function setActivo($id)
    {
        return $this->update($id, ['activo' => 'SI']);
    }
}
