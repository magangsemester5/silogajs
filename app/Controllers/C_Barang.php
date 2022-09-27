<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Barang;
use App\Models\M_Kategori;
use App\Models\M_Satuan;

class C_Barang extends BaseController
{
    public function __construct()
    {
        $this->kategori = new M_Kategori();
        $this->barang = new M_Barang();
        $this->satuan = new M_Satuan();
    }

    public function index()
    {
        $data = [
            'title' => 'Halaman Barang | SILOG AJS',
            'tampildata' => $this->barang->getAll(),
        ];
        return view('Menu/Barang/index', $data);
    }
    public function tambah()
    {
        $getGenerate = $this->barang->generateCode();
        $nourut = substr($getGenerate, 3, 4);
        $kodeBarangGenerate = $nourut + 1;
        $data = [
            'title' => 'Halaman Tambah Barang | SILOG AJS',
            'tampildatakategori' => $this->kategori->findAll(),
            'tampildatasatuan' => $this->satuan->findAll(),
            'kode_barang' => $kodeBarangGenerate,
            'validation' => \Config\Services::validation()
        ];
        return view('Menu/Barang/tambah', $data);
    }
    public function proses_tambah()
    {
        $image = $this->request->getFile('foto_serial_number');
        $image->move(ROOTPATH . 'public/uploads');
        $data = [
            'id_kategori' => $this->request->getVar('id_kategori'),
            'id_satuan' => $this->request->getVar('id_satuan'),
            'kode_barang' => $this->request->getVar('kode_barang'),
            'nama_barang' => $this->request->getVar('nama_barang'),
            'stok' => $this->request->getVar('stok'),
            'serial_number' => $this->request->getVar('serial_number'),
            'foto_serial_number' => $image->getClientName(),
        ];
        session()->setFlashdata('status', 'Data Barang berhasil ditambahkan');
        $this->barang->insert($data);
        return redirect()
            ->to(base_url('tampil-barang'))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data Berhasil ditambah');
    }

    public function edit($id = null)
    {
        $data = [
            'tampildata' => $this->barang->where('id_barang', $id)->first(),
            'tampildatakategori' => $this->kategori->findAll(),
            'tampildatasatuan' => $this->satuan->findAll(),
            'title' => 'Halaman Edit Barang | SILOG AJS',
        ];
        return view('Menu/Barang/edit', $data);
    }

    public function proses_edit()
    {
        $loadmodel = $this->request->getVar('id_barang');
        $dataId = $this->barang->find($loadmodel);
        $image = $this->request->getFile('foto_serial_number');
        if ($image->isValid() && !$image->hasMoved()) {
            $foto = $dataId->foto_serial_number;
            if (file_exists('uploads/' . $foto)) {
                unlink('uploads/' . $foto);
            }
            $imageName = $image->getRandomName();
            $image->move('uploads/', $imageName);
        }
        $data = [
            'id_kategori' => $this->request->getVar('id_kategori'),
            'id_satuan' => $this->request->getVar('id_satuan'),
            'kode_barang' => $this->request->getVar('kode_barang'),
            'nama_barang' => $this->request->getVar('nama_barang'),
            'stok' => $this->request->getVar('stok'),
            'serial_number' => $this->request->getVar('serial_number'),
            'foto_serial_number' => $imageName,
        ];
        session()->setFlashdata('status', 'Data Barang berhasil diupdate');
        $this->barang->update($loadmodel, $data);
        return redirect()
            ->to(base_url('tampil-barang'))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data Berhasil diupdate');
    }

    public function detail($id = null)
    {
        $data = [
            'tampildatabarang' => $this->barang->find($id),
            'title' => 'Halaman Detail Barang | SILOG AJS',
        ];
        return view('Menu/Barang/detail', $data);
    }

    public function hapus($id)
    {
        $data = $this->barang->find($id);
        $foto = $data->foto_serial_number;
        if (file_exists('uploads/' . $foto)) {
            unlink('uploads/' . $foto);
        }
        $this->barang->delete($id);
        session()->setFlashdata('status', 'Data Barang berhasil dihapus');
        return redirect()
            ->to(base_url('tampil-barang'))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data Berhasil dihapus');
    }

    public function auto_code_barang()
    {
        return json_encode($this->barang->generateCode());
    }

    public function cek_stok($id_cek)
    {
        $id = encode_php_tags($id_cek);
        $query = $this->admin->cekStok($id);
        $this->response->setJSON($query);
    }
}
