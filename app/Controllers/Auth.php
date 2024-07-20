<?php

namespace App\Controllers;
use App\Models\LoginModel;

class Auth extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function login()
    {
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
        
        $user_check = $Login->getAdmin($username);
        
        if ($user_check) {
            if ($user_check['password'] != $password) { 
                session()->setFlashdata('login_fail', 'Password salah!');
                return redirect()->to('login');
            }
            if ($user_check['level'] == 1) {
                $sessLogin = [
                    'user_session'  => TRUE,
                    'username'      => $user_check['username'],
                    'nama_lengkap'  => $user_check['nama_lengkap'],
                    'level'         => $user_check['level']
                ];
                $this->session->set($sessLogin);
                return redirect()->to('admin');
            }
        } else {
            $siswa_check = $Login->getSiswa($username);
            if ($siswa_check) {
                if ($siswa_check['password'] != $password) {
                    session()->setFlashdata('login_fail', 'Password salah!');
                    return redirect()->to('login');
                }
                $sessLogin = [
                    'user_session' => TRUE,
                    'username'     => $siswa_check['username'],
                    'nama_lengkap' => $siswa_check['nama_lengkap'],
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
