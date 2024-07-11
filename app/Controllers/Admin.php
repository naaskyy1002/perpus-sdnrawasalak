<?php

namespace App\Controllers;

class Admin extends BaseController
{

public function home()
    {
        return view('admin/body');
    }
    
    // public function body()
    // {
    //     return view('admin/body');
    // }

    public function buku_layak()
    {
        return view('admin/buku/buku_layak');
    }

    public function buku_rusak()
    {
        return view('admin/buku/buku_rusak');
    }

    public function peminjaman()
    {
        return view('admin/transaksi/peminjaman');
    }

    public function daftar_pengunjung()
    {
        return view('admin/kunjungan/daftar_pengunjung');
    }

    public function jadwal_kunjungan()
    {
        return view('admin/kunjungan/jadwal_kunjungan');
    }

    public function data_admin()
    {
        return view('admin/maindata/data_admin');
    }

    public function data_guru()
    {
        return view('admin/maindata/data_guru');
    }

    public function data_siswa()
    {
        return view('admin/maindata/data_siswa');
    }

    public function profil_admin()
    {
        return view('admin/profil_admin');
    }

}