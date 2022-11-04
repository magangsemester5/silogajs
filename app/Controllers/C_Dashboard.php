<?php

namespace App\Controllers;

use App\Models\M_Material;
use App\Models\M_Kabel;
use App\Models\M_Detail_Permintaan_Kabel;
use App\Models\M_Detail_Material_Keluar;
use App\Models\M_Detail_Kabel_Keluar;
use App\Models\M_Detail_Permintaan_Material;
use App\Models\M_User;

use App\Controllers\BaseController;

class C_Dashboard extends BaseController
{
    public function __construct()
    {
        $this->material = new M_Material();
        $this->kabel = new M_Kabel();
        $this->detail_permintaan_kabel = new M_Detail_Permintaan_Kabel();
        $this->detail_material_keluar = new M_Detail_Material_Keluar();
        $this->detail_kabel_keluar = new M_Detail_Kabel_Keluar();
        $this->detail_permintaan_material = new M_Detail_Permintaan_Material();
        $this->user = new M_User();
    }

    public function index()
    {
        $data = [
            'title' => "Halaman Dashboard | SILOG AJS",
            'data_material' => $this->material->count('material'),
            'data_kabel' => $this->kabel->count('kabel'),
            // 'material_masuk' => $this->material->count('material_masuk'),
            'material_keluar' => $this->detail_material_keluar->countMaterialKeluar(),
            // 'kabel_masuk' => $this->kabel->count('kabel_masuk'),
            'kabel_keluar' => $this->detail_kabel_keluar->countKabelKeluar(),
            'user_keseluruhan' => $this->material->count('user'),
            'user_admin_wilayah' => $this->user->count_where_location(),
            // 'nama_material_masuk' => $this->material->chartMaterialMasuk(),
            // 'nama_material_keluar' => $this->material->chartMaterialKeluar()
        ];
        return view("Dashboard/index", $data);
    }
}