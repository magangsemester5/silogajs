<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Barang_Keluar;
use App\Models\M_Barang;

class C_Barang_Keluar extends BaseController
{
    public function __construct()
    {
        $this->barang_keluar = new M_Barang_Keluar();
        $this->barang = new M_Barang();
    }
    public function index()
    {
        $data = [
            'title' => 'Halaman Barang Keluar | SILOG AJS',
            'tampildata' => $this->barang_keluar->getAll(),
        ];
        return view('Menu/Barang_Keluar/index', $data);
    }

    public function tambah()
    {
        $getGenerate = $this->barang_keluar->generateCode();
        $nourut = substr($getGenerate, 3, 4);
        $kodeBarangGenerate = $nourut + 1;
        $data = [
            'title' => 'Halaman Tambah Barang Keluar | SILOG AJS',
            'tampildatabarang' => $this->barang->findAll(),
            'kode_barang_keluar' => $kodeBarangGenerate,
        ];
        return view('Menu/Barang_Keluar/tambah', $data);
    }

    public function proses_tambah()
    {
        $image = $this->request->getFile('foto_pengambilan_barang');
        $image->move(ROOTPATH . 'public/uploads');
        $id_barang = $this->request->getVar('id_barang');
        $total_stok = $this->request->getVar('total_stok');
        $data = [
            'tanggal_keluar' => $this->request->getVar('tanggal_keluar'),
            'kode_barang_keluar' => $this->request->getVar('kode_barang_keluar'),
            'id_barang' => $id_barang,
            'jumlah_keluar' => $this->request->getVar('jumlah_keluar'),
            'foto_pengambilan_barang' => $image->getClientName(),
        ];
        $this->barang_keluar->insert($data);
        $where = [
            'id_barang' => $id_barang
        ];
        $data2 = [
            'stok' => $total_stok
        ];
        $this->barang->update($where, $data2, 'barang');
        session()->setFlashdata(
            'status',
            'Data Barang Keluar berhasil ditambahkan'
        );
        return redirect()
            ->to(base_url('tampil-barangkeluar'))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data Berhasil ditambah');
    }

    public function tampil_edit_data($id = null)
    {
        $data = [
            'tampildata' => $this->barang_keluar->getRelasi($id),
            'tampildatabarang' => $this->barang->findAll(),
            'title' => 'Halaman Edit Barang | SILOG AJS',
        ];
        return view('Menu/Barang_Keluar/edit', $data);
    }

    public function edit()
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
            'tanggal_keluar' => $this->request->getVar('tanggal_keluar'),
            'kode_barang' => $this->request->getVar('kode_barang'),
            'nama_barang' => $this->request->getVar('nama_barang'),
            'stok' => $this->request->getVar('stok'),
            'serial_number' => $this->request->getVar('serial_number'),
            'foto_serial_number' => $imageName,
        ];
        session()->setFlashdata('status', 'Data Barang berhasil diupdate');
        $this->barang_keluar->update($loadmodel, $data);
        return redirect()
            ->to(base_url('tampil-barang'))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data Berhasil diupdate');
    }

    public function detail($id = null)
    {
        $data = [
            'tampildatabarang' => $this->barang_keluar->getRelasi($id),
            'title' => 'Halaman Detail Barang Keluar | SILOG AJS',
        ];
        return view('Menu/Barang_Keluar/detail', $data);
    }

    public function hapus($id = null)
    {
        session()->setFlashdata(
            'status',
            'Data Barang Keluar berhasil dihapus'
        );
        $data['tampildata'] = $this->barang_keluar
            ->where('id_barang_keluar', $id)
            ->delete($id);
        return redirect()
            ->to(base_url('tampil-barangkeluar'))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data Berhasil dihapus');
    }

    public function tampil_otomatis_data_barang($id = null)
    {
        $data = $this->barang->cekStok($id);
        return json_encode($data);
    }
}
