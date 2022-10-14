<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Auth extends Model
{
    protected $table = "user";
    protected $primaryKey = "id";
    protected $returnType = "object";
    protected $allowedFields = ['nama', 'jabatan', 'id_user', 'kriteria', 'password'];

    function query_validasi_id_user($id_user)
    {
        $result = $this->db->query("SELECT * FROM user WHERE id_user='$id_user'");
        return $result;
    }

    function query_validasi_password($id_user, $password)
    {
        $result = $this->db->query("SELECT * FROM user WHERE id_user='$id_user' AND password='$password' LIMIT 1");
        return $result;
    }
}
