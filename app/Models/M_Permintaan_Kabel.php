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
        'id', 'no_permintaan', 'tanggal'
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
        $builder = $this->db->table('permintaan_kabel');
        $builder->join('user', 'user.id = permintaan_kabel.id');
        $builder->where('permintaan_kabel.id_permintaan_kabel', $id);
        $query = $builder->get();
        return $query->getResult();
    }

    function generateCode()
    {
        $query = $this->db->query("SELECT MAX(no_permintaan) as no_permintaan from permintaan_kabel");
        $query = $query->getRow();
        return $query->no_permintaan;
    }

    function getDataPermintaanKabelByStatus()
    {
        $builder = $this->db->table('permintaan_kabel');
        $builder->select('permintaan_kabel.id_permintaan_kabel, permintaan_kabel.no_permintaan, detail_permintaan_kabel.status');
        $builder->join('detail_permintaan_kabel', 'detail_permintaan_kabel.id_permintaan_kabel = permintaan_kabel.id_permintaan_kabel');
        $builder->where('detail_permintaan_kabel.status', 4);
        $builder->groupBy('permintaan_kabel.id_permintaan_kabel');
        $query = $builder->get();
        return $query->getResult();
    }

    function deleteData($id_permintaan_kabel)
    {
        $builder = $this->db->table('permintaan_kabel');
        $builder->where('id_permintaan_kabel', $id_permintaan_kabel)->delete();
    }
}