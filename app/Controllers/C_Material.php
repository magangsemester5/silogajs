<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Material;
use App\Models\M_Satuan;

class C_material extends BaseController
{
    public function __construct()
    {
        $this->material = new M_Material();
        $this->satuan = new M_Satuan();
        \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'title' => 'Halaman Material | SILOG AJS',
            'tampildata' => $this->material->getAll(),
        ];
        return view('Menu/material/index', $data);
    }
    public function tambah()
    {
        $data = [
            'title' => 'Halaman Tambah Material | SILOG AJS',
            'tampildatasatuan' => $this->satuan->findAll()
        ];
        return view('Menu/material/tambah', $data);
    }
    public function proses_tambah()
    {
        $rules = [
            'id_satuan' => [
                'label' => "Satuan",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi"
                ]
            ],
            'nama_material' => [
                'label' => "Nama material",
                'rules' => "required|is_unique[material.nama_material]",
                'errors' => [
                    'required' => "{field} harus diisi",
                    'is_unique' => "{field} yang dimasukan Sudah ada"
                ]
            ],
            'stok' => [
                'label' => "Stok",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi"
                ]
            ],
            'serial_number' => [
                'label' => "Serial Number",
                'rules' => "required|is_unique[material.serial_number]",
                'errors' => [
                    'required' => "{field} harus diisi",
                    'is_unique' => "{field} yang dimasukan Sudah ada"
                ]
            ],
            'image' => [
                'label' => "Foto Serial Number",
                'rules' => "uploaded[image]|mime_in[image,image/png,image/jpeg]|max_size[image,2048]",
                'errors' => [
                    'uploaded' => "Foto yang diupload sudah pernah diupload",
                    'mime_in' => "File yang diupload harus berupa PNG/JPG",
                    'max_size' => "Foto yang diupload maximal harus berukuran 2Mb"
                ]

            ]
        ];
        if ($this->validate($rules)) {
            $image = $this->request->getFile('image');
            $imageName = $image->getRandomName();
            $image->move('uploads/', $imageName);
            $data = [
                'id_satuan' => $this->request->getVar('id_satuan'),
                'nama_material' => $this->request->getVar('nama_material'),
                'stok' => $this->request->getVar('stok'),
                'serial_number' => $this->request->getVar('serial_number'),
                'foto_serial_number' => $imageName,
            ];
            session()->setFlashdata('status', 'Data material berhasil ditambahkan');
            $this->material->insert($data);
            return redirect()
                ->to(base_url('tampil-material'))
                ->with('status_icon', 'success')
                ->with('status_text', 'Data Berhasil ditambah');
        } else {
            $data = [
                'title' => 'Halaman Tambah Material | SILOG AJS',
                'tampildatasatuan' => $this->satuan->findAll()
            ];
            return view('Menu/material/tambah', $data);
        }
    }

    public function edit($id = null)
    {
        $data = [
            'tampildata' => $this->material->where('id_material', $id)->first(),
            'tampildatasatuan' => $this->satuan->findAll(),
            'title' => 'Halaman Edit Material | SILOG AJS',
        ];
        return view('Menu/material/edit', $data);
    }

    public function proses_edit()
    {
        $loadmodel = $this->request->getVar('id_material');
        $dataId = $this->material->find($loadmodel);
        $image = $this->request->getFile('image');
        if ($image->isValid() && !$image->hasMoved()) {
            $foto = $dataId->foto_serial_number;
            if (file_exists('uploads/' . $foto)) {
                unlink('uploads/' . $foto);
            }
            $imageName = $image->getRandomName();
            $image->move('uploads/', $imageName);
            $data = [
                'id_satuan' => $this->request->getVar('id_satuan'),
                'nama_material' => $this->request->getVar('nama_material'),
                'stok' => $this->request->getVar('stok'),
                'serial_number' => $this->request->getVar('serial_number'),
                'foto_serial_number' => $imageName,
            ];
            session()->setFlashdata('status', 'Data material berhasil diupdate');
            $this->material->update($loadmodel,  $data);
            return redirect()
                ->to(base_url('tampil-material'))
                ->with('status_icon', 'success')
                ->with('status_text', 'Data Berhasil diupdate');
        } else {
            $data = [
                'id_satuan' => $this->request->getVar('id_satuan'),
                'nama_material' => $this->request->getVar('nama_material'),
                'stok' => $this->request->getVar('stok'),
                'serial_number' => $this->request->getVar('serial_number')
            ];
            session()->setFlashdata('status', 'Data material berhasil diupdate');
            $this->material->update($loadmodel,  $data);
            return redirect()
                ->to(base_url('tampil-material'))
                ->with('status_icon', 'success')
                ->with('status_text', 'Data Berhasil diupdate');
        }
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
}