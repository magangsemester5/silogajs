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
            'data_barang' => $this->barang->count('barang'),
            'barang_masuk' => $this->barang->count('barang_masuk'),
            'barang_keluar' => $this->barang->count('barang_keluar'),
            'user' => $this->barang->count('user'),
            'nama_barang_masuk' => $this->barang->chartBarangMasuk(),
            'nama_barang_keluar' => $this->barang->chartBarangKeluar()
        ];
        return view("Dashboard/index", $data);
    }
}
