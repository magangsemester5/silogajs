<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Barang_Masuk extends Model
{
    protected $table            = 'barang_masuk';
    protected $primaryKey       = 'id_barang_masuk';
    protected $useAutoIncrement = true;
    protected $returnType       = "object";
    protected $allowedFields    = [
        'id_barang', 'tanggal_masuk', 'kode_barang_masuk', 'jumlah_masuk', 'foto_pengirim_barang'
    ];

    function getAll()
    {
        $builder = $this->db->table('barang_masuk');
        $builder->join('barang', 'barang.id_barang = barang_masuk.id_barang');
        $query = $builder->get();
        return $query->getResult();
    }

    function getRelasi($id)
    {
        $builder = $this->db->table('barang_masuk');
        $builder->join('barang', 'barang.id_barang = barang_masuk.id_barang');
        $builder->where('id_barang_masuk', $id);
        $query = $builder->get();
        return $query->getResult();
    }

    function generateCode()
    {
        $query = $this->db->query("SELECT MAX(kode_barang_masuk) as kode_barang_masuk from barang_masuk");
        $query = $query->getRow();
        return $query->kode_barang_masuk;
    }

    function update_data_db()
    {
        $query = $this->db->query("SELECT * FROM barang_masuk");
        $query = $query->getRow();
        return $query->kode_barang_masuk;
    }

    public function cekStok($id = null)
    {
        $builder = $this->db->table('barang_masuk');                                                              
        $builder->join('barang', 'barang.id_barang = barang_masuk.id_barang');
        $builder->where('id_barang_masuk', $id);
        $query = $builder->get();
        return $query->getRowArray();
    }
}
