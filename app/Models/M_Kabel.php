<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Kabel extends Model
{
    protected $table            = 'kabel';
    protected $primaryKey       = 'id_kabel';
    protected $useAutoIncrement = true;
    protected $returnType       = "object";
    protected $allowedFields    = [
        'id_kategori', 'id_satuan', 'no_drum','core','panjang', 'serial_number', 'foto_serial_number'
    ];
    function getAll()
    {
        $builder = $this->db->table('kabel');
        $builder->join('kategori', 'kategori.id_kategori = kabel.id_kategori');
        $builder->join('satuan', 'satuan.id_satuan = kabel.id_satuan');
        $query = $builder->get();
        return $query->getResult();
    }
}