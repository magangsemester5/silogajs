<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Barang_Keluar;
use App\Models\M_Barang;

class C_Transaksi extends BaseController
{
    public function __construct()
    {
        $this->barang_keluar  = new M_Barang_Keluar();
        $this->barang  = new M_Barang();
    }

    public function index()
    {
        $data = [
            'title' => "Halaman Barang Keluar | SILOG AJS",
            'tampildata' => $this->barang_keluar->getAll()
        ];
        return view("Menu/Barang_Keluar/index", $data);
    }

    public function detail($id = null)
    {
        $data = [
            'tampildata' => $this->barang_keluar->where('id_barang_keluar', $id)->first(),
            'tampildatabarang' => $this->barang->findAll(),
            'title' => "Halaman Detail Barang Keluar | SILOG AJS"
        ];
        return view("Menu/Barang_Keluar/detail", $data);
    }
}
