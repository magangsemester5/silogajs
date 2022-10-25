<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Material_Keluar;
use App\Models\M_Material;
use App\Models\M_Permintaan_Material;
use App\Models\M_User;

class C_material_Keluar extends BaseController
{
    public function __construct()
    {
        $this->material_keluar = new M_Material_Keluar();
        $this->material = new M_Material();
        $this->permintaan_material = new M_Permintaan_Material();
        $this->user = new M_User();
    }
    public function index()
    {
        $data = [
            'title' => 'Halaman Material Keluar | SILOG AJS',
            'tampildata' => $this->material_keluar->getAll(),
        ];
        return view('Menu/material_Keluar/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Halaman Tambah Material Keluar | SILOG AJS',
            'tampildatamaterial' => $this->material->findAll(),
            'tampildatapermintaanmaterial' => $this->permintaan_material->findAll(),
            'tampildataadminwilayah' => $this->user->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('Menu/material_Keluar/tambah', $data);
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
            'id_permintaan_material' => [
                'label' => "Nomor Permintaan",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi"
                ]
            ],
            // 'panjang' => [
            //     'label' => "Jumlah material Keluar",
            //     'rules' => "required|numeric|less_than[{$total_panjang}]",
            //     'errors' => [
            //         'required' => "{field} harus diisi",
            //         'less_than' => "Jumlah material Keluar tidak boleh lebih dari {$stok}"
            //     ]
            // ],
        ];
        if ($this->validate($rules)) {
            $image = $this->request->getFile('foto_penerima');
            $image->move(ROOTPATH . 'public/uploads');
            $data = [
                'id_permintaan_material' => $this->request->getVar('id_permintaan_material'),
                'tanggal_keluar' => $this->request->getVar('tanggal_keluar'),
                'foto_penerima' => $image->getClientName(),
            ];
            $this->material_keluar->insert($data);
            $data2 = array();
            $jumlah_keluar = $this->request->getVar('total_keluar');
            $id_material_2 = $this->request->getVar('id_material');
            $jumlah = count((array)$this->request->getVar('id_material'));
            for ($i = 0; $i < $jumlah; $i++) {
                $data2[] = array(
                    'id_material' => $id_material_2[$i],
                    'stok' => $jumlah_keluar[$i]
                );
            }
            $this->material->table('material')->updateBatch($data2, 'id_material');
            session()->setFlashdata(
                'status',
                'Data material Keluar berhasil ditambahkan'
            );
            return redirect()
                ->to(base_url('tampil-materialkeluar'))
                ->with('status_icon', 'success')
                ->with('status_text', 'Data Berhasil ditambah');
        } else {
            $data = [
                'title' => 'Halaman Tambah Material Keluar | SILOG AJS',
                'tampildatamaterial' => $this->material->findAll(),
                'tampildatapermintaanmaterial' => $this->permintaan_material->findAll(),
                'tampildataadminwilayah' => $this->user->findAll(),
                'validation' => $this->validator
            ];
            return view('Menu/material_Keluar/tambah', $data);
        }
    }

    public function hapus($id = null)
    {
        $data = $this->material_keluar->find($id);
        $foto = $data->foto_penerima;
        if (file_exists('uploads/' . $foto)) {
            unlink('uploads/' . $foto);
        }
        $this->material_keluar->delete($id);
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

    public function tampil_data_detail_material_keluar($id = null)
    {
        $data = $this->material_keluar->cekdetailmaterialkeluar($id);
        return json_encode($data);
    }

    public function tampil_otomatis_data_wilayah_material_keluar($id = null)
    {
        // $data = [
        //     'datahanif' => $this->material_keluar->cekWilayah($id)
        // ];
        // foreach ($data['datahanif'] as $h) {
        //    $lists = "
        //     <td>" . $h->nama . "</td>
        //     <td>" . $h->no_drum . "</td>
        //     <td>" . $h->core ."</td>
        //     <td>" . $h->panjang . "</td>
        //     ";
        // }
        // $data2 = array('list_permintaan_material'=>$lists);
        // $final = json_encode($data2);
        // print_r($final);
        $data = $this->material_keluar->cekWilayah($id);
        return json_encode($data);
    }
}