<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Satuan;

class C_Satuan extends BaseController
{
    public function __construct()
    {
        $this->satuan  = new M_Satuan();
    }

    public function index()
    {
        $data = [
            'title' => "Halaman Satuan | SILOG AJS",
            'tampildata' => $this->satuan->findAll()
        ];
        return view("Menu/Satuan/index",$data);
    }

    public function tambah()
    {
        $data = [
            'title' => "Halaman Tambah Satuan | SILOG AJS"
        ];
        return view("Menu/Satuan/tambah",$data);
    }

}
