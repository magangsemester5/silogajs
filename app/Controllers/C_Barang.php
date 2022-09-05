<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Barang;

class C_Barang extends BaseController
{
    public function __construct()
    {
        $this->barang  = new M_Barang();
    }

    public function index()
    {
        $data = [
            'title' => "Halaman Barang | SILOG AJS",
            'tampildata' => $this->barang->findAll()
        ];
        return view("Menu/Barang/index", $data);
    }
    public function tambah()
    {
        $data = [
            'title' => "Halaman Tambah Barang | SILOG AJS"
        ];
        return view("Menu/Barang/tambah",$data);
    }
}
