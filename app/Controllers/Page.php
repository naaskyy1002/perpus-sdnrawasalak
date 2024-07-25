<?php

namespace App\Controllers;
use App\Models\BukuModel;
use App\Models\SiswaModel;

class Page extends BaseController
{
    // halaman yang dapat di akses oleh siswa

    protected $bukuModel;
    protected $siswaModel;
    protected $session;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
        $this->siswaModel = new SiswaModel();
        $this->session = \Config\Services::session();
        
    }

    public function beranda()
    {
        $currentPage = $this->request->getVar('page_buku') ? $this->request->getVar('page_buku') :
        1;

        $keyword = $this->request->getVar('keyword');
        if($keyword) {
            $buku = $this->bukuModel->search($keyword);
        }else {
            $this->bukuModel->setTable('buku');
            $buku = $this->bukuModel;
        }

        $buku = $this->bukuModel->paginate(10, 'buku');
        $pager = $this->bukuModel->pager;
        $data = [
            'buku' => $buku,
            'pager' => $pager,
            'currentPage' => $currentPage,
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
        $username = $this->session->get('username');
        $allProfil = $this->siswaModel->getSiswa();

        $profil = array_filter($allProfil, function ($profil) use ($username) {
        return $profil['username'] == $username;
        });

        $profil = reset($profil);

        $data = [
        'title' => 'PROFIL SAYA',
        'profil' => $profil,
        ];

        return view('siswa/profil_user', $data);
    }
}