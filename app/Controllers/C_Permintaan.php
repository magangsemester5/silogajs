<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Permintaan;
use App\Models\M_Kategori;

class C_Permintaan extends BaseController
{
    public function __construct()
    {
        $this->permintaan = new M_Permintaan();
        $this->kategori = new M_Kategori();
    }

    public function index()
    {
        $data = [
            'title' => 'Halaman Permintaan | SILOG AJS',
            'tampildata' => $this->permintaan->getAll(),
        ];
        return view('Menu/Permintaan/index', $data);
    }

    public function hapus($id)
    {
        $this->permintaan->delete($id);
        session()->setFlashdata('status', 'Data Permintaan berhasil dihapus');
        return redirect()
            ->to(base_url('tampil-permintaan'))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data Berhasil dihapus');
    }

    public function tampil_otomatis_data_permintaan($id = null)
    {
        $data = $this->permintaan->data_permintaan($id);
        return json_encode($data);
    }
}
