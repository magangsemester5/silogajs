<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Barang_Masuk;
use App\Models\M_Barang;

class C_Barang_Masuk extends BaseController
{
    public function __construct()
    {
        $this->barang_masuk = new M_Barang_Masuk();
        $this->barang = new M_Barang();
    }
    public function index()
    {
        $data = [
            'title' => 'Halaman Barang Masuk | SILOG AJS',
            'tampildata' => $this->barang_masuk->getAll(),
        ];
        return view('Menu/Barang_Masuk/index', $data);
    }

    public function tambah()
    {
        $getGenerate = $this->barang_masuk->generateCode();
        $nourut = substr($getGenerate, 3, 4);
        $kodeBarangGenerate = $nourut + 1;
        $data = [
            'title' => 'Halaman Tambah Barang Masuk | SILOG AJS',
            'tampildatabarang' => $this->barang->findAll(),
            'kode_barang_masuk' => $kodeBarangGenerate,
        ];
        return view('Menu/Barang_Masuk/tambah', $data);
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
            'kode_barang_masuk' => [
                'label' => "Kode Barang Masuk",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi",
                ]
            ],
            'id_barang' => [
                'label' => "Nama Barang",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi"
                ]
            ],
            // 'jumlah_masuk' => [
            //     'label' => "Jumlah Barang Masuk",
            //     'rules' => "required|numeric|less_than[{$total_stok}]",
            //     'errors' => [
            //         'required' => "{field} harus diisi",
            //         'less_than' => "Jumlah Barang Masuk tidak boleh lebih dari {$stok}"
            //     ]
            // ],
        ];
        if ($this->validate($rules)) {
            $image = $this->request->getFile('foto_pengantaran_barang');
            $image->move(ROOTPATH . 'public/uploads');
            $id_barang = $this->request->getVar('id_barang');
            $data = [
                'tanggal_masuk' => $this->request->getVar('tanggal_masuk'),
                'kode_barang_masuk' => $this->request->getVar('kode_barang_masuk'),
                'id_barang' => $id_barang,
                'jumlah_masuk' => $this->request->getVar('jumlah_masuk'),
                'foto_pengantaran_barang' => $image->getClientName(),
            ];
            $this->barang_masuk->insert($data);
            $where = [
                'id_barang' => $id_barang
            ];
            $data2 = [
                'stok' => $total_stok
            ];
            $this->barang->update($where, $data2, 'barang');
            session()->setFlashdata(
                'status',
                'Data Barang Masuk berhasil ditambahkan'
            );
            return redirect()
                ->to(base_url('tampil-barangmasuk'))
                ->with('status_icon', 'success')
                ->with('status_text', 'Data Berhasil ditambah');
        } else {
            $getGenerate = $this->barang_masuk->generateCode();
            $nourut = substr($getGenerate, 3, 4);
            $kodeBarangGenerate = $nourut + 1;
            $data = [
                'title' => 'Halaman Tambah Barang Masuk | SILOG AJS',
                'tampildatabarang' => $this->barang->findAll(),
                'kode_barang_masuk' => $kodeBarangGenerate,
                'validation' => $this->validator
            ];
            return view('Menu/Barang_Masuk/tambah', $data);
        }
    }

    public function detail($id = null)
    {
        $data = [
            'tampildatabarang' => $this->barang_masuk->getRelasi($id),
            'title' => 'Halaman Detail Barang Masuk | SILOG AJS',
        ];
        return view('Menu/Barang_Masuk/detail', $data);
    }

    public function hapus($id = null)
    {
        session()->setFlashdata(
            'status',
            'Data Barang Masuk berhasil dihapus'
        );
        $data['tampildata'] = $this->barang_masuk
            ->where('id_barang_masuk', $id)
            ->delete($id);
        return redirect()
            ->to(base_url('tampil-barangmasuk'))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data Berhasil dihapus');
    }

    public function tampil_otomatis_data_barang_masuk($id = null)
    {
        $data = $this->barang_masuk->cekStok($id);
        return json_encode($data);
    }
}
