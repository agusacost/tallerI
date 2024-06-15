<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'surname', 'email', 'password', 'id_perfil', 'baja'];

    public function marcarComoBaja($id)
    {
        return $this->update($id, ['baja' => 'SÍ']);
    }
}
