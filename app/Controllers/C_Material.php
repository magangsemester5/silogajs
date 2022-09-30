<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Material;
use App\Models\M_Kategori;
use App\Models\M_Satuan;

class C_material extends BaseController
{
    public function __construct()
    {
        $this->kategori = new M_Kategori();
        $this->material = new M_Material();
        $this->satuan = new M_Satuan();
    }

    public function index()
    {
        $data = [
            'title' => 'Halaman material | SILOG AJS',
            'tampildata' => $this->material->getAll(),
        ];
        return view('Menu/material/index', $data);
    }
    public function tambah()
    {
        $getGenerate = $this->material->generateCode();
        $nourut = substr($getGenerate, 3, 4);
        $kodematerialGenerate = $nourut + 1;
        $data = [
            'title' => 'Halaman Tambah material | SILOG AJS',
            'tampildatakategori' => $this->kategori->findAll(),
            'tampildatasatuan' => $this->satuan->findAll(),
            'kode_material' => $kodematerialGenerate,
            'validation' => \Config\Services::validation()
        ];
        return view('Menu/material/tambah', $data);
    }
    public function proses_tambah()
    {
        $image = $this->request->getFile('foto_serial_number');
        $image->move(ROOTPATH . 'public/uploads');
        $data = [
            'id_kategori' => $this->request->getVar('id_kategori'),
            'id_satuan' => $this->request->getVar('id_satuan'),
            'kode_material' => $this->request->getVar('kode_material'),
            'nama_material' => $this->request->getVar('nama_material'),
            'stok' => $this->request->getVar('stok'),
            'serial_number' => $this->request->getVar('serial_number'),
            'foto_serial_number' => $image->getClientName(),
        ];
        session()->setFlashdata('status', 'Data material berhasil ditambahkan');
        $this->material->insert($data);
        return redirect()
            ->to(base_url('tampil-material'))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data Berhasil ditambah');
    }

    public function edit($id = null)
    {
        $data = [
            'tampildata' => $this->material->where('id_material', $id)->first(),
            'tampildatakategori' => $this->kategori->findAll(),
            'tampildatasatuan' => $this->satuan->findAll(),
            'title' => 'Halaman Edit material | SILOG AJS',
        ];
        return view('Menu/material/edit', $data);
    }

    public function proses_edit()
    {
        $loadmodel = $this->request->getVar('id_material');
        $dataId = $this->material->find($loadmodel);
        $image = $this->request->getFile('foto_serial_number');
        if ($image->isValid() && !$image->hasMoved()) {
            $foto = $dataId->foto_serial_number;
            if (file_exists('uploads/' . $foto)) {
                unlink('uploads/' . $foto);
            }
            $imageName = $image->getRandomName();
            $image->move('uploads/', $imageName);
        }
        $data = [
            'id_kategori' => $this->request->getVar('id_kategori'),
            'id_satuan' => $this->request->getVar('id_satuan'),
            'kode_material' => $this->request->getVar('kode_material'),
            'nama_material' => $this->request->getVar('nama_material'),
            'stok' => $this->request->getVar('stok'),
            'serial_number' => $this->request->getVar('serial_number'),
            'foto_serial_number' => $imageName,
        ];
        session()->setFlashdata('status', 'Data material berhasil diupdate');
        $this->material->update($loadmodel, $data);
        return redirect()
            ->to(base_url('tampil-material'))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data Berhasil diupdate');
    }

    public function detail($id = null)
    {
        $data = [
            'tampildatamaterial' => $this->material->find($id),
            'title' => 'Halaman Detail material | SILOG AJS',
        ];
        return view('Menu/material/detail', $data);
    }

    public function hapus($id)
    {
        $data = $this->material->find($id);
        $foto = $data->foto_serial_number;
        if (file_exists('uploads/' . $foto)) {
            unlink('uploads/' . $foto);
        }
        $this->material->delete($id);
        session()->setFlashdata('status', 'Data material berhasil dihapus');
        return redirect()
            ->to(base_url('tampil-material'))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data Berhasil dihapus');
    }

    public function auto_code_material()
    {
        return json_encode($this->material->generateCode());
    }

    public function cek_stok($id_cek)
    {
        $id = encode_php_tags($id_cek);
        $query = $this->admin->cekStok($id);
        $this->response->setJSON($query);
    }
}
