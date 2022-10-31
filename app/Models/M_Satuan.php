<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Satuan extends Model
{
    protected $table            = 'satuan';
    protected $primaryKey       = 'id_satuan';
    protected $returnType       = "object";
    protected $allowedFields    = [
        'nama_satuan'
    ];

    function cek_data_direlasi($table, $table2, $where)
    {
        $builder = $this->db->table($table);
        $builder = $this->db->table($table2);
        $builder->where($table, $where);
        $builder->where($table2, $where);
        $builder->countAllResults();
        $query = $builder->get();
        return $query->getResult();
    }
}