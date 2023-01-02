<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Permintaan_Material;
use App\Models\M_Permintaan_Kabel;
use App\Models\M_Kabel;
use App\Models\M_Material;
use App\Models\M_Detail_Permintaan_Material;
use App\Models\M_Detail_Permintaan_Kabel;
use App\Models\M_History_Permintaan_Kabel;
use App\Models\M_History_Permintaan_Material;

class C_Permintaan extends BaseController
{
    public function __construct()
    {
        $this->permintaan_material = new M_Permintaan_Material();
        $this->permintaan_kabel = new M_Permintaan_Kabel();
        $this->kabel = new M_Kabel();
        $this->material = new M_Material();
        $this->detail_permintaan_material = new M_detail_Permintaan_Material();
        $this->detail_permintaan_kabel = new M_Detail_Permintaan_Kabel();
        $this->history_permintaan_kabel = new M_History_Permintaan_Kabel();
        $this->history_permintaan_material = new M_History_Permintaan_Material();
    }

    public function permintaan_material()
    {
        $getGenerate = $this->history_permintaan_material->generateCode();
        $nourut = substr($getGenerate, 1, 1);
        $kodeGenerate = $nourut + 1;
        $data = [
            'title' => 'Halaman Permintaan material | SILOG AJS',
            'tampildata' => $this->permintaan_material->getAll(),
            'tampildatamaterial' => $this->material->getAll(),
            'tampilgroupgetreqid' => $this->history_permintaan_material->getGroupReqID(),
            'no_permintaan' => $kodeGenerate
        ];
        return view('Menu/Permintaan/Material/index', $data);
    }

    public function tambah_permintaan_material()
    {
        $id_material = $this->request->getVar('id_material');
        $jumlah = $this->request->getVar('jumlah');
        $data = [
            'no_permintaan' => $this->request->getVar('no_permintaan'),
            'id' =>  session()->get('id'),
            'tanggal' =>  $this->request->getVar('tanggal')
        ];
        $this->permintaan_material->insert($data);
        $id_permintaan_material  = $this->permintaan_material->getInsertID();
        $data1 = array();
        $jumlah_material = count((array)$id_material);
        for ($i = 0; $i < $jumlah_material; $i++) {
            $data1[] = array(
                'id_permintaan_material' => $id_permintaan_material,
                'id_material' => $id_material[$i],
                'jumlah' => $jumlah[$i],
                'status' => 0,
            );
        }
        $this->detail_permintaan_material->table('detail_permintaan_material')->insertBatch($data1);
        session()->setFlashdata(
            'status',
            'Data Permintaan Material berhasil ditambahkan'
        );
        return redirect()
            ->to(base_url('tampilpermintaan-material'))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data Berhasil ditambah');
    }

    public function detail_permintaan_material($id)
    {
        $data = [
            'title' => 'Halaman Detail Permintaan material | SILOG AJS',
            'tampildata' => $this->permintaan_material->getById($id),
            'tampildatarelasi' => $this->detail_permintaan_material->getAllRelation($id)
        ];
        return view('Menu/Permintaan/Material/detail', $data);
    }

    public function tampil_data_history_permintaan_material_user($id = null)
    {
        $data = $this->history_permintaan_material->cekdatauserhistorypermintaanmaterial($id);
        return json_encode($data);
    }

    public function tampil_data_detail_history_permintaan_material($id = null)
    {
        $data = $this->history_permintaan_material->cekdetailhistorypermintaanmaterial($id);
        return json_encode($data);
    }

    public function tambah_permintaan_kabel()
    {
        $id_kabel = $this->request->getVar('id_kabel');
        $panjang = $this->request->getVar('panjang');
        $data = [
            'no_permintaan' => $this->request->getVar('no_permintaan'),
            'id' =>  session()->get('id'),
            'tanggal' =>  $this->request->getVar('tanggal')
        ];
        $this->permintaan_kabel->insert($data);
        $id_permintaan_kabel  = $this->permintaan_kabel->getInsertID();
        $data1 = array();
        $jumlah_kabel = count((array)$id_kabel);
        for ($i = 0; $i < $jumlah_kabel; $i++) {
            $data1[] = array(
                'id_permintaan_kabel' => $id_permintaan_kabel,
                'id_kabel' => $id_kabel[$i],
                'panjang' => $panjang[$i],
                'status' => 0,
            );
        }
        $this->detail_permintaan_kabel->table('detail_permintaan_kabel')->insertBatch($data1);
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
        if (session()->get('jabatan') == 'Rpm') {
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
        session()->setFlashdata('status', 'Data permintaan material berhasil diapprove');
        return redirect()->to(base_url('tampilpermintaan-material'))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data berhasil diapprove');
    }

    public function reject_detail_permintaan_material($id)
    {
        $data = array(
                'status' => 6
        );
        $this->detail_permintaan_material->update($id, $data);
        session()->setFlashdata('status', 'Data permintaan material berhasil direject');
        return redirect()->to(base_url('tampilpermintaan-material'))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data berhasil direject');
    }

    public function delete_history_permintaan_material($id){
        $this->history_permintaan_material->deleteDataHistoryPermintaanmaterial($id);
        session()->setFlashdata(
            'status',
            'Data History Permintaan Material berhasil dihapus'
        );
        return redirect()
            ->to(base_url('tampilpermintaan-material'))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data Berhasil dihapus');
    }

    public function delete_history_permintaan_kabel($id){
        $this->history_permintaan_kabel->deleteDataHistoryPermintaankabel($id);
        session()->setFlashdata(
            'status',
            'Data History Permintaan Kabel berhasil dihapus'
        );
        return redirect()
            ->to(base_url('tampilpermintaan-kabel'))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data Berhasil dihapus');
    }
    
    public function permintaan_kabel()
    {
        $getGenerate = $this->history_permintaan_kabel->generateCode();
        $nourut = substr($getGenerate, 1, 1);
        $kodeGenerate = $nourut + 1;
        $data = [
            'title' => 'Halaman Permintaan kabel | SILOG AJS',
            'tampildata' => $this->permintaan_kabel->getAll(),
            'tampildatakabel' => $this->kabel->getAll(),
            'tampilgroupgetreqid' => $this->history_permintaan_kabel->getGroupReqID(),
            'no_permintaan' => $kodeGenerate
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
        return view('Menu/Permintaan/Kabel/detail', $data);
    }

    public function approve_detail_permintaan_kabel($id)
    {
        if (session()->get('jabatan') == 'Rpm') {
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
        session()->setFlashdata('status', 'Data permintaan kabel berhasil diapprove');
        return redirect()->to(base_url('tampilpermintaan-kabel'))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data berhasil diapprove');
    }

    public function reject_detail_permintaan_kabel($id)
    {
        $data = array(
                'status' => 6
        );
        $this->detail_permintaan_kabel->update($id, $data);
        session()->setFlashdata('status', 'Data permintaan kabel berhasil direject');
        return redirect()->to(base_url('tampilpermintaan-kabel'))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data berhasil direject');
    }

    public function tampil_data_history_permintaan_kabel_user($id = null)
    {
        $data = $this->history_permintaan_kabel->cekdatauserhistorypermintaankabel($id);
        return json_encode($data);
    }

    public function tampil_data_detail_history_permintaan_kabel($id = null)
    {
        $data = $this->history_permintaan_kabel->cekdetailhistorypermintaankabel($id);
        return json_encode($data);
    }
}