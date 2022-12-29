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
        'no_hasbell', 'core', 'nama_satuan', 'tanggal_masuk', 'no_delivery_order', 'panjang_masuk', 'gudang', 'merek', 'foto_penerima'
    ];

    function generateCode()
    {
        $query = $this->db->query("SELECT MAX(no_delivery_order) as no_delivery_order from kabel_masuk");
        $query = $query->getRow();
        return $query->no_delivery_order;
    }

    public function cekStok($id = null)
    {
        $builder = $this->db->table('kabel');
        $builder->join('satuan', 'satuan.id_satuan = kabel.id_satuan');
        $builder->where('id_kabel', $id);
        $query = $builder->get();
        return $query->getRowArray();
    }
}