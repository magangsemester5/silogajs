<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Satuan;

class C_Satuan extends BaseController
{
    public function __construct()
    {
        $this->satuan  = new M_Satuan();
        \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'title' => "Halaman Satuan | SILOG AJS",
            'tampildata' => $this->satuan->findAll()
        ];
        return view("Menu/Satuan/index", $data);
    }

    public function tambah()
    {
        $data = [
            'title' => "Halaman Tambah Satuan | SILOG AJS"
        ];
        return view("Menu/Satuan/tambah", $data);
    }

    public function proses_tambah()
    {
        $rules = [
            'nama_satuan' => [
                'label' => "Nama Satuan",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi"
                ]
            ]
        ];
        if ($this->validate($rules)) {
            $data = [
                'nama_satuan' => $this->request->getVar('nama_satuan')
            ];
            session()->setFlashdata('status', 'Data Satuan berhasil ditambahkan');
            $this->satuan->insert($data);
            return redirect()->to(base_url('tampil-satuan'))->with('status_icon', 'success')->with('status_text', 'Data Berhasil ditambah');
        } else {
            $data = [
                'title' => "Halaman Tambah Satuan | SILOG AJS"
            ];
            return view("Menu/Satuan/tambah", $data);
        }
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
        $where = [
            'id_satuan' => $id
        ];
        $cek_satuan = count((array) $this->satuan->cek_data_direlasi('material', 'kabel', $where));
        if ($cek_satuan > 0) {
            session()->setFlashdata('status', 'Cek data Pada tabel material dan kabel pastikan satuan yang terkait sudah tidak ada');
            return redirect()
                ->to(base_url('tampil-satuan'))
                ->with('status_icon', 'warning')
                ->with('status_text', 'Data Gagal Dihapus');
        } else {
            $this->satuan->delete($id);
            session()->setFlashdata('status', 'Data Satuan berhasil dihapus');
            return redirect()
                ->to(base_url('tampil-satuan'))
                ->with('status_icon', 'success')
                ->with('status_text', 'Data Berhasil dihapus');
        }
    }
}