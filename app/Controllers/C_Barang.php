<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Barang;
use App\Models\M_Kategori;
use App\Models\M_Satuan;

class C_Barang extends BaseController
{
    public function __construct()
    {
        $this->kategori  = new M_Kategori();
        $this->barang  = new M_Barang();
        $this->satuan  = new M_Satuan();
    }

    public function index()
    {
        $data = [
            'title' => "Halaman Barang | SILOG AJS",
            'tampildata' => $this->barang->getAll()
        ];
        return view("Menu/Barang/index", $data);
    }
    public function tambah()
    {
        $data = [
            'title' => "Halaman Tambah Barang | SILOG AJS",
            'tampildatakategori' => $this->kategori->findAll(),
            'tampildatasatuan' => $this->satuan->findAll()
        ];
        return view("Menu/Barang/tambah",$data);
    }
    public function proses_tambah()
    {
        $data = [
            'id_kategori' => $this->request->getVar('id_kategori'),
            'id_satuan' => $this->request->getVar('id_satuan'),
            'kode_barang' => $this->request->getVar('kode_barang'),
            'nama_barang' => $this->request->getVar('nama_barang'),
            'stok' => $this->request->getVar('stok')
        ];
        session()->setFlashdata('status', 'Data Barang berhasil ditambahkan');
        $this->barang->insert($data);
        return redirect()->to(base_url('C_Barang/index'))->with('status_icon', 'success')->with('status_text', 'Data Berhasil ditambah');
    }

    public function tampil_edit_data($id)
    {
        $data = [
            'title' => "Halaman Ubah Barang | SILOG AJS",
            'tampildata' => $this->barang->where('id_barang', $id)->first()
        ];
        return view("Menu/Barang/edit", $data);
    }
}
