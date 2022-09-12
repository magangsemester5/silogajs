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
        $db      = \Config\Database::connect();
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
        $getGenerate = $this->barang_keluar->generateCode();
        $nourut = substr($getGenerate, 3, 4);
        $kodeBarangGenerate = $nourut + 1;
        $data = [
            'title' => "Halaman Tambah Barang Keluar | SILOG AJS",
            'tampildatabarang' => $this->barang->findAll(),
            'kode_barang_keluar' => $kodeBarangGenerate
        ];
        return view("Menu/Barang_Keluar/tambah", $data);
    }

    public function proses_tambah_barang_keluar()
    {
        $image = $this->request->getFile('foto_pengambilan_barang');
        $image->move(WRITEPATH . 'uploads');
        $data =
            [
                'kode_barang_keluar' => $this->request->getVar('kode_barang_keluar'),
                'id_barang' => $this->request->getVar('id_barang'),
                'qty' => $this->request->getVar('qty'),
                'foto_pengambilan_barang' => $image->getClientName()
            ];
        $this->barang->insert($data);
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

    public function hapus($id = null)
    {
        session()->setFlashdata('status', 'Data Barang Keluar berhasil dihapus');
        $data['tampildata'] = $this->barang_keluar->where('id_barang_keluar', $id)->delete($id);
        return redirect()->to(base_url('tampil-barangkeluar'))->with('status_icon', 'success')->with('status_text', 'Data Berhasil dihapus');
    }

    public function tampil_otomatis_data_barang($id = null)
    {
        $model = new M_Barang();
        $data = $model->find($id);
        return json_encode($data);
    }
}
