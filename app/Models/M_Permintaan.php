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
        'id_permintaan', 'id_barang', 'no_permintaan', 'jumlah_permintaan', 'wilayah'
    ];

    public function data_permintaan_db($id = null)
    {
        $builder = $this->db->table('permintaan');
        $builder->where('id_permintaan', $id);
        $query = $builder->get();
        return $query->getRowArray();
    }
}
