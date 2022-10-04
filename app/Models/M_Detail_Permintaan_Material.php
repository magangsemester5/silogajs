<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Detail_Permintaan_Material extends Model
{
    protected $table            = 'detail_permintaan_material';
    protected $primaryKey       = 'id_detail_permintaan_material';
    protected $useAutoIncrement = true;
    protected $returnType       = "object";
    protected $allowedFields    = [
        'id_detail_permintaan_material','id_permintaan_material','id_material','panjang','status'
    ];

    function getAll()
    {
        $builder = $this->db->table('permintaan_material');                                                              
        $builder->join('user', 'user.id = permintaan_material.id');
        $query = $builder->get();
        return $query->getResult();
    }
}