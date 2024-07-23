<?php

namespace App\Controllers;
use App\Models\BukuModel;
class Page extends BaseController
{
    // halaman yang dapat di akses oleh siswa

    protected $bukuModel;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
    }

    public function beranda()
    {
        $buku = $this->bukuModel->getBuku();
        $data = [
            'buku' => $buku,
        ]; // Atau menggunakan paginate jika data banyak
        return view('siswa/beranda', $data);
    }

    // public function buku()
    // {
    //     $model = new BukuModel();
    //     $data['buku'] = $model->findAll();
    //     return view('siswa/buku');
    // }

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