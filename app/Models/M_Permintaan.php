<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Permintaan extends Model
{
    protected $table            = 'permintaan';
    protected $primaryKey       = 'id_permintaan';
    protected $useAutoIncrement = true;
    protected $returnType       = "object";
    protected $allowedFields    = [
        'id_permintaan', 'id_barang', 'no_permintaan', 'jumlah_permintaan', 'wilayah', 'status'
    ];
    function getAll()
    {
        $builder = $this->db->table('permintaan');                                                              
        $builder->join('barang', 'barang.id_barang = permintaan.id_barang');
        $query = $builder->get();
        return $query->getResult();
    }

    public function data_permintaan($id = null)
    {
        $builder = $this->db->table('permintaan');
        $builder->where('id_permintaan', $id);
        $query = $builder->get();
        return $query->getRowArray();
    }
    
    function update_data($where,$data,$table){
        $this->barang->where($where);
		$this->barang->update($table,$data);
	}
}
