<?php

namespace App\Models;

use CodeIgniter\Model;

class Products extends Model
{
    protected $table      = 'product';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'descripcion', 'imagen', 'id_categoria', 'cantidad', 'precio'];
}
