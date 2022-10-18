<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Kabel_Masuk extends Model
{
    protected $table            = 'kabel_masuk';
    protected $primaryKey       = 'id_kabel_masuk';
    protected $useAutoIncrement = true;
    protected $returnType       = "object";
    protected $allowedFields    = [
        'id_kabel','id_satuan','tanggal_masuk', 'no_delivery_order', 'jumlah_masuk','gudang','foto_penerima'
    ];

    function getAll()
    {
        $builder = $this->db->table('kabel_masuk');
        $builder->join('kabel', 'kabel.id_kabel = kabel_masuk.id_kabel');
        $query = $builder->get();
        return $query->getResult();
    }

    function getRelasi($id)
    {
        $builder = $this->db->table('kabel_masuk');
        $builder->join('kabel', 'kabel.id_kabel = kabel_masuk.id_kabel');
        $builder->where('id_kabel_masuk', $id);
        $query = $builder->get();
        return $query->getResult();
    }

    public function cekStok($id = null)
    {
        $builder = $this->db->table('kabel_masuk');                                                              
        $builder->join('kabel', 'kabel.id_kabel = kabel_masuk.id_kabel');
        $builder->where('id_kabel_masuk', $id);
        $query = $builder->get();
        return $query->getRowArray();
    }
}
