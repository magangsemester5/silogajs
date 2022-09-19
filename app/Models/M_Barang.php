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
        'id_kategori', 'id_satuan', 'kode_barang', 'nama_barang', 'stok', 'serial_number', 'foto_serial_number'
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
        $query = $this->db->query("SELECT MAX(kode_barang) as kode_barang from barang");
        $query = $query->getRow();
        return $query->kode_barang;
    }
    public function cekStok($id = null)
    {
        $builder = $this->db->table('barang');
        $builder->join('satuan', 'satuan.id_satuan = barang.id_satuan');
        $builder->where('id_barang', $id);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function chartBarangMasuk($bulan)
	{
		$like = 'BRM' . date('y') . $bulan;
        $builder = $this->db->table('barang_masuk');
        $builder->like('id_barang_masuk', $like, 'after');
        $query = $builder->get();
		return count($query->getResultArray());
	}

	public function chartBarangKeluar($bulan)
	{
		$like = 'BKR' . date('y') . $bulan;
        $builder = $this->db->table('barang_keluar');
        $builder->like('id_barang_keluar', $like, 'after');
        $query = $builder->get();
		return count($query->getResultArray());
	}

    public function sum($table, $field)
    {
        $builder = $this->db->table($table);
        $builder->selectSum($field);
        $query = $builder->get();
        return $query->getRowArray()[$field];
    }

    function update_data($where, $data, $table)
    {
        $this->barang->where($where);
        $this->barang->update($table, $data);
    }

    function count($table)
    {
       $builder = $this->db->table($table);
       $query = $builder->countAllResults();
       return $query;
    }
}
