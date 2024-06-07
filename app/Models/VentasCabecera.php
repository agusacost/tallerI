<?php

namespace App\Models;

use CodeIgniter\Model;

class VentasCabecera extends Model
{
    protected $table      = 'Ventas_cabecera';
    protected $primaryKey = 'id_venta';
    protected $allowedFields = ['fecha', 'usuario_id', 'total_venta', 'tipoPago_id', 'tarjeta'];
}
