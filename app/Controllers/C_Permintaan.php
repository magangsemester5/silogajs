<?php

namespace App\Controllers;
use App\Models\M_Permintaan;

use App\Controllers\BaseController;

class C_Permintaan extends BaseController
{
    public function __construct()
    {
        $this->permintaan  = new M_Permintaan();
    }

    public function index()
    {
        $data = [
            'title' => "Halaman Permintaan | SILOG AJS",
            'tampildata' => $this->permintaan->findAll()
        ];
        return view("Menu/Permintaan/index", $data);
    }

    public function tampil_otomatis_data_permintaan($id = null)
    {
        $data = $this->permintaan->data_permintaan_db($id);
        return json_encode($data);
    }
}
