<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Material_Masuk;
use App\Models\M_material;

class C_material_Masuk extends BaseController
{
    public function __construct()
    {
        $this->material_masuk = new M_Material_Masuk();
        $this->material = new M_material();
    }
    public function index()
    {
        $data = [
            'title' => 'Halaman Material Masuk| SILOG AJS',
            'tampildata' => $this->material_masuk->findAll(),
        ];
        return view('Menu/material_Masuk/index', $data);
    }

    public function tambah()
    {
        $getGenerate = $this->material_masuk->generateCode();
        $nourut = substr($getGenerate, 3, 4);
        $kodeMaterialGenerate = $nourut + 1;
        $data = [
            'title' => 'Halaman Tambah material Masuk| SILOG AJS',
            'tampildatamaterial' => $this->material->findAll(),
            'kode_delivery_order' => $kodeMaterialGenerate
        ];
        return view('Menu/material_Masuk/tambah', $data);
    }

    public function proses_tambah()
    {
        $total_stok = $this->request->getVar('total_stok');
        $rules = [
            'tanggal_masuk' => [
                'label' => "Tanggal Masuk",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi"
                ]
            ],
            'id_material' => [
                'label' => "Nomor Drum",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi",
                ]
            ],
            'gudang' => [
                'label' => "Gudang",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi",
                ]
            ],
            'jumlah_masuk' => [
                'label' => "Jumlah material Masuk",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi"
                ]
            ],
            'image' => [
                'label' => "Foto Penerima",
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
                'tanggal_masuk' => $this->request->getVar('tanggal_masuk'),
                'no_delivery_order' => $this->request->getVar('no_delivery_order'),
                'nama_material' => $this->request->getVar('nama_material'),
                'gudang' => $this->request->getVar('gudang'),
                'jumlah_masuk' => $this->request->getVar('jumlah_masuk'),
                'nama_satuan' => $this->request->getVar('nama_satuan'),
                'foto_penerima' => $imageName,
            ];
            $this->material_masuk->insert($data);
            $where = [
                'id_material' => $this->request->getVar('id_material')
            ];
            $data2 = [
                'stok' => $total_stok
            ];
            $this->material->update($where, $data2, 'material');
            session()->setFlashdata(
                'status',
                'Data Material Masuk berhasil ditambahkan'
            );
            return redirect()
                ->to(base_url('tampil-materialmasuk'))
                ->with('status_icon', 'success')
                ->with('status_text', 'Data Berhasil ditambah');
        } else {
            $getGenerate = $this->material_masuk->generateCode();
            $nourut = substr($getGenerate, 3, 4);
            $kodematerialGenerate = $nourut + 1;
            $data = [
                'title' => 'Halaman Tambah Material Masuk| SILOG AJS',
                'tampildatamaterial' => $this->material->findAll(),
                'kode_delivery_order' => $kodematerialGenerate,
                'validation' => $this->validator
            ];
            return view('Menu/Material_Masuk/tambah', $data);
        }
    }
    
    public function hapus($id = null)
    {
        session()->setFlashdata(
            'status',
            'Data material Masuk berhasil dihapus'
        );
        $data['tampildata'] = $this->material_masuk
            ->where('id_material_masuk', $id)
            ->delete($id);
        return redirect()
            ->to(base_url('tampil-materialmasuk'))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data Berhasil dihapus');
    }

    public function tampil_otomatis_data_material_masuk($id = null)
    {
        $data = $this->material_masuk->cekStok($id);
        return json_encode($data);
    }

    public function tampil_otomatis_detail_data_material_masuk($id = null)
    {
        $data = $this->material_masuk->find($id);
        return json_encode($data);
    }
}