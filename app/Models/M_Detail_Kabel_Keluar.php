<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Detail_Kabel_Keluar extends Model
{
    protected $table            = 'detail_kabel_keluar';
    protected $primaryKey       = 'id_detail_kabel_keluar';
    protected $useAutoIncrement = true;
    protected $returnType       = "object";
    protected $allowedFields    = [
        'id_kabel_keluar', 'no_drum', 'core', 'nama_satuan', 'panjang'
    ];

    public function cekdetailsetelahdikirim($id = null)
    {
        $builder = $this->db->table('detail_kabel_keluar');
        $builder->join('kabel_keluar', 'kabel_keluar.id_kabel_keluar = detail_kabel_keluar.id_kabel_keluar');
        $builder->where('kabel_keluar.id_kabel_keluar', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }

    function countKabelKeluar()
    {
        $builder = $this->db->table('detail_permintaan_kabel');
        $builder->selectCount('id_kabel as kabel_keluar');
        $builder->where('status = 4');
        $query = $builder->countAllResults();
        return $query;
    }

    public function delete_detail_kabel_keluar($id = null)
    {
        $builder = $this->db->table('detail_kabel_keluar');
        $builder->delete(['id_kabel_keluar' => $id]);
        return $this->db->affectedRows();
    }
}