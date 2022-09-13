<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Barang_Keluar extends Model
{
    protected $table            = 'barang_keluar';
    protected $primaryKey       = 'id_barang_keluar';
    protected $useAutoIncrement = true;
    protected $returnType       = "object";
    protected $allowedFields    = [
        'id_barang', 'kode_barang_keluar', 'qty', 'foto_pengambilan_barang'
    ];

    function getAll()
    {
        $builder = $this->db->table('barang_keluar');
        $builder->join('barang', 'barang.id_barang = barang_keluar.id_barang');
        $query = $builder->get();
        return $query->getResult();
    }

    function generateCode()
    {
        $query = $this->db->query("SELECT MAX(kode_barang_keluar) as kode_barang_keluar from barang_keluar");
        $query = $query->getRow();
        return $query->kode_barang_keluar;
    }
}