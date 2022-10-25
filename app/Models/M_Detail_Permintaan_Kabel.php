<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Detail_Permintaan_Kabel extends Model
{
    protected $table            = 'detail_permintaan_kabel';
    protected $primaryKey       = 'id_detail_permintaan_kabel';
    protected $useAutoIncrement = true;
    protected $returnType       = "object";
    protected $allowedFields    = [
        'id_detail_permintaan_kabel', 'id_permintaan_kabel', 'id_kabel', 'panjang', 'status'
    ];

    function getAllRelation($id)
    {
        $builder = $this->db->table('kabel');
        $builder->join('detail_permintaan_kabel', 'detail_permintaan_kabel.id_kabel = kabel.id_kabel');
        $builder->join('permintaan_kabel', 'permintaan_kabel.id_permintaan_kabel = detail_permintaan_kabel.id_permintaan_kabel');
        $builder->where('permintaan_kabel.id_permintaan_kabel', $id);
        $query = $builder->get();
        return $query->getResult();
    }

    function countKabelKeluar()
    {
        $builder = $this->db->table('detail_permintaan_kabel');
        $builder->selectCount('id_kabel as kabel_keluar');
        $builder->where('status = 4');
        $query = $builder->countAllResults();
        return $query;
    }
}