<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Kabel_Masuk;
use App\Models\M_kabel;

class C_kabel_Masuk extends BaseController
{
    public function __construct()
    {
        $this->kabel_masuk = new M_Kabel_Masuk();
        $this->kabel = new M_kabel();
    }
    public function index()
    {
        $data = [
            'title' => 'Halaman kabel Masuk | SILOG AJS',
            'tampildata' => $this->kabel_masuk->getAll(),
        ];
        return view('Menu/kabel_Masuk/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Halaman Tambah kabel Masuk | SILOG AJS',
            'tampildatakabel' => $this->kabel->findAll()
        ];
        return view('Menu/kabel_Masuk/tambah', $data);
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
            'kode_kabel_masuk' => [
                'label' => "Kode kabel Masuk",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi",
                ]
            ],
            'id_kabel' => [
                'label' => "Nomor Drum",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi"
                ]
            ],
            'jumlah_masuk' => [
                'label' => "Jumlah kabel Masuk",
                'rules' => "required|numeric|less_than[{$total_stok}]",
                'errors' => [
                    'required' => "{field} harus diisi",
                    'less_than' => "Jumlah kabel Masuk tidak boleh lebih dari {$stok}"
                ]
            ],
        ];
        if ($this->validate($rules)) {
            $image = $this->request->getFile('foto_pengantaran_kabel');
            $image->move(ROOTPATH . 'public/uploads');
            $id_kabel = $this->request->getVar('id_kabel');
            $data = [
                'tanggal_masuk' => $this->request->getVar('tanggal_masuk'),
                'kode_kabel_masuk' => $this->request->getVar('kode_kabel_masuk'),
                'id_kabel' => $id_kabel,
                'jumlah_masuk' => $this->request->getVar('jumlah_masuk'),
                'foto_pengantaran_kabel' => $image->getClientName(),
            ];
            $this->kabel_masuk->insert($data);
            $where = [
                'id_kabel' => $id_kabel
            ];
            $data2 = [
                'stok' => $total_stok
            ];
            $this->kabel->update($where, $data2, 'kabel');
            session()->setFlashdata(
                'status',
                'Data kabel Masuk berhasil ditambahkan'
            );
            return redirect()
                ->to(base_url('tampil-kabelmasuk'))
                ->with('status_icon', 'success')
                ->with('status_text', 'Data Berhasil ditambah');
        } else {
            $getGenerate = $this->kabel_masuk->generateCode();
            $nourut = substr($getGenerate, 3, 4);
            $kodekabelGenerate = $nourut + 1;
            $data = [
                'title' => 'Halaman Tambah kabel Masuk | SILOG AJS',
                'tampildatakabel' => $this->kabel->findAll(),
                'kode_kabel_masuk' => $kodekabelGenerate,
                'validation' => $this->validator
            ];
            return view('Menu/kabel_Masuk/tambah', $data);
        }
    }

    public function detail($id = null)
    {
        $data = [
            'tampildatakabel' => $this->kabel_masuk->getRelasi($id),
            'title' => 'Halaman Detail kabel Masuk | SILOG AJS',
        ];
        return view('Menu/kabel_Masuk/detail', $data);
    }

    public function hapus($id = null)
    {
        session()->setFlashdata(
            'status',
            'Data kabel Masuk berhasil dihapus'
        );
        $data['tampildata'] = $this->kabel_masuk
            ->where('id_kabel_masuk', $id)
            ->delete($id);
        return redirect()
            ->to(base_url('tampil-kabelmasuk'))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data Berhasil dihapus');
    }

    public function tampil_otomatis_data_kabel_masuk($id = null)
    {
        $data = $this->kabel_masuk->cekStok($id);
        return json_encode($data);
    }
}
