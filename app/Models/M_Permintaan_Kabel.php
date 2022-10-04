<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Permintaan_Kabel extends Model
{
    protected $table            = 'permintaan_kabel';
    protected $primaryKey       = 'id_permintaan_kabel';
    protected $useAutoIncrement = true;
    protected $returnType       = "object";
    protected $allowedFields    = [
        'id_permintaan','id','no_permintaan','wilayah'
    ];

    function getAll()
    {
        $builder = $this->db->table('permintaan_kabel');                                                              
        $builder->join('user', 'user.id = permintaan_kabel.id');
        $query = $builder->get();
        return $query->getResult();
    }

    function getById($id)
    {
        $builder = $this->db->table('kabel');      
        $builder->join('detail_permintaan_kabel', 'detail_permintaan_kabel.id_kabel = kabel.id_kabel');
        $builder->join('permintaan_kabel', 'permintaan_kabel.id_permintaan_kabel = detail_permintaan_kabel.id_permintaan_kabel');                                                        
        $builder->getWhere('permintaan_kabel.id_permintaan_kabel',$id);
        $query = $builder->get();
        return $query->getResultArray();
    }

    function getAllRelation()
    {
        $builder = $this->db->table('kabel');      
        $builder->join('detail_permintaan_kabel', 'detail_permintaan_kabel.id_kabel = kabel.id_kabel');
        $builder->join('permintaan_kabel', 'permintaan_kabel.id_permintaan_kabel = detail_permintaan_kabel.id_permintaan_kabel');                                                        
        $query = $builder->get();
        return $query->getResultArray();
    }
}
