<?php 
namespace App\Models;

use CodeIgniter\Model;

class Products extends Model{
    protected $table      = 'products';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'descripcion', 'img', 'precio', 'cantidad'];
}