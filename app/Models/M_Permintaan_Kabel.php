<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Permintaan_Kabel extends Model
{
    protected $table            = 'permintaan_kabel';
    protected $primaryKey       = 'id_permintaan_kabel';
    protected $useAutoIncrement = true;
    protected $returnType       = "object";
    protected $allowedFields    = [
        'id_permintaan_kabel', 'id', 'no_permintaan'
    ];

    function getAll()
    {
        $builder = $this->db->table('permintaan_kabel');
        $builder->join('user', 'user.id = permintaan_kabel.id');
        $query = $builder->get();
        return $query->getResult();
    }

    function getById($id)
    {
        $builder = $this->db->table('permintaan_kabel');
        $builder->join('user', 'user.id = permintaan_kabel.id');
        $builder->where('permintaan_kabel.id_permintaan_kabel', $id);
        $query = $builder->get();
        return $query->getResult();
    }
}