<?php

namespace App\Controllers;

use App\Models\M_Material;

use App\Controllers\BaseController;

class C_Dashboard extends BaseController
{
    public function __construct()
    {
        $this->material = new M_Material();
    }

    public function index()
    {
        $data = [
            'title' => "Halaman Dashboard | SILOG AJS",
            'data_material' => $this->material->count('material'),
            'material_masuk' => $this->material->count('material_masuk'),
            'material_keluar' => $this->material->count('material_keluar'),
            'user' => $this->material->count('user'),
            'nama_material_masuk' => $this->material->chartMaterialMasuk(),
            'nama_material_keluar' => $this->material->chartMaterialKeluar()
        ];
        return view("Dashboard/index", $data);
    }
}
