<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Kabel_Keluar extends Model
{
    protected $table            = 'kabel_keluar';
    protected $primaryKey       = 'id_kabel_keluar';
    protected $useAutoIncrement = true;
    protected $returnType       = "object";
    protected $allowedFields    = [
        'id_kabel','id_satuan','id','tanggal_keluar','panjang_keluar', 'foto_penerima'
    ];

    function getAll()
    {
        $builder = $this->db->table('kabel_keluar');
        $builder->join('kabel', 'kabel.id_kabel = kabel_keluar.id_kabel');
        $builder->join('satuan', 'satuan.id_satuan = kabel_keluar.id_satuan');
        $builder->join('user', 'user.id = kabel_keluar.id');
        $query = $builder->get();
        return $query->getResult();
    }

    function getRelasi($id)
    {
        $builder = $this->db->table('kabel_keluar');
        $builder->join('kabel', 'kabel.id_kabel = kabel_keluar.id_kabel');
        $builder->join('satuan', 'satuan.id_satuan = kabel_keluar.id_satuan');
        $builder->join('user', 'user.id = kabel_keluar.id');
        $builder->where('id_kabel_keluar', $id);
        $query = $builder->get();
        return $query->getResult();
    }

    public function cekPanjang($id = null)
    {
        $builder = $this->db->table('kabel');
        $builder->join('satuan', 'satuan.id_satuan = kabel.id_satuan');
        $builder->where('id_kabel', $id);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function cekWilayah($id = null)
    {
        $builder = $this->db->table('permintaan_kabel');
        $builder->join('user', 'user.id = permintaan_kabel.id');
        $builder->where('id_permintaan_kabel', $id);
        $query = $builder->get();
        return $query->getRowArray();
    }
}
