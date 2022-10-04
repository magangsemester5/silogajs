<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Material_Keluar extends Model
{
    protected $table            = 'material_keluar';
    protected $primaryKey       = 'id_material_keluar';
    protected $useAutoIncrement = true;
    protected $returnType       = "object";
    protected $allowedFields    = [
        'id_material','id_satuan','id','tanggal_keluar','jumlah_keluar', 'foto_penerima'
    ];

    function getAll()
    {
        $builder = $this->db->table('material_keluar');
        $builder->join('material', 'material.id_material = material_keluar.id_material');
        $query = $builder->get();
        return $query->getResult();
    }

    function getRelasi($id)
    {
        $builder = $this->db->table('material_keluar');
        $builder->join('material', 'material.id_material = material_keluar.id_material');
        $builder->where('id_material_keluar', $id);
        $query = $builder->get();
        return $query->getResult();
    }
}
