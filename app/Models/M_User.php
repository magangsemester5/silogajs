<?php

namespace App\Models;

use CodeIgniter\Model;

class M_User extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = "object";
    protected $allowedFields    = [
        'nama', 'password', 'id_user', 'jabatan', 'kriteria', 'foto_user', 'wilayah', 'no_telepon'
    ];

    function count_where_location()
    {
        $builder = $this->db->table('user');
        $builder->where('jabatan="Admin Wilayah"');
        $query = $builder->countAllResults();;
        return $query;
    }
}