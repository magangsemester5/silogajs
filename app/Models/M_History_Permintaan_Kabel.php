<?php

namespace App\Models;

use CodeIgniter\Model;

class M_History_Permintaan_Kabel extends Model
{
    protected $table            = 'history_permintaan_kabel';
    protected $primaryKey       = 'id_history_permintaan_kabel';
    protected $useAutoIncrement = true;
    protected $returnType       = "object";
    protected $allowedFields    = [
        'req_id','no_permintaan', 'tanggal', 'nama', 'wilayah', 'no_telepon', 'no_drum', 'core', 'panjang', 'nama_satuan', 'status'
    ];

    function generateCode()
    {
        $query = $this->db->query("SELECT MAX(no_permintaan) as no_permintaan from history_permintaan_kabel");
        $query = $query->getRow();
        return $query->no_permintaan;
    }

    function generateCodeReqID()
    {
        $query = $this->db->query("SELECT MAX(req_id) as req_id from history_permintaan_kabel");
        $query = $query->getRow();
        return $query->req_id;
    }

    function getGroupReqID() 
    {
        $builder = $this->db->table('history_permintaan_kabel');
        $builder->select('distinct(req_id),no_permintaan, nama, wilayah, no_telepon, tanggal');
        $query = $builder->get();
        return $query->getResult();
    }

    public function cekdatauserhistorypermintaankabel($id = null)
    {
        $builder = $this->db->table('history_permintaan_kabel');
        $builder->where('req_id', $id);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function cekdetailhistorypermintaankabel($id = null)
    {
        $builder = $this->db->table('history_permintaan_kabel');
        $builder->where('req_id', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }

    function deleteDataHistoryPermintaanKabel($id)
    {
        $builder = $this->db->table('history_permintaan_kabel');
        $builder->where('req_id', $id);
        return $builder->delete();
    }  

}