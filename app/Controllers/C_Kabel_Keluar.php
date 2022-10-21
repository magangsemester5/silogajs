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
            'id_permintaan_kabel' => [
                'label' => "Nomor Permintaan",
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
            $data = [
                'id_permintaan_kabel' => $this->request->getVar('id_permintaan_kabel'),
                'tanggal_keluar' => $this->request->getVar('tanggal_keluar'),
                'panjang_keluar' => $this->request->getVar('panjang_keluar'),
                'foto_penerima' => $image->getClientName(),
            ];
            $this->kabel_keluar->insert($data);
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
            $this->kabel->table('kabel')->updateBatch($data2,'id_kabel');
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

    public function tampil_data_detail_kabel_keluar($id = null){
        $data = $this->kabel_keluar->cekdetailkabelkeluar($id);
        return json_encode($data);
    }

    public function tampil_otomatis_data_wilayah_kabel_keluar($id = null)
    {
        // $data = [    
        //     'datahanif' => $this->kabel_keluar->cekWilayah($id)
        // ];
        // foreach ($data['datahanif'] as $h) {
        //    $lists = "
        //     <td>" . $h->nama . "</td>
        //     <td>" . $h->no_drum . "</td>
        //     <td>" . $h->core ."</td>
        //     <td>" . $h->panjang . "</td>
        //     ";
        // }
        // $data2 = array('list_permintaan_kabel'=>$lists);
        // $final = json_encode($data2);
        // print_r($final);
        $data = $this->kabel_keluar->cekWilayah($id);
        return json_encode($data);
    }
}