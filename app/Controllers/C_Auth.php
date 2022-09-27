<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Auth;

class C_Auth extends BaseController
{
    public function __construct()
    {
        $this->auth = new M_Auth();
        $this->session = \Config\Services::session();
        $this->session->start();
    }
    public function index()
    {
        return view('V_Login');
    }
    public function proses_login()
    {
        $id_user = $this->request->getVar('id_user');
        $password = $this->request->getVar('password');

        $validasi_id_user = $this->auth->query_validasi_id_user($id_user);
        if ($validasi_id_user->getNumRows() > 0) {
            $validate_ps = $this->auth->query_validasi_password($id_user, $password);
            if ($validate_ps->getNumRows() > 0) {
                $x = $validate_ps->getRowArray();
                $id_user = $x['id_user'];
                $kriteria = $x['kriteria'];
                $jabatan = $x['jabatan'];
                $foto_user = $x['foto_user'];
                $this->session->set('logged_in', TRUE);
                $this->session->set('user', $id_user);
                if ($x['jabatan'] = "SM Wilayah") {
                    $nama = $x['nama'];
                    $this->session->set('id_user', $id_user);
                    $this->session->set('nama', $nama);
                    $this->session->set('kriteria', $kriteria);
                    $this->session->set('jabatan', $jabatan);
                    $this->session->set('foto_user', $foto_user);
                    return redirect()->to(base_url('tampil_dashboard'));
                } else if ($x['jabatan'] = "SM Control") {
                    $nama = $x['nama'];
                    $this->session->set('id_user', $id_user);
                    $this->session->set('nama', $nama);
                    $this->session->set('kriteria', $kriteria);
                    $this->session->set('jabatan', $jabatan);
                    $this->session->set('foto_user', $foto_user);
                    return redirect()->to(base_url('tampil_dashboard'));
                } else if ($x['jabatan'] = "SM Pusat") {
                    $nama = $x['nama'];
                    $this->session->set('id_user', $id_user);
                    $this->session->set('nama', $nama);
                    $this->session->set('kriteria', $kriteria);
                    $this->session->set('jabatan', $jabatan);
                    $this->session->set('foto_user', $foto_user);
                    return redirect()->to(base_url('tampil_dashboard'));
                } else if ($x['kriteria'] == 'Supervisor' && $x['jabatan'] = "Project Manajer") {
                    $nama = $x['nama'];
                    $this->session->set('id_user', $id_user);
                    $this->session->set('nama', $nama);
                    $this->session->set('kriteria', $kriteria);
                    $this->session->set('jabatan', $jabatan);
                    $this->session->set('foto_user', $foto_user);
                    return redirect()->to(base_url('tampil_dashboard'));
                } else if ($x['kriteria'] == 'Supervisor' && $x['jabatan'] = "Direktur") {
                    $nama = $x['nama'];
                    $this->session->set('id_user', $id_user);
                    $this->session->set('nama', $nama);
                    $this->session->set('kriteria', $kriteria);
                    $this->session->set('jabatan', $jabatan);
                    $this->session->set('foto_user', $foto_user);
                    return redirect()->to(base_url('tampil_dashboard'));
                }
            } else {
                echo "password salah";
                return redirect()->to(base_url('halaman_login'));
            }
        } else {
            echo "password salah";
            return redirect()->to(base_url('halaman_login'));
        }
    }
    function logout()
    {
        session_destroy();
        return redirect()->to(base_url('halaman_login'));
    }
}
