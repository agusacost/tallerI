<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoPago extends Model
{
    protected $table      = 'Tipo_Pago';
    protected $primaryKey = 'id_tipoPago';
    protected $allowedFields = ['descripcion'];
}
