<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Kategori;

class C_Kategori extends BaseController
{
    public function __construct()
    {
        $this->kategori  = new M_Kategori();
    }
    public function index()
    {
        $data = [
            'title' => "Halaman Kategori | SILOG AJS",
            'tampildata' => $this->kategori->findAll()
        ];
        return view("Menu/Kategori/index", $data);
    }
    public function tambah()
    {
        $data = [
            'title' => "Halaman Tambah Kategori | SILOG AJS"
        ];
        return view("Menu/Kategori/tambah", $data);
    }

    public function proses_tambah()
    {
        $data = [
            'nama_kategori' => $this->request->getVar('nama_kategori')
        ];
        session()->setFlashdata('status', 'Data Kategori berhasil ditambahkan');
        $this->kategori->insert($data);
        return redirect()->to(base_url('C_Kategori/index'))->with('status_icon', 'success')->with('status_text', 'Data Berhasil ditambah');
    }

    public function tampil_edit_data($id)
    {
        $data = [
            'title' => "Halaman Ubah Kategori | SILOG AJS",
            'tampildata' => $this->kategori->where('katid', $id)->first()
        ];
        return view("Menu/Kategori/edit", $data);
    }
}
