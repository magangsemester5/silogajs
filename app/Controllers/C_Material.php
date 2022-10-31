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
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi"
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
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi"
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
            $image->move(ROOTPATH . 'public/uploads');
            $data = [
                'id_satuan' => $this->request->getVar('id_satuan'),
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
        $where = [
            'id_satuan' => $id
        ];
        $cek_material = count((array) $this->material->cek_data_direlasi('detail_material_keluar', 'detail_material_masuk', $where));
        if ($cek_material > 0) {
            session()->setFlashdata('status', 'Cek data Pada tabel material keluar dan material masuk pastikan material yang terkait sudah tidak ada');
            return redirect()
                ->to(base_url('tampil-material'))
                ->with('status_icon', 'warning')
                ->with('status_text', 'Data Gagal dihapus');
        } else {
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

    public function cek_stok($id_cek)
    {
        $id = encode_php_tags($id_cek);
        $query = $this->admin->cekStok($id);
        $this->response->setJSON($query);
    }
}