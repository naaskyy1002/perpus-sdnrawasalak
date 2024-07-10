<?php

namespace App\Controllers;

class Home extends BaseController
{
    
    public function login()
    {
        return view('auth/login');
    }

    public function welcome()
    {
        return view('pages/welcome');
    }

    public function tentang_kami()
    {
        return view('tentang_kami');
    }

    public function kontak()
    {
        return view('kontak');
    }
}
