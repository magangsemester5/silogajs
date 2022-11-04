<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Permintaan_Material;
use App\Models\M_Permintaan_Kabel;
use App\Models\M_Detail_Permintaan_Material;
use App\Models\M_Detail_Permintaan_Kabel;

class C_Permintaan extends BaseController
{
    public function __construct()
    {
        $this->permintaan_material = new M_Permintaan_Material();
        $this->permintaan_kabel = new M_Permintaan_Kabel();
        $this->detail_permintaan_material = new M_detail_Permintaan_Material();
        $this->detail_permintaan_kabel = new M_Detail_Permintaan_Kabel();
    }

    public function permintaan_material()
    {
        $data = [
            'title' => 'Halaman Permintaan Material | SILOG AJS',
            'tampildata' => $this->permintaan_material->getAll(),
        ];
        return view('Menu/Permintaan/Material/index', $data);
    }

    public function detail_permintaan_material($id)
    {
        $data = [
            'title' => 'Halaman Detail Permintaan Material | SILOG AJS',
            'tampildata' => $this->permintaan_material->getById($id),
            'tampildatarelasi' => $this->detail_permintaan_material->getAllRelation($id)
        ];
        // print_r($data);
        return view('Menu/Permintaan/Material/detail', $data);
    }

    public function tambah_permintaan_kabel()
    {
        // $id_permintaan_kabel = $this->request->getVar('no_permintaan');
        $id_kabel = $this->request->getVar('no_drum');
        $panjang = $this->request->getVar('panjang');
        // $wilayah = $this->request->getVar('wilayah');
        $data1 = array();
        $jumlah_kabel = count((array)$this->request->getVar('no_drum'));
        for ($i = 0; $i < $jumlah_kabel; $i++) {
            $data1[] = array(
                'id_permintaan_kabel' => 1,
                'id_kabel' => $id_kabel[$i],
                'panjang' => $panjang[$i],
                'status' => 0,
            );
        }
        $this->detail_permintaan_kabel->insert($data1);
        session()->setFlashdata(
            'status',
            'Data Permintaan Kabel berhasil ditambahkan'
        );
        return redirect()
            ->to(base_url('tampilpermintaan-kabel'))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data Berhasil ditambah');
    }

    public function approve_detail_permintaan_material($id)
    {
        if (session()->get('jabatan') == 'RPM') {
            $data = array(
                'status' => 1
            );
        } else if (session()->get('jabatan') == 'Admin Pusat') {
            $data = array(
                'status' => 2
            );
        } else if (session()->get('jabatan') == 'PM') {
            $data = array(
                'status' => 3
            );
        } else if (session()->get('jabatan') == 'Direktur') {
            $data = array(
                'status' => 4
            );
        }
        $this->detail_permintaan_material->update($id, $data);
        session()->setFlashdata('status', 'Data permintaan berhasil diupdate');
        return redirect()->to(base_url('detailpermintaan-material/' . $id . ''))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data Berhasil ditambah');
    }

    public function permintaan_kabel()
    {
        $data = [
            'title' => 'Halaman Permintaan kabel | SILOG AJS',
            'tampildata' => $this->permintaan_kabel->getAll(),
        ];
        return view('Menu/Permintaan/Kabel/index', $data);
    }

    public function detail_permintaan_kabel($id)
    {
        $data = [
            'title' => 'Halaman Detail Permintaan kabel | SILOG AJS',
            'tampildata' => $this->permintaan_kabel->getById($id),
            'tampildatarelasi' => $this->detail_permintaan_kabel->getAllRelation($id)
        ];
        // print_r($data);
        return view('Menu/Permintaan/Kabel/detail', $data);
    }

    public function approve_detail_permintaan_kabel($id)
    {
        if (session()->get('jabatan') == 'RPM') {
            $data = array(
                'status' => 1
            );
        } else if (session()->get('jabatan') == 'Admin Pusat') {
            $data = array(
                'status' => 2
            );
        } else if (session()->get('jabatan') == 'PM') {
            $data = array(
                'status' => 3
            );
        } else if (session()->get('jabatan') == 'Direktur') {
            $data = array(
                'status' => 4
            );
        }
        $this->detail_permintaan_kabel->update($id, $data);
        session()->setFlashdata('status', 'Data permintaan berhasil diupdate');
        return redirect()->to(base_url('detailpermintaan-kabel/' . $id . ''))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data Berhasil ditambah');
    }

    public function tampil_otomatis_data_permintaan($id = null)
    {
        $data = $this->permintaan->data_permintaan($id);
        return json_encode($data);
    }
}