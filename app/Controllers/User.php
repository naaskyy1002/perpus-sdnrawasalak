<?php

namespace App\Controllers;
class User extends BaseController
{
    // halaman yang dapat di akses oleh siswa

    public function beranda()
    {
        return view('user/beranda');
    }

    public function buku()
    {
        return view('user/buku');
    }

    public function pinjaman()
    {
        return view('user/pinjaman');
    }

    public function riwayat()
    {
        return view('user/riwayat');
    }

    public function detail()
    {
        return view('user/detail');
    }
}