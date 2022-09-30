<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Material_Keluar;
use App\Models\M_Material;
use App\Models\M_Permintaan;

class C_material_Keluar extends BaseController
{
    public function __construct()
    {
        $this->material_keluar = new M_Material_Keluar();
        $this->material = new M_Material();
        $this->permintaan = new M_Permintaan();
    }
    public function index()
    {
        $data = [
            'title' => 'Halaman material Keluar | SILOG AJS',
            'tampildata' => $this->material_keluar->getAll(),
        ];
        return view('Menu/material_Keluar/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Halaman Tambah material Keluar | SILOG AJS',
            'tampildatamaterial' => $this->material->findAll(),
            'tampildatapermintaan' => $this->permintaan->findAll()
        ];
        return view('Menu/material_Keluar/tambah', $data);
    }

    public function proses_tambah()
    {
        $total_stok = $this->request->getVar('total_stok');
        $stok = $this->request->getVar('stok');
        $rules = [
            'tanggal_keluar' => [
                'label' => "Tanggal Keluar",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi"
                ]
            ],
            'kode_material_keluar' => [
                'label' => "Kode material Keluar",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi",
                ]
            ],
            'id_material' => [
                'label' => "Nama material",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi"
                ]
            ],
            // 'jumlah_keluar' => [
            //     'label' => "Jumlah material Keluar",
            //     'rules' => "required|numeric|less_than[{$total_stok}]",
            //     'errors' => [
            //         'required' => "{field} harus diisi",
            //         'less_than' => "Jumlah material Keluar tidak boleh lebih dari {$stok}"
            //     ]
            // ],
        ];
        if ($this->validate($rules)) {
            $image = $this->request->getFile('foto_pengambilan_material');
            $image->move(ROOTPATH . 'public/uploads');
            $id_material = $this->request->getVar('id_material');
            $data = [
                'tanggal_keluar' => $this->request->getVar('tanggal_keluar'),
                'kode_material_keluar' => $this->request->getVar('kode_material_keluar'),
                'id_material' => $id_material,
                'jumlah_keluar' => $this->request->getVar('jumlah_keluar'),
                'foto_pengambilan_material' => $image->getClientName(),
            ];
            $this->material_keluar->insert($data);
            $where = [
                'id_material' => $id_material
            ];
            $data2 = [
                'stok' => $total_stok
            ];
            $this->material->update($where, $data2, 'material');
            session()->setFlashdata(
                'status',
                'Data material Keluar berhasil ditambahkan'
            );
            return redirect()
                ->to(base_url('tampil-materialkeluar'))
                ->with('status_icon', 'success')
                ->with('status_text', 'Data Berhasil ditambah');
        } else {
            $getGenerate = $this->material_keluar->generateCode();
            $nourut = substr($getGenerate, 3, 4);
            $kodematerialGenerate = $nourut + 1;
            $data = [
                'title' => 'Halaman Tambah material Keluar | SILOG AJS',
                'tampildatamaterial' => $this->material->findAll(),
                'tampildatapermintaan' => $this->permintaan->findAll(),
                'kode_material_keluar' => $kodematerialGenerate,
                'validation' => $this->validator
            ];
            return view('Menu/material_Keluar/tambah', $data);
        }
    }

    public function edit($id = null)
    {
        $data = [
            'tampildata' => $this->material_keluar->getRelasi($id),
            'tampildatamaterial' => $this->material->findAll(),
            'title' => 'Halaman Edit material | SILOG AJS',
        ];
        return view('Menu/material_Keluar/edit', $data);
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
            'tanggal_keluar' => $this->request->getVar('tanggal_keluar'),
            'kode_material' => $this->request->getVar('kode_material'),
            'nama_material' => $this->request->getVar('nama_material'),
            'stok' => $this->request->getVar('stok'),
            'serial_number' => $this->request->getVar('serial_number'),
            'foto_serial_number' => $imageName,
        ];
        session()->setFlashdata('status', 'Data material berhasil diupdate');
        $this->material_keluar->update($loadmodel, $data);
        return redirect()
            ->to(base_url('tampil-material'))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data Berhasil diupdate');
    }

    public function detail($id = null)
    {
        $data = [
            'tampildatamaterial' => $this->material_keluar->getRelasi($id),
            'title' => 'Halaman Detail material Keluar | SILOG AJS',
        ];
        return view('Menu/material_Keluar/detail', $data);
    }

    public function hapus($id = null)
    {
        session()->setFlashdata(
            'status',
            'Data material Keluar berhasil dihapus'
        );
        $data['tampildata'] = $this->material_keluar
            ->where('id_material_keluar', $id)
            ->delete($id);
        return redirect()
            ->to(base_url('tampil-materialkeluar'))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data Berhasil dihapus');
    }

    public function tampil_otomatis_data_material_keluar($id = null)
    {
        $data = $this->material->cekStok($id);
        return json_encode($data);
    }
}
