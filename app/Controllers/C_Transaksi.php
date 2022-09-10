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

    public function tambah()
    {
        $data = [
            'title' => "Halaman Tambah Barang Keluar | SILOG AJS",
            'tampildatabarang' => $this->barang->findAll()
        ];
        return view("Menu/Barang_Keluar/tambah", $data);
    }

    public function proses_tambah_barang_keluar()
    {
        $validasi = $this->validate([
            'foto_pengambilan_paket' => 'uploaded[foto_pengambilan_paket]|max_size[foto_pengambilan_paket,100]'
                . '|mime_in[foto_pengambilan_paket,image/png,image/jpg,image/gif]'
                . '|ext_in[foto_pengasmbilan_barang,png,jpg,gif]|max_dims[foto_pengambilan_paket,1024,768]',
        ]);
        if ($validasi) {
            $dataFoto = $this->request->getFile('foto_pengambilan_paket');
            $dataFoto->move(WRITEPATH . '../img/barang_keluar/pengambilan_barang');
            $dataFoto_name = "";    
            $dataFoto_name = $dataFoto->getName();
            $data = [
                'id_barang' => $this->request->getVar('id_barang'),
                'kode_barang_keluar' => $this->request->getVar('kode_barang_keluar'),
                'qty' => $this->request->getVar('qty'),
                'foto_pengambilan_paket' => $dataFoto_name
            ];
            $this->barang_keluar->insert($data);
        }
        session()->setFlashdata('status', 'Data Barang Keluar berhasil ditambahkan');
        return redirect()->to(base_url('tampil-barangkeluar'))->with('status_icon', 'success')->with('status_text', 'Data Berhasil ditambah');
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

    public function tampil_otomatis_data_barang($id = null)
    {
        $model = new M_Barang();
        $data = $model->find($id);
        return json_encode($data);
    }

    public function auto_code_barang_masuk()
    {
        return json_encode($this->barang->generateCode());
    }
    public function auto_code_barang_keluar()
    {
        return json_encode($this->barang_keluar->generateCode());
    }
}
