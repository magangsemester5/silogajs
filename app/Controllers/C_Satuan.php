<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Satuan;

class C_Satuan extends BaseController
{
    public function __construct()
    {
        $this->satuan  = new M_Satuan();
    }

    public function index()
    {
        $data = [
            'title' => "Halaman Satuan | SILOG AJS",
            'tampildata' => $this->satuan->findAll()
        ];
        return view("Menu/Satuan/index",$data);
    }

    public function tambah()
    {
        $data = [
            'title' => "Halaman Tambah Satuan | SILOG AJS"
        ];
        return view("Menu/Satuan/tambah",$data);
    }

    public function proses_tambah()
    {
        $data = [
            'nama_satuan' => $this->request->getVar('nama_satuan')
        ];
        session()->setFlashdata('status', 'Data Satuan berhasil ditambahkan');
        $this->satuan->insert($data);
        return redirect()->to(base_url('tampil-satuan'))->with('status_icon', 'success')->with('status_text', 'Data Berhasil ditambah');
    }

    public function edit($id)
    {
        $data = [
            'title' => "Halaman Ubah Satuan | SILOG AJS",
            'tampildata' => $this->satuan->where('id_satuan', $id)->first()
        ];
        return view("Menu/satuan/edit", $data);
    }

    public function proses_edit()
    {
        $loadmodel = $this->request->getVar('id_satuan');
        $data = [
            'nama_satuan' => $this->request->getVar('nama_satuan'),
        ];
        session()->setFlashdata('status', 'Data Satuan berhasil diupdate');
        $this->satuan->update($loadmodel, $data);
        return redirect()
            ->to(base_url('tampil-satuan'))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data Berhasil diupdate');
    }

    public function hapus($id)
    {
        $this->satuan->delete($id);
        session()->setFlashdata('status', 'Data Satuan berhasil dihapus');
        return redirect()
            ->to(base_url('tampil-satuan'))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data Berhasil dihapus');
    }

}
