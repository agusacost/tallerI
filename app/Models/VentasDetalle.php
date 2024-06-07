<?php

namespace App\Models;

use CodeIgniter\Model;

class VentasDetalle extends Model
{
    protected $table      = 'Ventas_detalle';
    protected $primaryKey = 'id_detalle';
    protected $allowedFields = ['venta_id', 'producto_id', 'cantidad', 'precio'];
}
