<?php

namespace App\Models;

use CodeIgniter\Model;

class Consultas extends Model
{
    protected $table      = 'consultas';
    protected $primaryKey = 'id_consultas';
    protected $allowedFields = ['fullname', 'email', 'message'];
}
