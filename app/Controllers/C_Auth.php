<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Auth;

class C_Auth extends BaseController
{
    public function __construct()
    {
        helper('text');
        $this->auth = new M_Auth();
        $this->session = \Config\Services::session();
        $this->session->start();
        \Config\Services::validation();
        $this->encryption = \Config\Services::encrypter();
    }
    public function index()
    {
        return view('V_Login');
    }
    public function proses_login()
    {
        $recaptchaResponse = trim($this->request->getVar('g-recaptcha-response'));

        $userIp = $this->request->getIPAddress();

        $secret = '6LcYuisjAAAAAF6H8_SutPl0cJFr9YRadbX3htNw';

        $credential = array(
            'secret' => $secret,
            'response' => $this->request->getVar('g-recaptcha-response')
        );

        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
        curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);

        $status = json_decode($response, true);

        $id_user = $this->request->getVar('id_user');
        $password = $this->request->getVar('password');
        $validasi_id_user = $this->auth->query_validasi_id_user($id_user);
        if ($status['success']) {
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
                    $email = $x['email'];
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
                        $this->session->set('email', $email);
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
                        $this->session->set('email', $email);
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
                        $this->session->set('email', $email);
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
                        $this->session->set('email', $email);
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
                        $this->session->set('email', $email);
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
                        $this->session->set('email', $email);
                        $this->session->set('password', $password);
                        return redirect()->to(base_url('tampil_dashboard'));
                    }
                } else {
                    session()->setFlashdata('status', 'Gagal Login');
                    return redirect()
                        ->to(base_url('halaman_login'))
                        ->with('status_icon', 'error')
                        ->with('status_text', 'ID atau Password yang Anda masukan salah');
                }
            } else {
                session()->setFlashdata('status', 'Gagal Login');
                return redirect()
                    ->to(base_url('halaman_login'))
                    ->with('status_icon', 'error')
                    ->with('status_text', 'ID atau Password yang Anda masukan salah');
            }
        } else {
            session()->setFlashdata('status', 'Gagal Login');
            return redirect()
                ->to(base_url('halaman_login'))
                ->with('status_icon', 'error')
                ->with('status_text', 'Verifikasi reCAPTCHA belum dilakukan atau salah');
        }
    }

    public function tampil_forgot_password()
    {
        return view('V_Forgot_Password');
    }

    public function validasi_forgot_password()
    {
        $rules = [
            'email' => [
                'label' => "Email",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi",
                    'valid_email' => "Format yang dimasukan harus berupa email",
                    'trim' => "Inputan tidak boleh ada spasi",
                ]
            ],
        ];
        if ($this->validate($rules)) {
            $email = $this->request->getVar('email');
            $userdata = $this->auth->verifikasi_email($email);
            if (!empty($userdata)) {
                $to = $email;
                $subject = 'Atur Ulang Tautan Kata Sandi';
                $token = $userdata['id'];
                $message = 'Hi ' . $userdata['nama'] . '<br><br>'
                    . 'Permintaan setel ulang kata sandi Anda telah diterima. Silakan klik'
                    . 'tautan di bawah untuk mengatur ulang kata sandi Anda.<br><br>'
                    . '<a href="' . base_url() . '/tampil-formforgotpassword/' . $token . '">Klik di sini untuk Mereset Kata Sandi</a><br><br>'
                    . 'Terimakasih<br>PT. Arkatama Jaya Sakti';
                $email = \Config\Services::email();
                $email->setTo($to);
                $email->setFrom('silogajs', 'Team Support Arkatama Jaya Sakti');
                $email->setSubject($subject);
                $email->setMessage($message);
                if ($email->send()) {
                    session()->setFlashdata('status', 'Data Reset Password berhasil dikirim');
                    return redirect()
                        ->to(base_url('tampil-forgotpassword'))
                        ->with('status_icon', 'success')
                        ->with('status_text', 'Tautan reset kata sandi dikirim ke email terdaftar Anda. Harap verifikasi segera');
                } else {
                    $data = $email->printDebugger(['headers']);
                    print_r($data);
                }
            } else {
                session()->setFlashdata('status', 'Data Email yang dimasukan Tidak ada');
                return redirect()
                    ->to(base_url('tampil-forgotpassword'))
                    ->with('status_icon', 'warning')
                    ->with('status_text', 'Email does not exists');
            }
        } else {
            session()->setFlashdata('status', 'Data Email Harus diisi');
            return redirect()
                ->to(base_url('tampil-forgotpassword'))
                ->with('status_icon', 'warning')
                ->with('status_text', 'Data Email Harus diisi');
        }
    }

    public function tampil_form_forgot_password($id)
    {
        $data = [
            'tampildata' => $this->auth->find($id),
            'title' => "Halaman Form Ganti Password | SILOG AJS"
        ];
        return view('V_Form_Ganti_Password', $data);
    }

    public function proses_form_forgot_password()
    {
        $rules = [
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
            $loadmodel = $this->request->getVar('id');
            $data = [
                'password' => password_hash($this->request->getVar('password_baru'), PASSWORD_DEFAULT)
            ];
            $this->auth->update($loadmodel, $data);
            session()->setFlashdata('status', 'Data Password berhasil diubah');
            return redirect()
                ->to(base_url('halaman_login'))
                ->with('status_icon', 'success')
                ->with('status_text', 'Data Berhasil diupdate');
        } else {
            $data = [
                'title' => "Halaman Form Ganti Password | SILOG AJS"
            ];
            return view("V_Login", $data);
        }
    }

    public function logout()
    {
        session_destroy();
        return redirect()->to(base_url('halaman_login'));
    }
}