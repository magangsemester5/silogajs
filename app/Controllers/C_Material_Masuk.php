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
            'title' => 'Halaman material Masuk | SILOG AJS',
            'tampildata' => $this->material_masuk->getAll(),
        ];
        return view('Menu/material_Masuk/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Halaman Tambah material Masuk | SILOG AJS',
            'tampildatamaterial' => $this->material->findAll()
        ];
        return view('Menu/material_Masuk/tambah', $data);
    }

    public function proses_tambah()
    {
        $total_stok = $this->request->getVar('total_stok');
        $stok = $this->request->getVar('stok');
        $rules = [
            'tanggal_masuk' => [
                'label' => "Tanggal Masuk",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi"
                ]
            ],
            'kode_material_masuk' => [
                'label' => "Kode material Masuk",
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
            // 'jumlah_masuk' => [
            //     'label' => "Jumlah material Masuk",
            //     'rules' => "required|numeric|less_than[{$total_stok}]",
            //     'errors' => [
            //         'required' => "{field} harus diisi",
            //         'less_than' => "Jumlah material Masuk tidak boleh lebih dari {$stok}"
            //     ]
            // ],
        ];
        if ($this->validate($rules)) {
            $image = $this->request->getFile('foto_pengantaran_material');
            $image->move(ROOTPATH . 'public/uploads');
            $id_material = $this->request->getVar('id_material');
            $data = [
                'tanggal_masuk' => $this->request->getVar('tanggal_masuk'),
                'kode_material_masuk' => $this->request->getVar('kode_material_masuk'),
                'id_material' => $id_material,
                'jumlah_masuk' => $this->request->getVar('jumlah_masuk'),
                'foto_pengantaran_material' => $image->getClientName(),
            ];
            $this->material_masuk->insert($data);
            $where = [
                'id_material' => $id_material
            ];
            $data2 = [
                'stok' => $total_stok
            ];
            $this->material->update($where, $data2, 'material');
            session()->setFlashdata(
                'status',
                'Data material Masuk berhasil ditambahkan'
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
                'title' => 'Halaman Tambah material Masuk | SILOG AJS',
                'tampildatamaterial' => $this->material->findAll(),
                'kode_material_masuk' => $kodematerialGenerate,
                'validation' => $this->validator
            ];
            return view('Menu/material_Masuk/tambah', $data);
        }
    }

    public function detail($id = null)
    {
        $data = [
            'tampildatamaterial' => $this->material_masuk->getRelasi($id),
            'title' => 'Halaman Detail material Masuk | SILOG AJS',
        ];
        return view('Menu/material_Masuk/detail', $data);
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
}
