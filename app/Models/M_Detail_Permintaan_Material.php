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
        'id_detail_permintaan_material', 'id_permintaan_material', 'id_material', 'jumlah', 'status'
    ];

    function getAllRelation($id)
    {
        $builder = $this->db->table('material');
        $builder->join('detail_permintaan_material', 'detail_permintaan_material.id_material = material.id_material');
        $builder->join('permintaan_material', 'permintaan_material.id_permintaan_material = detail_permintaan_material.id_permintaan_material');
        $builder->where('permintaan_material.id_permintaan_material', $id);
        $query = $builder->get();
        return $query->getResult();
    }

    function updateStatus($id_permintaan_material)
    {
        $builder = $this->db->table('detail_permintaan_material');
        $array = ['id_permintaan_material' => $id_permintaan_material,  'status' =>  4];
        $builder->join('permintaan_kabel', 'detail_permintaan_kabel.id_permintaan_material = permintaan_kabel.id_permintaan_material')->set('status', 5)->where($array)->update();
    }

    function deleteData($id_permintaan_material)
    {
        $builder = $this->db->table('detail_permintaan_material');
        $array = array('id_permintaan_material' => $id_permintaan_material);
        $status = [5, 6];
        $builder->join('permintaan_material', 'detail_permintaan_material.id_permintaan_material = permintaan_material.id_permintaan_material')->where($array)->whereIn('status', $status)->delete();
    }
}