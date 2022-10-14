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
            $validate_ps = $this->auth->where('id_user', $id_user)->first();
            if (password_verify($password, $validate_ps->password)) {
                $x = $validasi_id_user->getRowArray();
                $id = $x['id'];
                $id_user = $x['id_user'];
                $kriteria = $x['kriteria'];
                $jabatan = $x['jabatan'];
                $wilayah = $x['wilayah'];
                $password = $x['password'];
                $foto_user = $x['foto_user'];
                $no_telepon = $x['no_telepon'];
                $this->session->set('logged_in', TRUE);
                $this->session->set('user', $id_user);
                if ($x['jabatan'] = "Admin Wilayah") {
                    $nama = $x['nama'];
                    $this->session->set('id', $id);
                    $this->session->set('id_user', $id_user);
                    $this->session->set('nama', $nama);
                    $this->session->set('kriteria', $kriteria);
                    $this->session->set('jabatan', $jabatan);
                    $this->session->set('wilayah', $wilayah);
                    $this->session->set('foto_user', $foto_user);
                    $this->session->set('wilayah', $wilayah);
                    $this->session->set('no_telepon', $no_telepon);
                    $this->session->set('password', $password);
                    return redirect()->to(base_url('tampil_dashboard'));
                } else if ($x['jabatan'] = "Rpm") {
                    $nama = $x['nama'];
                    $this->session->set('id', $id);
                    $this->session->set('id_user', $id_user);
                    $this->session->set('nama', $nama);
                    $this->session->set('kriteria', $kriteria);
                    $this->session->set('jabatan', $jabatan);
                    $this->session->set('foto_user', $foto_user);
                    $this->session->set('wilayah', $wilayah);
                    $this->session->set('no_telepon', $no_telepon);
                    $this->session->set('password', $password);
                    return redirect()->to(base_url('tampil_dashboard'));
                } else if ($x['jabatan'] = "Admin Pusat") {
                    $nama = $x['nama'];
                    $this->session->set('id', $id);
                    $this->session->set('id_user', $id_user);
                    $this->session->set('nama', $nama);
                    $this->session->set('kriteria', $kriteria);
                    $this->session->set('jabatan', $jabatan);
                    $this->session->set('foto_user', $foto_user);
                    $this->session->set('wilayah', $wilayah);
                    $this->session->set('no_telepon', $no_telepon);
                    $this->session->set('password', $password);
                    return redirect()->to(base_url('tampil_dashboard'));
                } else if ($x['jabatan'] = "PM") {
                    $nama = $x['nama'];
                    $this->session->set('id', $id);
                    $this->session->set('id_user', $id_user);
                    $this->session->set('nama', $nama);
                    $this->session->set('kriteria', $kriteria);
                    $this->session->set('jabatan', $jabatan);
                    $this->session->set('foto_user', $foto_user);
                    $this->session->set('wilayah', $wilayah);
                    $this->session->set('no_telepon', $no_telepon);
                    $this->session->set('password', $password);
                    return redirect()->to(base_url('tampil_dashboard'));
                } else if ($x['jabatan'] = "Direktur") {
                    $nama = $x['nama'];
                    $this->session->set('id', $id);
                    $this->session->set('id_user', $id_user);
                    $this->session->set('nama', $nama);
                    $this->session->set('kriteria', $kriteria);
                    $this->session->set('jabatan', $jabatan);
                    $this->session->set('foto_user', $foto_user);
                    $this->session->set('wilayah', $wilayah);
                    $this->session->set('no_telepon', $no_telepon);
                    $this->session->set('password', $password);
                    return redirect()->to(base_url('tampil_dashboard'));
                } else if ($x['jabatan'] = "Manajement") {
                    $nama = $x['nama'];
                    $this->session->set('id', $id);
                    $this->session->set('id_user', $id_user);
                    $this->session->set('nama', $nama);
                    $this->session->set('kriteria', $kriteria);
                    $this->session->set('jabatan', $jabatan);
                    $this->session->set('foto_user', $foto_user);
                    $this->session->set('wilayah', $wilayah);
                    $this->session->set('no_telepon', $no_telepon);
                    $this->session->set('password', $password);
                    return redirect()->to(base_url('tampil_dashboard'));
                }
            } else {
                session()->setFlashdata('status', 'Gagal Login');
                return redirect()
                    ->to(base_url('halaman_login'))
                    ->with('status_icon', 'error')
                    ->with('status_text', 'Username atau Password yang Anda masukan salah');
            }
        } else {
            session()->setFlashdata('status', 'Gagal Login');
            return redirect()
                ->to(base_url('halaman_login'))
                ->with('status_icon', 'error')
                ->with('status_text', 'Username atau Password yang Anda masukan salah');
        }
    }
    function logout()
    {
        session_destroy();
        return redirect()->to(base_url('halaman_login'));
    }
}
