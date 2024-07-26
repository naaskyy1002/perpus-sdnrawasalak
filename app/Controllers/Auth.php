<?php

namespace App\Controllers;
use App\Models\LoginModel;

class Auth extends BaseController
{
    protected $session;

    public function __construct()
    {
        // Menginisialisasi sesi di konstruktor
        $this->session = \Config\Services::session();
    }

    public function login()
    {
        // Memeriksa apakah sesi pengguna aktif
        if ($this->session->has('user_session')) {
            if ($this->session->get('level') == 1) {
                return redirect()->to('admin');
            }
            if ($this->session->get('role') == 'siswa') {
                return redirect()->to('siswa');
            }
        } else {
            $data = ['title' => 'Login | Perpustakaan SDN Rawasalak'];
            return view('auth/login', $data);
        }
    }

        public function validLogin()
        {
            $Login = new LoginModel();
            
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            
            //ambil data admin di database yang username nya sama 
            $user_check = $Login->getAdmin($username);
            
            if ($user_check) { //cek apakah username ditemukan
                // Jika password tidak sesuai, set flashdata dan redirect ke halaman login
                if ($user_check['password'] != $password) { 
                    $this->session->setFlashdata('login_fail', 'Password salah!');
                    return redirect()->to('login');
                }
                // Jika level pengguna adalah admin, set session dan arahkan ke halaman admin
                if ($user_check['level'] == 1) {
                    $sessLogin = [
                        'user_session'  => TRUE,
                        'username'      => $user_check['username'],
                        'nama_lengkap'  => $user_check['nama_lengkap'],
                        'nip'           => $user_check['nip'],
                        'foto'          => $user_check['foto'],
                        'level'         => $user_check['level']
                    ];
                    $this->session->set($sessLogin);
                    return redirect()->to('admin');
                }
            } else {
                // Jika username tidak ditemukan sebagai admin, periksa sebagai siswa
                $siswa_check = $Login->getSiswa($username);
                // Jika password tidak sesuai, set flashdata dan redirect ke halaman login
                if ($siswa_check) {
                    if ($siswa_check['password'] != $password) {
                        $this->session->setFlashdata('login_fail', 'Password salah!');
                        return redirect()->to('login');
                    }
                    // Jika username ditemukan sebagai siswa, set session dan arahkan ke halaman siswa
                    $sessLogin = [
                        'user_session' => TRUE,
                        'username'     => $siswa_check['username'],
                        'nisn'         => $siswa_check['nisn'],
                        'foto'         => $siswa_check['foto'],
                        'role'         => 'siswa'
                    ];
                    $this->session->set($sessLogin);
                    return redirect()->to('siswa');
                // Jika username tidak ditemukan sebagai admin atau siswa, set flashdata dan redirect ke halaman login
                } else {
                    $this->session->setFlashdata('login_fail', 'Username tidak ditemukan!');
                    return redirect()->to('login');
                }
            }
        }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('login');
    }
}
