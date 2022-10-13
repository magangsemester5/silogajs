<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Kabel;
use App\Models\M_Satuan;

class C_Kabel extends BaseController
{
    public function __construct()
    {
        $this->kabel = new M_Kabel();
        $this->satuan = new M_Satuan();
        \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'title' => 'Halaman kabel | SILOG AJS',
            'tampildata' => $this->kabel->getAll(),
        ];
        return view('Menu/kabel/index', $data);
    }
    public function tambah()
    {
        $data = [
            'title' => 'Halaman Tambah kabel | SILOG AJS',
            'tampildatasatuan' => $this->satuan->findAll()
        ];
        return view('Menu/kabel/tambah', $data);
    }
    public function proses_tambah()
    {
        $rules = [
            'id_satuan' => [
                'label' => "Satuan",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi"
                ]
            ],
            'no_drum' => [
                'label' => "Nomor Drum",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi"
                ]
            ],
            'core' => [
                'label' => "Core",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi"
                ]
            ],
            'panjang' => [
                'label' => "Panjang",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi"
                ]
            ],
            'serial_number' => [
                'label' => "Serial Number",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi"
                ]
            ]
        ];
        if ($this->validate($rules)) {
            $image = $this->request->getFile('foto_serial_number');
            $image->move(ROOTPATH . 'public/uploads');
            $data = [
                'id_satuan' => $this->request->getVar('id_satuan'),
                'no_drum' => $this->request->getVar('no_drum'),
                'core' => $this->request->getVar('core'),
                'panjang' => $this->request->getVar('panjang'),
                'serial_number' => $this->request->getVar('serial_number'),
                'foto_serial_number' => $image->getClientName(),
            ];
            session()->setFlashdata('status', 'Data kabel berhasil ditambahkan');
            $this->kabel->insert($data);
            return redirect()
                ->to(base_url('tampil-kabel'))
                ->with('status_icon', 'success')
                ->with('status_text', 'Data Berhasil ditambah');
        } else {
            $data = [
                'title' => 'Halaman Tambah kabel | SILOG AJS',
                'tampildatasatuan' => $this->satuan->findAll()
            ];
            return view('Menu/kabel/tambah', $data);
        }
    }

    public function edit($id = null)
    {
        $data = [
            'tampildata' => $this->kabel->where('id_kabel', $id)->first(),
            'tampildatasatuan' => $this->satuan->findAll(),
            'title' => 'Halaman Edit kabel | SILOG AJS',
        ];
        return view('Menu/kabel/edit', $data);
    }

    public function proses_edit()
    {
        $loadmodel = $this->request->getVar('id_kabel');
        $dataId = $this->kabel->find($loadmodel);
        $image = $this->request->getFile('foto_serial_number');
        if ($image->isValid() && !$image->hasMoved()) {
            $foto = $dataId->foto_serial_number;
            if (file_exists('uploads/' . $foto)) {
                unlink('uploads/' . $foto);
            }
            $imageName = $image->getRandomName();
            $image->move('uploads/', $imageName);
            $data = [
                'id_satuan' => $this->request->getVar('id_satuan'),
                'no_drum' => $this->request->getVar('no_drum'),
                'core' => $this->request->getVar('core'),
                'panjang' => $this->request->getVar('panjang'),
                'serial_number' => $this->request->getVar('serial_number'),
                'foto_serial_number' => $imageName,
            ];
            session()->setFlashdata('status', 'Data kabel berhasil diupdate');
            $this->kabel->update($loadmodel,  $data);
            return redirect()
                ->to(base_url('tampil-kabel'))
                ->with('status_icon', 'success')
                ->with('status_text', 'Data Berhasil diupdate');
        } else {
            $data = [
                'id_satuan' => $this->request->getVar('id_satuan'),
                'no_drum' => $this->request->getVar('no_drum'),
                'core' => $this->request->getVar('core'),
                'panjang' => $this->request->getVar('panjang'),
                'serial_number' => $this->request->getVar('serial_number')
            ];
            session()->setFlashdata('status', 'Data kabel berhasil diupdate');
            $this->kabel->update($loadmodel,  $data);
            return redirect()
                ->to(base_url('tampil-kabel'))
                ->with('status_icon', 'success')
                ->with('status_text', 'Data Berhasil diupdate');
        }
    }

    public function detail($id = null)
    {
        $data = [
            'tampildatakabel' => $this->kabel->find($id),
            'title' => 'Halaman Detail kabel | SILOG AJS',
        ];
        return view('Menu/kabel/detail', $data);
    }

    public function hapus($id)
    {
        $data = $this->kabel->find($id);
        $foto = $data->foto_serial_number;
        if (file_exists('uploads/' . $foto)) {
            unlink('uploads/' . $foto);
        }
        $this->kabel->delete($id);
        session()->setFlashdata('status', 'Data kabel berhasil dihapus');
        return redirect()
            ->to(base_url('tampil-kabel'))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data Berhasil dihapus');
    }
}
