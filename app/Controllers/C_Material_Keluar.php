<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Detail_Material_Keluar;
use App\Models\M_Material_Keluar;
use App\Models\M_Material;
use App\Models\M_Permintaan_Material;
use App\Models\M_History_Permintaan_Material;
use App\Models\M_Detail_Permintaan_Material;
use App\Models\M_User;
use TCPDF;

class C_material_Keluar extends BaseController
{
    public function __construct()
    {
        $this->material_keluar = new M_Material_Keluar();
        $this->detail_material_keluar = new M_Detail_Material_Keluar();
        $this->detail_permintaan_material = new M_Detail_Permintaan_Material();
        $this->material = new M_Material();
        $this->permintaan_material = new M_Permintaan_Material();
        $this->history_permintaan_material = new M_History_Permintaan_Material();
        $this->user = new M_User();
    }
    public function index()
    {
        $data = [
            'title' => 'Halaman Material Keluar | SILOG AJS',
            'tampildata' => $this->material_keluar->findAll(),
        ];
        return view('Menu/material_Keluar/index', $data);
    }

    public function tambah()
    {
        $getGenerate = $this->history_permintaan_material->generateCodeReqID();
        $reqidgenereate = $getGenerate + 1;
        $data = [
            'title' => 'Halaman Tambah Material Keluar | SILOG AJS',
            'tampildatapermintaanmaterial' => $this->permintaan_material->getDataPermintaanMaterialByStatus(),
            'req_id' => $reqidgenereate,
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
            $no_permintaan = $this->request->getVar('no_permintaan');
            $id_permintaan_material = $this->request->getVar('id_permintaan_material');
            $nama = $this->request->getVar('nama');
            $wilayah = $this->request->getVar('wilayah');
            $no_telepon = $this->request->getVar('no_telepon');
            $tanggal = $this->request->getVar('tanggal_keluar');
            $req_id = $this->request->getVar('req_id');
            $data = [
                'no_permintaan' => $no_permintaan,
                'nama' => $nama,
                'wilayah' => $wilayah,
                'no_telepon' => $no_telepon,
                'tanggal_keluar' => $tanggal,
                'foto_penerima' => $imageName,
            ];
            $this->material_keluar->insert($data);
            $id_material_keluar  = $this->material_keluar->getInsertID();
            $data1 = array();
            $nama_material = $this->request->getVar('nama_material');
            $nama_satuan = $this->request->getVar('nama_satuan');
            $jumlah_detail_keluar = $this->request->getVar('dpmj');
            $jumlah_material = count((array)$this->request->getVar('nama_material'));
            for ($i = 0; $i < $jumlah_material; $i++) {
                $data1[] = array(
                    'id_material_keluar' => $id_material_keluar,
                    'nama_material' => $nama_material[$i],
                    'nama_satuan' => $nama_satuan[$i],
                    'jumlah' => $jumlah_detail_keluar[$i],
                );
            }
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
            $this->detail_material_keluar->table('detail_material_keluar')->insertBatch($data1);
            $this->material->table('material')->updateBatch($data2, 'id_material');
            $this->detail_permintaan_material->updateStatus($id_permintaan_material);
            $this->detail_permintaan_material->deleteData($id_permintaan_material);
            $this->permintaan_material->deleteData($id_permintaan_material);
            $data3 = array();
            for ($i = 0; $i < $jumlah_material; $i++) {
                $data3[] = array(
                    'req_id' => $req_id,
                    'no_permintaan' => $no_permintaan,
                    'nama' => $nama,
                    'tanggal' => $tanggal,
                    'wilayah' => $wilayah,
                    'no_telepon' => $no_telepon,
                    'nama_material' => $nama_material[$i],
                    'jumlah' => $jumlah_detail_keluar[$i],
                    'nama_satuan' => $nama_satuan[$i],
                    'status' => 5
                );
            }
            $this->history_permintaan_material->table('history_permintaan_material')->insertBatch($data3);
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
        $id_material_keluar = array(
            'id_material_keluar' => $id
        );
        $this->detail_material_keluar->delete_detail_material_keluar($id_material_keluar);
        $data = $this->material_keluar->find($id);
        $foto = $data->foto_penerima;
        if (file_exists('uploads/' . $foto)) {
            unlink('uploads/' . $foto);
        }
        $this->material_keluar->delete($id);
        session()->setFlashdata(
            'status',
            'Data material Keluar berhasil dihapus'
        );
        return redirect()
            ->to(base_url('tampil-materialkeluar'))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data Berhasil dihapus');
    }


    public function surat_jalan($id)
    {
        $transaksi = $this->material_keluar->find($id);
        $getGenerate = $this->permintaan_material->generateCode();
        $nourut = substr($getGenerate, 1, 1);
        $kodeGenerate = $nourut + 1;
        $datamaterialkeluar = $this->material_keluar->getRelasi($id);
        $html = view('Menu/Material_Keluar/surat_jalan', [
            'transaksi' => $transaksi,
            'datamaterialkeluar' => $datamaterialkeluar,
            'no_permintaan' => $kodeGenerate
        ]);
 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetPrintHeader(false);
        $pdf->SetTitle('Halaman Cetak Surat Jalan Material Keluar | SILOG AJS');
        // set header and footer fonts
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->addPage();
        // output the HTML content
        $pdf->writeHTML($html);
        //line ini penting
        $this->response->setContentType('application/pdf');
        //Close and output PDF document
        $pdf->Output('invoice.pdf', 'I');
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
        $data = $this->material_keluar->cekWilayah($id);
        return json_encode($data);
    }
    public function tampil_data_user_setelah_dikirim($id = null)
    {
        $data = $this->material_keluar->cekdatausersetelahdikirim($id);
        return json_encode($data);
    }
    public function tampil_data_detail_material_keluar_setelah_dikirim($id = null)
    {
        $data = $this->detail_material_keluar->cekdetailsetelahdikirim($id);
        return json_encode($data);
    }
}