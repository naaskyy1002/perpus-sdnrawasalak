<?php

namespace App\Controllers;
use App\Models\BukuModel;
use App\Models\SiswaModel;
use App\Models\TransaksiModel;

class Page extends BaseController
{
    // halaman yang dapat di akses oleh siswa
    protected $bukuModel;
    protected $siswaModel;
    protected $transaksiModel;
    protected $session;

    //menginisialisasi beberapa dependensi dan layanan yang diperlukan oleh kelas,
    public function __construct()
    {
        $this->bukuModel = new BukuModel();
        $this->siswaModel = new SiswaModel();
        $this->transaksiModel = new TransaksiModel();
        $this->session = \Config\Services::session();
        
    }

    public function beranda()
    {
        // menampilkan page halaman saat di klik   
        $currentPage = $this->request->getVar('page_buku') ? $this->request->getVar('page_buku') :
        1;

        // mencari keyword yang sesuai untuk halaman beranda koleksi buku siswa
        $keyword = $this->request->getVar('keyword');
        if($keyword) {
            $buku = $this->bukuModel->search($keyword);
        }else {
            $this->bukuModel->setTable('buku');
            $buku = $this->bukuModel;
        }

        $buku = $this->bukuModel->paginate(10, 'buku');  // menentukan seberapa banyak buku ditampilkan di views
        $pager = $this->bukuModel->pager;
        $data = [
            'title' => 'Koleksi Buku',
            'buku' => $buku,
            'pager' => $pager,
            'currentPage' => $currentPage,
        ];
        return view('siswa/beranda', $data);
    }

    public function pinjaman()
    {
        $nisn = $this->session->get('nisn'); // Ambil nisn dari session
        
        // Ambil pinjaman terkini untuk siswa
        $pinjamanTerkini = $this->transaksiModel->getByPinjaman($nisn);

        $data = [
            'title' => 'Pinjaman Terkini',
            'pinjamanTerkini' => $pinjamanTerkini
        ];

        return view('siswa/pinjaman', $data);
    }

    public function riwayat()
    {
        $nisn = $this->session->get('nisn'); // Ambil nisn dari session
        // Ambil pinjaman terkini untuk siswa
        $riwayat = $this->transaksiModel->getByRiwayat($nisn);
        $data = [
            'title' => 'Riwayat Peminjaman',
            'riwayat' => $riwayat
        ];
        return view('siswa/riwayat', $data);
    }

    public function profil_user()
    {
        // Mendapatkan username pengguna yang saat ini masuk dari sesi
        $username = $this->session->get('username');

        // Mendapatkan semua profil siswa dari model siswa
        $allProfil = $this->siswaModel->getSiswa();

        // Menyaring profil untuk mendapatkan profil yang sesuai dengan username pengguna yang masuk
        $profil = array_filter($allProfil, function ($profil) use ($username) {
            return $profil['username'] == $username;
        });

        // Mengambil elemen pertama dari hasil filter sebagai profil pengguna
        $profil = reset($profil);

        $data = [
            'title' => 'PROFIL SAYA',
            'profil' => $profil,
        ];

        return view('siswa/profil_user', $data);
    }

}