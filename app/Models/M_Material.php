<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Material extends Model
{
    protected $table            = 'material';
    protected $primaryKey       = 'id_material';
    protected $useAutoIncrement = true;
    protected $returnType       = "object";
    protected $allowedFields    = [
        'id_satuan', 'nama_material', 'stok', 'serial_number', 'foto_serial_number'
    ];
    function getAll()
    {
        $builder = $this->db->table('material');
        $builder->join('satuan', 'satuan.id_satuan = material.id_satuan');
        $query = $builder->get();
        return $query->getResult();
    }
    public function cekStok($id = null)
    {
        $builder = $this->db->table('material');
        $builder->join('satuan', 'satuan.id_satuan = material.id_satuan');
        $builder->where('id_material', $id);
        $query = $builder->get();
        return $query->getRowArray();
    }

    function count($table)
    {
        $builder = $this->db->table($table);
        $query = $builder->countAllResults();
        return $query;
    }
}