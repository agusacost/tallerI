<?php

namespace App\Models;

use CodeIgniter\Model;

class envioDetalle extends Model
{
    protected $table      = 'Envio_detalle';
    protected $primaryKey = 'id_envio';
    protected $allowedFields = ['venta_id', 'direccion', 'ciudad', 'provincia', 'codigo_postal', 'metodo_envio', 'costo_envio', 'fecha_envio'];
}
