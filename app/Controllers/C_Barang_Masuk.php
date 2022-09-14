<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Barang_Keluar;
use App\Models\M_Barang;

class C_Barang_Masuk extends BaseController
{
    public function __construct()
    {
        $this->barang_keluar = new M_Barang_Keluar();
        $this->barang = new M_Barang();
    }

    public function index()
    {
        $data = [
            'title' => 'Halaman Barang Keluar | SILOG AJS',
            'tampildata' => $this->barang_keluar->getAll(),
        ];
        return view('Menu/Barang_Keluar/index', $data);
    }
}
