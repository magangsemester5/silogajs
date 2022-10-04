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
        return redirect()->to(base_url('tampil-kategori'))->with('status_icon', 'success')->with('status_text', 'Data Berhasil ditambah');
    }

    public function edit($id)
    {
        $data = [
            'title' => "Halaman Ubah Kategori | SILOG AJS",
            'tampildata' => $this->kategori->where('id_kategori', $id)->first()
        ];
        return view("Menu/Kategori/edit", $data);
    }

    public function proses_edit()
    {
        $loadmodel = $this->request->getVar('id_kategori');
        $data = [
            'nama_kategori' => $this->request->getVar('nama_kategori'),
        ];
        session()->setFlashdata('status', 'Data Kategori berhasil diupdate');
        $this->kategori->update($loadmodel, $data);
        return redirect()
            ->to(base_url('tampil-kategori'))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data Berhasil diupdate');
    }

    public function hapus($id_kategori)
    {
        $this->kategori->delete($id_kategori);
        session()->setFlashdata('status', 'Data Kategori berhasil dihapus');
        return redirect()
            ->to(base_url('tampil-kategori'))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data Berhasil dihapus');
    }
}
