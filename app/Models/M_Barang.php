<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Barang extends Model
{
    protected $table            = 'barang';
    protected $primaryKey       = 'id_barang';
    protected $useAutoIncrement = true;
    protected $returnType       = "object";
    protected $allowedFields    = [
        'id_kategori', 'id_satuan', 'kode_barang', 'nama_barang', 'stok', 'serial_number','foto_serial_number'
    ];
    
    function getAll()
    {
        $builder = $this->db->table('barang');                                                              
        $builder->join('kategori', 'kategori.id_kategori = barang.id_kategori');
        $builder->join('satuan', 'satuan.id_satuan = barang.id_satuan');
        $query = $builder->get();
        return $query->getResult();
    }
    
    function generateCode()
    {
        $builder = $this->table('barang');
        $builder->selectMax('kode_barang', 'kode_barangMax');
        $query = $builder->get();

        if ($query->getNumRows() > 0) {
            foreach ($query->getResult() as $key) {
                $kd = '';
                $ambildata = substr($key->kode_barangMax, -4);
                $increment = intval($ambildata) + 1;
                $kd = sprintf('%04s', $increment);
            }
        } else {
            $kd = '0001';
        }
        return 'G-' . $kd;
    }
}
