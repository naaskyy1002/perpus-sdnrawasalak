<?php

namespace App\Controllers;
use App\Models\LoginModel;

class Auth extends BaseController
{
    // Properti untuk menyimpan session
    protected $session;

    // Konstruktor untuk inisialisasi session
    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function login() 
    {
        // Jika user sudah memiliki session aktif
        if ($this->session->has('user_session')) {
            // Jika level user adalah 1 (admin atau operator)
            if ($this->session->get('level') == 1) {
                return redirect()->to('admin');
            }
            // Jika role user adalah siswa
            if ($this->session->get('role') == 'siswa') {
                return redirect()->to('siswa');
            }
        }
        else {
            $data = [
                'title' => 'Login | Perpustakaan SDN Rawasalak'
            ];
            return view('auth/login', $data);
        }
    }

    public function validLogin()
    {
        $Login = new LoginModel();
        
        // Mendapatkan data dari form login
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        // Cek user di tabel admin
        $user_check = $Login->getAdmin($username);
        
        if ($user_check) {
            // Jika password tidak sesuai
            if ($user_check['password'] != $password) { 
                session()->setFlashdata('login_fail', 'Password salah!');
                return redirect()->to('login');
            }
            // Jika valid, set session untuk admin atau operator (level 1)
            if ($user_check['level'] == 1) {
                $sessLogin = [
                    'user_session' => TRUE,
                    'username'    => $user_check['username'],
                    'level'   => $user_check['level']
                ];
                $this->session->set($sessLogin);
                return redirect()->to('admin');
            }
        } else {
            // Cek user di tabel siswa
            $siswa_check = $Login->getSiswa($username);
            if ($siswa_check) {
                // Jika password tidak sesuai
                if ($siswa_check['password'] != $password) {
                    session()->setFlashdata('login_fail', 'Password salah!');
                    return redirect()->to('login');
                }
                // Jika valid, set session untuk siswa
                $sessLogin = [
                    'user_session' => TRUE,
                    'username'    => $siswa_check['username'],
                    'role'         => 'siswa'
                ];
                $this->session->set($sessLogin);
                return redirect()->to('siswa');
            } else {
                session()->setFlashdata('login_fail', 'Username tidak ditemukan!');
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
