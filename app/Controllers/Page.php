<?php

namespace App\Controllers;
class Page extends BaseController
{
    // halaman yang dapat di akses oleh siswa

    public function beranda()
    {
        return view('siswa/beranda');
    }

    public function buku()
    {
        return view('siswa/buku');
    }

    public function pinjaman()
    {
        return view('siswa/pinjaman');
    }

    public function riwayat()
    {
        return view('siswa/riwayat');
    }

    public function detail()
    {
        return view('siswa/detail');
    }

    public function profil_user()
    {
        return view('siswa/profil_user');
    }
}