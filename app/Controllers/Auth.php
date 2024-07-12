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
            if ($this->session->get('user_level') == 0) {
                return redirect()->to('admin');
            }
            if ($this->session->get('user_level') == 1) {
                return redirect()->to('user');
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
        
        $user_name = $this->request->getPost('user_name');
        $user_pass = $this->request->getPost('user_pass');
        
        //ambil data user di database yang user_name nya sama 
        $user_check = $Login->getUser($user_name);
        
        if ($user_check) { //cek apakah username ditemukan
            if ($user_check['user_pass'] != $user_pass) { 
            //cek password jika salah arahkan lagi ke halaman login
                session()->setFlashdata('login_fail', 'Password salah!');
                return redirect()->to('login');
            }

            if(($user_check['user_pass'] == $user_pass) && ($user_check['user_level'] == 0)) {
                //jika benar, arahkan user masuk ke halaman admin 
                    $sessLogin = [
                        'user_session' => TRUE,
                        'user_name'    => $user_check['user_name'],
                        'user_level'   => $user_check['user_level']
                        ];
                    $this->session->set($sessLogin);
                    return redirect()->to('admin');
                }
                if(($user_check['user_pass'] == $user_pass) && ($user_check['user_level'] == 1)) {
                //jika benar, arahkan user masuk ke halaman user 
                    $sessLogin = [
                        'user_session' => TRUE,
                        'user_name'    => $user_check['user_name'],
                        'user_level'   => $user_check['user_level']
                        ];
                    $this->session->set($sessLogin);
                    return redirect()->to('user');
                }
        } else {
            //jika username tidak ditemukan, balikkan ke halaman login
            session()->setFlashdata('login_fail', 'Username tidak ditemukan!');
            return redirect()->to('login');
        }
    }

    public function logout()
    {
        //hapus session dan kembali ke halaman login
        $this->session->destroy();
        return redirect()->to('login');
    }
}
