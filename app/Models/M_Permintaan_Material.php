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
        'id', 'no_permintaan', 'tanggal'
    ];

    function getAll()
    {
        $builder = $this->db->table('permintaan_material');
        $builder->join('user', 'user.id = permintaan_material.id');
        $query = $builder->get();
        return $query->getResult();
    }

    function getById($id)
    {
        $builder = $this->db->table('permintaan_material');
        $builder->join('user', 'user.id = permintaan_material.id');
        $builder->where('permintaan_material.id_permintaan_material', $id);
        $query = $builder->get();
        return $query->getResult();
    }

    function generateCode()
    {
        $query = $this->db->query("SELECT MAX(no_permintaan) as no_permintaan from permintaan_material");
        $query = $query->getRow();
        return $query->no_permintaan;
    }

    function getDataPermintaanMaterialByStatus()
    {
        $builder = $this->db->table('permintaan_material');
        $builder->select('permintaan_material.id_permintaan_material, permintaan_material.no_permintaan, detail_permintaan_material.status');
        $builder->join('detail_permintaan_material', 'detail_permintaan_material.id_permintaan_material = permintaan_material.id_permintaan_material');
        $builder->where('detail_permintaan_material.status', 4);
        $builder->groupBy('permintaan_material.id_permintaan_material');
        $query = $builder->get();
        return $query->getResult();
    }

    function deleteData($id_permintaan_material)
    {
        $builder = $this->db->table('permintaan_material');
        $builder->where('id_permintaan_material', $id_permintaan_material)->delete();
    } 
}