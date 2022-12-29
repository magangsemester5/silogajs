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

    public function verifikasi_email($email)
    {
        $builder = $this->db->table('user');
        $builder->where('email', $email);
        $result = $builder->get();
		if($result->getRowArray() > 0)
		{
			return $result->getRowArray();
		}else{
			return FALSE;
		}
    }

    public function reset_password($reset_key, $password)
    {
        $this->db->where('reset_password', $reset_key);
        $data = array('password' => $password);
        $this->db->update('member', $data);
        return ($this->db->affected_rows()>0 )? TRUE:FALSE;
    }
}