<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Kabel_Keluar;
use App\Models\M_Kabel;
use App\Models\M_Permintaan_Kabel;
use App\Models\M_User;

class C_kabel_Keluar extends BaseController
{
    public function __construct()
    {
        $this->kabel_keluar = new M_Kabel_Keluar();
        $this->kabel = new M_Kabel();
        $this->permintaan_kabel = new M_Permintaan_Kabel();
        $this->user = new M_User();
    }
    public function index()
    {
        $data = [
            'title' => 'Halaman kabel Keluar | SILOG AJS',
            'tampildata' => $this->kabel_keluar->getAll(),
        ];
        return view('Menu/kabel_Keluar/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Halaman Tambah kabel Keluar | SILOG AJS',
            'tampildatakabel' => $this->kabel->findAll(),
            'tampildatapermintaankabel' => $this->permintaan_kabel->findAll(),
            'tampildataadminwilayah' => $this->user->findAll()
        ];
        return view('Menu/kabel_Keluar/tambah', $data);
    }

    public function proses_tambah()
    {
        $total_panjang = $this->request->getVar('total_panjang');
        $rules = [
            'tanggal_keluar' => [
                'label' => "Tanggal Keluar",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi"
                ]
            ],
            'id_kabel' => [
                'label' => "Nama kabel",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi"
                ]
            ],
            // 'panjang' => [
            //     'label' => "Jumlah kabel Keluar",
            //     'rules' => "required|numeric|less_than[{$total_panjang}]",
            //     'errors' => [
            //         'required' => "{field} harus diisi",
            //         'less_than' => "Jumlah kabel Keluar tidak boleh lebih dari {$stok}"
            //     ]
            // ],
        ];
        if ($this->validate($rules)) {
            $image = $this->request->getFile('foto_penerima');
            $image->move(ROOTPATH . 'public/uploads');
            $id_kabel = $this->request->getVar('id_kabel');
            $data = [
                'id_kabel' => $id_kabel,
                'id_satuan' => $this->request->getVar('nama_satuan'),
                'id' => $this->request->getVar('id'),
                'tanggal_keluar' => $this->request->getVar('tanggal_keluar'),
                'panjang_keluar' => $this->request->getVar('panjang_keluar'),
                'foto_penerima' => $image->getClientName(),
            ];
            $this->kabel_keluar->insert($data);
            $where = [
                'id_kabel' => $id_kabel
            ];
            $data2 = [
                'panjang' => $total_panjang
            ];
            $this->kabel->update($where, $data2, 'kabel');
            session()->setFlashdata(
                'status',
                'Data kabel Keluar berhasil ditambahkan'
            );
            return redirect()
                ->to(base_url('tampil-kabelkeluar'))
                ->with('status_icon', 'success')
                ->with('status_text', 'Data Berhasil ditambah');
        } else {
            $data = [
                'title' => 'Halaman Tambah kabel Keluar | SILOG AJS',
                'tampildatakabel' => $this->kabel->findAll(),
                'tampildatapermintaankabel' => $this->permintaan_kabel->findAll(),
                'tampildataadminwilayah' => $this->user->findAll(),
                'validation' => $this->validator
            ];
            return view('Menu/kabel_Keluar/tambah', $data);
        }
    }

    public function edit($id = null)
    {
        $data = [
            'tampildata' => $this->kabel_keluar->getRelasi($id),
            'tampildatakabel' => $this->kabel->findAll(),
            'tampildataadminwilayah' => $this->user->findAll(),
            'title' => 'Halaman Edit kabel | SILOG AJS',
        ];
        return view('Menu/kabel_Keluar/edit', $data);
    }

    public function proses_edit()
    {
        $loadmodel = $this->request->getVar('id_kabel');
        $dataId = $this->kabel->find($loadmodel);
        $image = $this->request->getFile('foto_penerima');
        if ($image->isValid() && !$image->hasMoved()) {
            $foto = $dataId->foto_penerima;
            if (file_exists('uploads/' . $foto)) {
                unlink('uploads/' . $foto);
            }
            $imageName = $image->getRandomName();
            $image->move('uploads/', $imageName);
        }
        $data = [
            'id_kabel' => $this->request->getVar('id_kabel'),
            'id_satuan' => $this->request->getVar('id_satuan'),
            'id' => $this->request->getVar('id'),
            'tanggal_keluar' => $this->request->getVar('tanggal_keluar'),
            'panjang' => $this->request->getVar('panjang'),
            'foto_penerima' => $imageName,
        ];
        session()->setFlashdata('status', 'Data kabel berhasil diupdate');
        $this->kabel_keluar->update($loadmodel, $data);
        return redirect()
            ->to(base_url('tampil-kabel'))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data Berhasil diupdate');
    }

    public function detail($id = null)
    {
        $data = [
            'tampildatakabel' => $this->kabel_keluar->getRelasi($id),
            'title' => 'Halaman Detail kabel Keluar | SILOG AJS',
        ];
        return view('Menu/kabel_Keluar/detail', $data);
    }

    public function hapus($id = null)
    {
        session()->setFlashdata(
            'status',
            'Data kabel Keluar berhasil dihapus'
        );
        $data['tampildata'] = $this->kabel_keluar
            ->where('id_kabel_keluar', $id)
            ->delete($id);
        return redirect()
            ->to(base_url('tampil-kabelkeluar'))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data Berhasil dihapus');
    }

    public function tampil_otomatis_data_kabel_keluar($id = null)
    {
        $data = $this->kabel_keluar->cekPanjang($id);
        return json_encode($data);
    }

    public function tampil_otomatis_data_wilayah_kabel_keluar($id = null)
    {
        $data = $this->kabel_keluar->cekWilayah($id);
        return json_encode($data);
    }
}
