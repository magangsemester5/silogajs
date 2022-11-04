<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Detail_Kabel_Keluar;
use App\Models\M_Kabel_Keluar;
use App\Models\M_Kabel;
use App\Models\M_Permintaan_Kabel;
use App\Models\M_User;

class C_kabel_Keluar extends BaseController
{
    public function __construct()
    {
        $this->kabel_keluar = new M_Kabel_Keluar();
        $this->detail_kabel_keluar = new M_Detail_Kabel_Keluar();
        $this->kabel = new M_Kabel();
        $this->permintaan_kabel = new M_Permintaan_Kabel();
        $this->user = new M_User();
    }
    public function index()
    {
        $data = [
            'title' => 'Halaman kabel Keluar | SILOG AJS',
            'tampildata' => $this->kabel_keluar->findAll(),
        ];
        return view('Menu/kabel_Keluar/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Halaman Tambah kabel Keluar | SILOG AJS',
            'tampildatakabel' => $this->kabel->findAll(),
            'tampildatapermintaankabel' => $this->permintaan_kabel->findAll(),
            'tampildataadminwilayah' => $this->user->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('Menu/kabel_Keluar/tambah', $data);
    }

    public function proses_tambah()
    {
        // $total_panjang = $this->request->getVar('total_panjang');
        $rules = [
            'tanggal_keluar' => [
                'label' => "Tanggal Keluar",
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
            $image->move(ROOTPATH . 'public/uploads');
            $data = [
                'no_permintaan' => $this->request->getVar('no_permintaan'),
                'nama' => $this->request->getVar('nama'),
                'wilayah' => $this->request->getVar('wilayah'),
                'tanggal_keluar' => $this->request->getVar('tanggal_keluar'),
                'foto_penerima' => $image->getClientName(),
            ];
            $this->kabel_keluar->insert($data);
            $id_kabel_keluar  = $this->kabel_keluar->getInsertID();
            $data1 = array();
            $no_drum = $this->request->getVar('no_drum');
            $core = $this->request->getVar('core');
            $nama_satuan = $this->request->getVar('nama_satuan');
            $panjang = $this->request->getVar('dpkp');
            $jumlah_kabel = count((array)$this->request->getVar('no_drum'));
            for ($i = 0; $i < $jumlah_kabel; $i++) {
                $data1[] = array(
                    'id_kabel_keluar' => $id_kabel_keluar,
                    'no_drum' => $no_drum[$i],
                    'core' => $core[$i],
                    'nama_satuan' => $nama_satuan[$i],
                    'panjang' => $panjang[$i],
                );
            }
            $data2 = array();
            $panjang_keluar = $this->request->getVar('total_panjang');
            $id_kabel_2 = $this->request->getVar('id_kabel');
            $jumlah = count((array)$this->request->getVar('id_kabel'));
            for ($i = 0; $i < $jumlah; $i++) {
                $data2[] = array(
                    'id_kabel' => $id_kabel_2[$i],
                    'panjang' => $panjang_keluar[$i]
                );
            }
            $this->detail_kabel_keluar->table('detail_kabel_keluar')->insertBatch($data1);
            $this->kabel->table('kabel')->updateBatch($data2, 'id_kabel');
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

    public function hapus($id = null)
    {
        $id_kabel_keluar = array(
            'id_kabel_keluar' => $id
        );
        $this->detail_kabel_keluar->delete_detail_material_keluar($id_kabel_keluar);
        $data = $this->kabel_keluar->find($id);
        $foto = $data->foto_penerima;
        if (file_exists('uploads/' . $foto)) {
            unlink('uploads/' . $foto);
        }
        $this->kabel_keluar->delete($id);
        session()->setFlashdata(
            'status',
            'Data kabel Keluar berhasil dihapus'
        );
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

    public function tampil_data_detail_kabel_keluar($id = null)
    {
        $data = $this->kabel_keluar->cekdetailkabelkeluar($id);
        return json_encode($data);
    }

    public function tampil_otomatis_data_wilayah_kabel_keluar($id = null)
    {
        $data = $this->kabel_keluar->cekWilayah($id);
        return json_encode($data);
    }

    public function tampil_data_user_setelah_dikirim($id = null)
    {
        $data = $this->kabel_keluar->cekdatausersetelahdikirim($id);
        return json_encode($data);
    }

    public function tampil_data_detail_kabel_keluar_setelah_dikirim($id = null)
    {
        $data = $this->detail_kabel_keluar->cekdetailsetelahdikirim($id);
        return json_encode($data);
    }
}