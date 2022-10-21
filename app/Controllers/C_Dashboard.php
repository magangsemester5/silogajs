<?php

namespace App\Controllers;

use App\Models\M_Material;
use App\Models\M_Kabel;
use App\Models\M_User;

use App\Controllers\BaseController;

class C_Dashboard extends BaseController
{
    public function __construct()
    {
        $this->material = new M_Material();
        $this->kabel = new M_Kabel();
        $this->user = new M_User();
    }

    public function index()
    {
        $data = [
            'title' => "Halaman Dashboard | SILOG AJS",
            'data_material' => $this->material->count('material'),
            'data_kabel' => $this->kabel->count('kabel'),
            // 'material_masuk' => $this->material->count('material_masuk'),
            // 'material_keluar' => $this->material->count('material_keluar'),
            // 'kabel_masuk' => $this->kabel->count('kabel_masuk'),
            // 'kabel_keluar' => $this->kabel->count('kabel_keluar'),
            'user_keseluruhan' => $this->material->count('user'),
            'user_admin_wilayah' => $this->user->count_where_location(),
            // 'nama_material_masuk' => $this->material->chartMaterialMasuk(),
            // 'nama_material_keluar' => $this->material->chartMaterialKeluar()
        ];
        return view("Dashboard/index", $data);
    }
}