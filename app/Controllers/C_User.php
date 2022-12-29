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

    public function tambah()
    {
        $data = [
            'title' => "Halaman Tambah Manajemen User | SILOG AJS"
        ];
        return view("Menu/User/tambah", $data);
    }

    public function proses_tambah()
    {
        $rules = [
            'nama' => [
                'label' => "Nama",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi"
                ]
            ],
            'email' => [
                'label' => "Email",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi"
                ]
            ],
            'password' => [
                'label' => "Password",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi"
                ]
            ],
            'jabatan' => [
                'label' => "Jabatan",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi"
                ]
            ],
            'id_user' => [
                'label' => "ID User",
                'rules' => "required|is_unique[user.id_user]",
                'errors' => [
                    'required' => "{field} harus diisi",
                    'is_unique' => "{field} yang dimasukan Sudah ada"
                ]
            ],
            'kriteria' => [
                'label' => "Kriteria",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi"
                ]
            ],
            'image' => [
                'label' => "Foto",
                'rules' => "uploaded[image]|mime_in[image,image/png,image/jpeg]|max_size[image,2048]",
                'errors' => [
                    'uploaded' => "Foto yang diupload sudah pernah diupload",
                    'mime_in' => "File yang diupload harus berupa PNG/JPG",
                    'max_size' => "Foto yang diupload maximal harus berukuran 2Mb"
                ]

            ],
            'wilayah' => [
                'label' => "Wilayah",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi"
                ]
            ],
            'no_telepon' => [
                'label' => "Nomor Telepon",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi"
                ]
            ],
        ];
        if ($this->validate($rules)) {
            $image = $this->request->getFile('image');
            $imageName = $image->getRandomName();
            $image->move('uploads/', $imageName);
            $data = [
                'nama' => $this->request->getVar('nama'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'id_user' => $this->request->getVar('id_user'),
                'jabatan' => $this->request->getVar('jabatan'),
                'kriteria' => $this->request->getVar('kriteria'),
                'wilayah' => $this->request->getVar('wilayah'),
                'no_telepon' => $this->request->getVar('no_telepon'),
                'foto_user' => $imageName,
            ];
            session()->setFlashdata('status', 'Data Manajemen User berhasil ditambahkan');
            $this->user->insert($data);
            return redirect()->to(base_url('tampil-user'))->with('status_icon', 'success')->with('status_text', 'Data Berhasil ditambah');
        } else {
            $data = [
                'title' => 'Halaman Tambah Manajemen User | SILOG AJS',
            ];
            return view("Menu/User/tambah", $data);
        }
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
        $image = $this->request->getFile('image');
        if ($image->isValid() && !$image->hasMoved()) {
            $foto = $dataId->foto_user;
            if (file_exists('uploads/' . $foto)) {
                unlink('uploads/' . $foto);
            }
            $imageName = $image->getRandomName();
            $image->move('uploads/', $imageName);
            $data = [
                'nama' => $this->request->getVar('nama'),
                'email' => $this->request->getVar('email'),
                'id_user' => $this->request->getVar('id_user'),
                'jabatan' => $this->request->getVar('jabatan'),
                'kriteria' => $this->request->getVar('kriteria'),
                'wilayah' => $this->request->getVar('wilayah'),
                'no_telepon' => $this->request->getVar('no_telepon'),
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
                'email' => $this->request->getVar('email'),
                'id_user' => $this->request->getVar('id_user'),
                'jabatan' => $this->request->getVar('jabatan'),
                'kriteria' => $this->request->getVar('kriteria'),
                'wilayah' => $this->request->getVar('wilayah'),
                'no_telepon' => $this->request->getVar('no_telepon'),
            ];
            session()->setFlashdata('status', 'Data Manajemen User berhasil diupdate');
            $this->user->update($loadmodel, $data);
            return redirect()
                ->to(base_url('tampil-user'))
                ->with('status_icon', 'success')
                ->with('status_text', 'Data Berhasil diupdate');
        }
    }

    public function profil()
    {
        $id = session()->get('id');
        $data = [
            'title' => 'Halaman Manajemen User | SILOG AJS',
            'tampildata' => $this->user->where('id', $id)->first()
        ];
        return view('Profil/index', $data);
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
                'email' => $this->request->getVar('email'),
                'id_user' => $this->request->getVar('id_user'),
                'jabatan' => $this->request->getVar('jabatan'),
                'kriteria' => $this->request->getVar('kriteria'),
                'wilayah' => $this->request->getVar('wilayah'),
                'no_telepon' => $this->request->getVar('no_telepon'),
                'foto_user' => $imageName,
            ];
            session()->setFlashdata('status', 'Data Profil berhasil diupdate');
            $this->user->update($loadmodel, $data);
            return redirect()
                ->to(base_url('tampil-profil'))
                ->with('status_icon', 'success')
                ->with('status_text', 'Data Berhasil diupdate');
        } else {
            $data = [
                'nama' => $this->request->getVar('nama'),
                'email' => $this->request->getVar('email'),
                'id_user' => $this->request->getVar('id_user'),
                'jabatan' => $this->request->getVar('jabatan'),
                'kriteria' => $this->request->getVar('kriteria'),
                'wilayah' => $this->request->getVar('wilayah'),
                'no_telepon' => $this->request->getVar('no_telepon'),
            ];
            session()->setFlashdata('status', 'Data Profil berhasil diupdate');
            $this->user->update($loadmodel, $data);
            return redirect()
                ->to(base_url('tampil-profil'))
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
                    'matches' => "{field} dengan password baru yang dimasukan harus sama",
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