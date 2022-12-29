<?php

namespace App\Models;

use CodeIgniter\Model;

class M_History_Permintaan_Material extends Model
{
    protected $table            = 'history_permintaan_material';
    protected $primaryKey       = 'id_history_permintaan_material';
    protected $useAutoIncrement = true;
    protected $returnType       = "object";
    protected $allowedFields    = [
        'req_id','no_permintaan', 'tanggal', 'nama', 'wilayah', 'no_telepon', 'nama_material', 'jumlah', 'nama_satuan', 'status'
    ];
    
    function generateCode()
    {
        $query = $this->db->query("SELECT MAX(no_permintaan) as no_permintaan from history_permintaan_material");
        $query = $query->getRow();
        return $query->no_permintaan;
    }

    function generateCodeReqID()
    {
        $query = $this->db->query("SELECT MAX(req_id) as req_id from history_permintaan_material");
        $query = $query->getRow();
        return $query->req_id;
    }

    function getGroupReqID() 
    {
        $builder = $this->db->table('history_permintaan_material');
        $builder->select('distinct(req_id),no_permintaan, nama, wilayah, no_telepon, tanggal');
        $query = $builder->get();
        return $query->getResult();
    }

    function deleteDataHistoryPermintaanMaterial($id)
    {
        $builder = $this->db->table('history_permintaan_material');
        $builder->where('req_id',$id);
        return $builder->delete();
    }  

    public function cekdatauserhistorypermintaanmaterial($id = null)
    {
        $builder = $this->db->table('history_permintaan_material');
        $builder->where('req_id', $id);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function cekdetailhistorypermintaanmaterial($id = null)
    {
        $builder = $this->db->table('history_permintaan_material');
        $builder->where('req_id', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
}