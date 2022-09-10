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
        'id_barang', 'qty', 'foto_pengambilan_paket', 'kode_barang_keluar'
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
        $builder = $this->table('barang_keluar');
        $builder->selectMax('kode_barang_keluar', 'kode_barang_keluar');
        $query = $builder->get();

        if ($query->getNumRows() > 0) {
            foreach ($query->getResult() as $key) {
                $kd = '';
                $ambildata = substr($key->kode_barang_keluar, -4);
                $increment = intval($ambildata) + 1;
                $kd = sprintf('%04s', $increment);
            }
        } else {
            $kd = '0001';
        }
        return 'G-' . $kd;
    }
}
