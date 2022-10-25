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
        'id_permintaan_kabel', 'tanggal_keluar', 'foto_penerima'
    ];

    function getAll()
    {
        $builder = $this->db->table('kabel_keluar');
        $builder->join('permintaan_kabel', 'permintaan_kabel.id_permintaan_kabel = kabel_keluar.id_permintaan_kabel');
        $builder->join('user', 'user.id = permintaan_kabel.id');
        $query = $builder->get();
        return $query->getResult();
    }

    function getRelasi($id)
    {
        $builder = $this->db->table('kabel_keluar');
        $builder->join('permintaan_kabel', 'permintaan_kabel.id_permintaan_kabel = kabel_keluar.id_permintaan_kabel');
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
        $builder->join('detail_permintaan_kabel', 'detail_permintaan_kabel.id_permintaan_kabel = permintaan_kabel.id_permintaan_kabel');
        $builder->join('kabel', 'kabel.id_kabel = detail_permintaan_kabel.id_kabel');
        $builder->where('permintaan_kabel.id_permintaan_kabel', $id);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function cekdetailkabelkeluar($id = null)
    {
        $builder = $this->db->table('detail_permintaan_kabel');
        $builder->select('kabel.no_drum, kabel.core, detail_permintaan_kabel.panjang as dpkp, kabel.serial_number, kabel.id_kabel, kabel.panjang as kp, satuan.nama_satuan');
        $builder->join('kabel', 'kabel.id_kabel = detail_permintaan_kabel.id_kabel');
        $builder->join('satuan', 'satuan.id_satuan = kabel.id_kabel');
        $builder->join('permintaan_kabel', 'permintaan_kabel.id_permintaan_kabel = permintaan_kabel.id_permintaan_kabel');
        $builder->join('user', 'user.id = permintaan_kabel.id');
        $where = array('permintaan_kabel.id_permintaan_kabel' => $id, 'detail_permintaan_kabel.status' => 4);
        $builder->where($where);
        $query = $builder->get();
        return $query->getResultArray();
    }
}