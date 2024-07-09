<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function layout()
    {
        return view('body');
    }
    
    // public function body()
    // {
    //     return view('admin/body');
    // }

    public function buku_layak()
    {
        return view('buku_layak');
    }

    public function buku_rusak()
    {
        return view('buku_rusak');
    }

    public function peminjaman()
    {
        return view('peminjaman');
    }

    public function daftar_pengunjung()
    {
        return view('daftar_pengunjung');
    }

    public function jadwal_kunjungan()
    {
        return view('jadwal_kunjungan');
    }

    public function data_admin()
    {
        return view('data_admin');
    }

    public function data_guru()
    {
        return view('data_guru');
    }

    public function data_siswa()
    {
        return view('data_siswa');
    }

    public function profil_admin()
    {
        return view('profil_admin');
    }
    
    public function masuk()
    {
        return view('auth/masuk');
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
