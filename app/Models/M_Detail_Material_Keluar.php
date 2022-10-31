<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Detail_Material_Keluar extends Model
{
    protected $table            = 'detail_material_keluar';
    protected $primaryKey       = 'id_detail_material_keluar';
    protected $useAutoIncrement = true;
    protected $returnType       = "object";
    protected $allowedFields    = [
        'id_material_keluar', 'nama_material', 'nama_satuan', 'jumlah'
    ];

    public function cekdetailsetelahdikirim($id = null)
    {
        $builder = $this->db->table('detail_material_keluar');
        $builder->join('material_keluar', 'material_keluar.id_material_keluar = detail_material_keluar.id_material_keluar');
        $builder->where('material_keluar.id_material_keluar', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }

    function countMaterialKeluar()
    {
        $builder = $this->db->table('detail_material_keluar');
        $builder->selectCount('id_material_keluar as material_keluar');
        $query = $builder->countAllResults();
        return $query;
    }

    public function delete_detail_material_keluar($id = null)
    {
        $builder = $this->db->table('detail_material_keluar');
        $builder->delete(['id_material_keluar' => $id]);
        return $this->db->affectedRows();
    }
}