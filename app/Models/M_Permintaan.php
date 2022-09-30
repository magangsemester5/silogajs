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
        'id_permintaan','id_material','id_kabel','no_permintaan', 'jumlah_permintaan', 'wilayah', 'status'
    ];
    function getAll()
    {
        $builder = $this->db->table('permintaan');                                                              
        $builder->join('material', 'material.id_material = permintaan.id_material');
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
        $this->material->where($where);
		$this->material->update($table,$data);
	}
}
