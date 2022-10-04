<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Material_Masuk extends Model
{
    protected $table            = 'material_masuk';
    protected $primaryKey       = 'id_material_masuk';
    protected $useAutoIncrement = true;
    protected $returnType       = "object";
    protected $allowedFields    = [
        'id_material','id_satuan','tanggal_masuk', 'no_delivery_order', 'jumlah_masuk','gudang','foto_penerima'
    ];

    function getAll()
    {
        $builder = $this->db->table('material_masuk');
        $builder->join('material', 'material.id_material = material_masuk.id_material');
        $query = $builder->get();
        return $query->getResult();
    }

    function getRelasi($id)
    {
        $builder = $this->db->table('material_masuk');
        $builder->join('material', 'material.id_material = material_masuk.id_material');
        $builder->where('id_material_masuk', $id);
        $query = $builder->get();
        return $query->getResult();
    }

    public function cekStok($id = null)
    {
        $builder = $this->db->table('material_masuk');                                                              
        $builder->join('material', 'material.id_material = material_masuk.id_material');
        $builder->where('id_material_masuk', $id);
        $query = $builder->get();
        return $query->getRowArray();
    }
}
