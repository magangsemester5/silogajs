<?php

namespace App\Controllers;

use App\Models\M_Barang;

use App\Controllers\BaseController;

class C_Dashboard extends BaseController
{
    public function __construct()
    {
        $this->barang = new M_Barang();
    }

    public function index()
    {
        $data = [
            'title' => "Halaman Dashboard | SILOG AJS",
            'stok' => $this->barang->sum('barang', 'stok'),
            'barang_masuk' => $this->barang->count('barang_masuk'),
            'barang_keluar' => $this->barang->count('barang_keluar'),
            'user' => $this->barang->count('user')
        ];

        return view("Dashboard/index", $data);
    }
}
