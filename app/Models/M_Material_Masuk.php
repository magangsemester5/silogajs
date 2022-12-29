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
        'tanggal_masuk', 'no_delivery_order', 'nama_material', 'jumlah_masuk', 'nama_satuan', 'gudang', 'foto_penerima'
    ];

    function generateCode()
    {
        $query = $this->db->query("SELECT MAX(no_delivery_order) as no_delivery_order from material_masuk");
        $query = $query->getRow();
        return $query->no_delivery_order;
    }
    
    public function cekStok($id = null)
    {
        $builder = $this->db->table('material');
        $builder->join('satuan', 'satuan.id_satuan = material.id_satuan');
        $builder->where('id_material', $id);
        $query = $builder->get();
        return $query->getRowArray();
    }
}