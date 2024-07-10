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
        if($this->session->has('user_session')) {
            if($this->session->get('user_level') == 0) {
                return redirect()->to('/admin');
            }
            if($this->session->get('user_level') == 1) {
                return redirect()->to('/user');
            }
        }
        else {
            $data = [
                'title' => 'Login | Belajar Web'
            ];
            return view('login', $data);
        }
    }
}
