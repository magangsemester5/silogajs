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
        'id_barang', 'qty', 'serial_number', 'foto_serial_number', 'foto_pengambilan_paket'
    ];
    
    function getAll()
    {
        $builder = $this->db->table('barang_keluar');                                                              
        $builder->join('barang', 'barang.id_barang = barang_keluar.id_barang');
        $query = $builder->get();
        return $query->getResult();
    }
}
