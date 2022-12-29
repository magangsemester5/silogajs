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
            'tampildata' => $this->kabel_masuk->findAll(),
        ];
        return view('Menu/kabel_Masuk/index', $data);
    }

    public function tambah()
    {
        $getGenerate = $this->kabel_masuk->generateCode();
        $nourut = substr($getGenerate, 3, 4);
        $kodeKabelGenerate = $nourut + 1;
        $data = [
            'title' => 'Halaman Tambah kabel Masuk | SILOG AJS',
            'tampildatakabel' => $this->kabel->findAll(),
            'kode_delivery_order' => $kodeKabelGenerate
        ];
        return view('Menu/kabel_Masuk/tambah', $data);
    }

    public function proses_tambah()
    {
        $total_stok = $this->request->getVar('total_panjang');
        $rules = [
            'tanggal_masuk' => [
                'label' => "Tanggal Masuk",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi"
                ]
            ],
            'id_kabel' => [
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
            'panjang_masuk' => [
                'label' => "Jumlah kabel Masuk",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi"
                ]
            ],
            'merek' => [
                'label' => "Merek",
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
                'no_hasbell' => $this->request->getVar('no_hasbell'),
                'gudang' => $this->request->getVar('gudang'),
                'panjang_masuk' => $this->request->getVar('panjang_masuk'),
                'core' => $this->request->getVar('core'),
                'nama_satuan' => $this->request->getVar('nama_satuan'),
                'merek' => $this->request->getVar('merek'),
                'foto_penerima' => $imageName,
            ];
            $this->kabel_masuk->insert($data);
            $where = [
                'id_kabel' => $this->request->getVar('id_kabel')
            ];
            $data2 = [
                'panjang' => $total_stok
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
                'kode_delivery_order' => $kodekabelGenerate,
                'validation' => $this->validator
            ];
            return view('Menu/kabel_Masuk/tambah', $data);
        }
    }
    
    public function hapus($id = null)
    {
        $data = $this->kabel_masuk->find($id);
        $foto = $data->foto_penerima;
        if (file_exists('uploads/' . $foto)) {
            unlink('uploads/' . $foto);
        }
        $this->kabel_masuk->delete($id);
        session()->setFlashdata(
            'status',
            'Data kabel Masuk berhasil dihapus'
        );
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

    public function tampil_otomatis_detail_data_kabel_masuk($id = null)
    {
        $data = $this->kabel_masuk->find($id);
        return json_encode($data);
    }
}