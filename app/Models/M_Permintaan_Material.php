<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Permintaan_Material extends Model
{
    protected $table            = 'permintaan_material';
    protected $primaryKey       = 'id_permintaan_material';
    protected $useAutoIncrement = true;
    protected $returnType       = "object";
    protected $allowedFields    = [
        'id', 'no_permintaan'
    ];

    function getAll()
    {
        $builder = $this->db->table('permintaan_material');
        $builder->join('user', 'user.id = permintaan_material.id');
        $query = $builder->get();
        return $query->getResult();
    }
}