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
                'rules' => "required|is_unique[satuan.nama_satuan]|regex_match[/^([a-z ])+$/i]",
                'errors' => [
                    'required' => "{field} harus diisi",
                    'is_unique' => "{field} yang dimasukan Sudah ada",
                    'regex_match' => "{field} yang dimasukan harus berupa alphabet"
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
            $this->satuan->delete($id);
            session()->setFlashdata('status', 'Data Satuan berhasil dihapus');
            return redirect()
                ->to(base_url('tampil-satuan'))
                ->with('status_icon', 'success')
                ->with('status_text', 'Data Berhasil dihapus');
        }
}