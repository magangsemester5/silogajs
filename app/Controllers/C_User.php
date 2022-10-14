<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_User;

class C_User extends BaseController
{
    public function __construct()
    {
        $this->user = new M_User();
        \Config\Services::validation();
    }
    public function index()
    {
        $data = [
            'title' => 'Halaman Manajemen User | SILOG AJS',
            'tampildata' => $this->user->findAll(),
        ];
        return view('Menu/User/index', $data);
    }

    public function profil()
    {
        $data = [
            'title' => 'Halaman Manajemen User | SILOG AJS',
            'tampildata' => $this->user->findAll(),
        ];
        return view('Profil/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => "Halaman Tambah Manajemen User | SILOG AJS"
        ];
        return view("Menu/User/tambah", $data);
    }

    public function proses_tambah()
    {
        $image = $this->request->getFile('foto_user');
        $image->move(ROOTPATH . 'public/uploads');
        $data = [
            'nama' => $this->request->getVar('nama'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'id_user' => $this->request->getVar('id_user'),
            'jabatan' => $this->request->getVar('jabatan'),
            'kriteria' => $this->request->getVar('kriteria'),
            'foto_user' => $image->getClientName(),
        ];
        session()->setFlashdata('status', 'Data Manajemen User berhasil ditambahkan');
        $this->user->insert($data);
        return redirect()->to(base_url('tampil-user'))->with('status_icon', 'success')->with('status_text', 'Data Berhasil ditambah');
    }

    public function edit($id = null)
    {
        $data = [
            'tampildata' => $this->user->where('id', $id)->first(),
            'title' => 'Halaman Edit Manajemen User | SILOG AJS',
        ];
        return view('Menu/User/edit', $data);
    }

    public function proses_edit()
    {
        $loadmodel = $this->request->getVar('id');
        $dataId = $this->user->find($loadmodel);
        $image = $this->request->getFile('foto_user');
        if ($image->isValid() && !$image->hasMoved()) {
            $foto = $dataId->foto_user;
            if (file_exists('uploads/' . $foto)) {
                unlink('uploads/' . $foto);
            }
            $imageName = $image->getRandomName();
            $image->move('uploads/', $imageName);
            $data = [
                'nama' => $this->request->getVar('nama'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'id_user' => $this->request->getVar('id_user'),
                'jabatan' => $this->request->getVar('jabatan'),
                'kriteria' => $this->request->getVar('kriteria'),
                'foto_user' => $imageName,
            ];
            session()->setFlashdata('status', 'Data Manajemen User berhasil diupdate');
            $this->user->update($loadmodel, $data);
            return redirect()
                ->to(base_url('tampil-user'))
                ->with('status_icon', 'success')
                ->with('status_text', 'Data Berhasil diupdate');
        } else {
            $data = [
                'nama' => $this->request->getVar('nama'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'id_user' => $this->request->getVar('id_user'),
                'jabatan' => $this->request->getVar('jabatan'),
                'kriteria' => $this->request->getVar('kriteria'),
            ];
            session()->setFlashdata('status', 'Data Manajemen User berhasil diupdate');
            $this->user->update($loadmodel, $data);
            return redirect()
                ->to(base_url('tampil-user'))
                ->with('status_icon', 'success')
                ->with('status_text', 'Data Berhasil diupdate');
        }
    }

    public function proses_edit_profil()
    {
        $loadmodel = $this->request->getVar('id');
        $dataId = $this->user->find($loadmodel);
        $image = $this->request->getFile('foto_user');
        if ($image->isValid() && !$image->hasMoved()) {
            $foto = $dataId->foto_user;
            if (file_exists('uploads/' . $foto)) {
                unlink('uploads/' . $foto);
            }
            $imageName = $image->getRandomName();
            $image->move('uploads/', $imageName);
            $data = [
                'nama' => $this->request->getVar('nama'),
                'id_user' => $this->request->getVar('id_user'),
                'no_telepon' => $this->request->getVar('no_telepon'),
                'foto_user' => $imageName,
            ];
            session()->setFlashdata('status', 'Data Profil berhasil diupdate');
            $this->user->update($loadmodel, $data);
            return redirect()
                ->to(base_url('tampil-dashboard'))
                ->with('status_icon', 'success')
                ->with('status_text', 'Data Berhasil diupdate');
        } else {
            $data = [
                'nama' => $this->request->getVar('nama'),
                'no_telepon' => $this->request->getVar('no_telepon'),
                'id_user' => $this->request->getVar('id_user'),
            ];
            session()->setFlashdata('status', 'Data Profil berhasil diupdate');
            $this->user->update($loadmodel, $data);
            return redirect()
                ->to(base_url('tampil-dashboard'))
                ->with('status_icon', 'success')
                ->with('status_text', 'Data Berhasil diupdate');
        }
    }

    public function ganti_password_profil()
    {
        $data = [
            'title' => "Halaman Ganti Password Profil | SILOG AJS",
        ];
        return view("Profil/Ganti_Password", $data);
    }

    public function proses_ganti_password_profil()
    {
        $rules = [
            'password_lama' => [
                'label' => "Password Lama",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi"
                ]
            ],
            'password_baru' => [
                'label' => "Password Baru",
                'rules' => "required|min_length[6]",
                'errors' => [
                    'required' => "{field} harus diisi",
                    'min_length' => "{field} harus diisi minimal 6 digit",
                ]
            ],
            'konfirmasi_password' => [
                'label' => "Konfirmasi Password",
                'rules' => "required|matches[password_baru]",
                'errors' => [
                    'required' => "{field} harus diisi",
                    'matches' => "{field} dengan         password baru yang dimasukan harus sama",
                ]
            ]
        ];
        if ($this->validate($rules)) {
            $password_lama = $this->request->getVar('password_lama');
            if (password_verify($password_lama, session()->get('password'))) {
                $loadmodel = $this->request->getVar('id');
                $data = [
                    'password' => password_hash($this->request->getVar('password_baru'), PASSWORD_DEFAULT)
                ];
                $this->user->update($loadmodel, $data);
                session()->setFlashdata('status', 'Data Password berhasil diubah');
                return redirect()
                    ->to(base_url('tampil_dashboard'))
                    ->with('status_icon', 'success')
                    ->with('status_text', 'Data Berhasil diupdate');
            } else {
                session()->setFlashdata('status', 'Data Manajemen User Gagal diubah');
                return redirect()
                    ->to(base_url('tampil_dashboard'))
                    ->with('status_icon', 'warning')
                    ->with('status_text', 'Password lama yang dimasukan tidak sama dengan di database');
            }
        } else {
            $data = [
                'title' => "Halaman Ganti Password Profil | SILOG AJS"
            ];
            return view("Profil/Ganti_Password", $data);
        }
    }

    public function hapus($id)
    {
        $data = $this->user->find($id);
        $foto = $data->foto_user;
        if (file_exists('uploads/' . $foto)) {
            unlink('uploads/' . $foto);
        }
        $this->user->delete($id);
        session()->setFlashdata('status', 'Data User berhasil dihapus');
        return redirect()
            ->to(base_url('tampil-user'))
            ->with('status_icon', 'success')
            ->with('status_text', 'Data Berhasil dihapus');
    }
}
