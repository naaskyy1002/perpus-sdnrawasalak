<?php

namespace App\Controllers;
use App\Models\AdminModel;
use App\Models\TransaksiModel;
use App\Models\SiswaModel;
use App\Models\BukuModel;
use App\Models\VisitorModel;

class Home extends BaseController
{
    protected $adminModel;
    protected $transaksiModel;
    protected $siswaModel;
    protected $bukuModel;
    protected $visitorModel;
    protected $session;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        $this->transaksiModel = new TransaksiModel();
        $this->siswaModel = new SiswaModel();
        $this->bukuModel = new BukuModel();
        $this->visitorModel = new VisitorModel();
        $this->session = \Config\Services::session();
    }
    public function welcome()
    {
        $data = [
            'title' => 'PERPUSTAKAAN SDN RAWASALAK',
            'total_buku' => $this->adminModel->totalBuku(),
            'total_siswa' => $this->siswaModel->totalSiswa(),
            'total_pengunjung' => $this->visitorModel->totalPengunjungByMonth(),
            'total_transaksi' => $this->transaksiModel->totalTransaksi(),
            'buku' => $this->bukuModel->getBuku(),
        ]; 
        return view('pages/welcome', $data);
    }

    public function tentang_kami()
    {
        $data = [
            'title' => 'Tentang Kami | PERPUSTAKAAN SDN RAWASALAK'
        ]; 
        return view('pages/tentang_kami' , $data);
    }

    public function kontak()
    {
        $data = [
            'title' => 'Kontak | PERPUSTAKAAN SDN RAWASALAK'
        ]; 
        return view('pages/kontak', $data);
    }
}
