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
            'user' => $this->barang->count('user')
        ];

        // Line Chart
		$bln = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
		$data['cbm'] = [];
		$data['cbk'] = [];

		foreach ($bln as $b) {
			$data['cbm'][] = $this->barang->chartBarangMasuk($b);
			$data['cbk'][] = $this->barang->chartBarangKeluar($b);
		}

        return view("Dashboard/index", $data);
    }
}
