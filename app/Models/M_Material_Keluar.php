<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Material_Keluar extends Model
{
    protected $table            = 'material_keluar';
    protected $primaryKey       = 'id_material_keluar';
    protected $useAutoIncrement = true;
    protected $returnType       = "object";
    protected $allowedFields    = [
        'no_permintaan', 'nama', 'wilayah', 'tanggal_keluar', 'foto_penerima'
    ];

    function getRelasi($id)
    {
        $builder = $this->db->table('material_keluar');
        $builder->join('material', 'material.id_material = material_keluar.id_material');
        $builder->join('permintaan_material', 'permintaan_material.id_permintaan_material = material_keluar.id_permintaan_material');
        $builder->where('id_material_keluar', $id);
        $query = $builder->get();
        return $query->getResult();
    }

    public function cekWilayah($id = null)
    {
        $builder = $this->db->table('permintaan_material');
        $builder->join('user', 'user.id = permintaan_material.id');
        $builder->join('detail_permintaan_material', 'detail_permintaan_material.id_permintaan_material = permintaan_material.id_permintaan_material');
        $builder->join('material', 'material.id_material = detail_permintaan_material.id_material');
        $builder->where('permintaan_material.id_permintaan_material', $id);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function cekdetailmaterialkeluar($id = null)
    {
        $builder = $this->db->table('detail_permintaan_material');
        $builder->select('material.nama_material,detail_permintaan_material.jumlah as dpmj, material.serial_number, material.id_material, material.stok as ms, satuan.nama_satuan');
        $builder->join('material', 'material.id_material = detail_permintaan_material.id_material');
        $builder->join('satuan', 'satuan.id_satuan = material.id_satuan');
        $builder->join('permintaan_material', 'permintaan_material.id_permintaan_material = permintaan_material.id_permintaan_material');
        $builder->join('user', 'user.id = permintaan_material.id');
        $where = array('permintaan_material.id_permintaan_material' => $id, 'detail_permintaan_material.status' => 4);
        $builder->where($where);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function cekdatausersetelahdikirim($id = null)
    {
        $builder = $this->db->table('material_keluar');
        $builder->where('id_material_keluar', $id);
        $query = $builder->get();
        return $query->getRowArray();
    }
}