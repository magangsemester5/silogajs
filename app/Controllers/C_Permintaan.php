<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Permintaan_Material;
use App\Models\M_Permintaan_Kabel;
use App\Models\M_Detail_Permintaan_Material;
use App\Models\M_Detail_Permintaan_Kabel;

class C_Permintaan extends BaseController
{
    public function __construct()
    {
        $this->permintaan_material = new M_Permintaan_Material();
        $this->permintaan_kabel = new M_Permintaan_Kabel();
        $this->detail_permintaan_material = new M_detail_Permintaan_Material();
        $this->detail_permintaan_kabel = new M_Detail_Permintaan_Kabel();
    }

    public function permintaan_material()
    {
        $data = [
            'title' => 'Halaman Permintaan material | SILOG AJS',
            'tampildata' => $this->permintaan_material->getAll(),
        ];
        return view('Menu/Permintaan/Material/index', $data);
    }

    public function permintaan_kabel()
    {
        $data = [
            'title' => 'Halaman Permintaan kabel | SILOG AJS',
            'tampildata' => $this->permintaan_kabel->getAll(),
        ];
        return view('Menu/Permintaan/Kabel/index', $data);
    }

    public function detail_permintaan_kabel($id)
    {
        $data = [
            'title' => 'Halaman Detail Permintaan kabel | SILOG AJS',
            'tampildata' => $this->permintaan_kabel->getById($id),
            'tampildatarelasi' => $this->permintaan_kabel->getAllRelation()
        ];
        return view('Menu/Permintaan/Kabel/detail', $data);
    }

    public function tampil_otomatis_data_permintaan($id = null)
    {
        $data = $this->permintaan->data_permintaan($id);
        return json_encode($data);
    }
}
