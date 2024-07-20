<?php

namespace App\Controllers;
use App\Models\TransaksiModel;
use App\Models\BukuModel;
use App\Models\SiswaModel;

class Transaksi extends BaseController
{
    protected $transaksiModel;
    protected $bukuModel;
    protected $siswaModel;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
        $this->bukuModel = new BukuModel(); // Model untuk tabel buku
        $this->siswaModel = new SiswaModel(); // Model untuk tabel siswa
    }

    public function addTransaksi()
    {   
        // Ambil data dari request
        $kode = $this->request->getPost('a_kode');
        $nisn = $this->request->getPost('a_nisn');
        $tgl_pinjam = $this->request->getPost('a_pinjam');

        // Cek apakah kode buku ada di database
        $buku = $this->bukuModel->where('kode_buku', $kode)->first();
        if (!$buku) {
            session()->setFlashdata('errors', 'Kode buku tidak ditemukan.');
            return redirect()->back()->withInput(); // Menjaga inputan form
        }

        // Cek apakah nisn ada di database
        $siswa = $this->siswaModel->where('nisn', $nisn)->first();
        if (!$siswa) {
            session()->setFlashdata('errors', 'NISN tidak ditemukan.');
            return redirect()->back()->withInput(); // Menjaga inputan form
        }

        // Data untuk disimpan ke database
        $data = [
            'kode_buku' => $kode,
            'nisn' => $nisn,
            'tgl_pinjam' => $tgl_pinjam,
        ];

        // Simpan data menggunakan model
        $this->transaksiModel->createTransaksi($data);

        // Redirect dengan pesan sukses
        return redirect()->to('/admin/peminjaman')->with('message', 'Transaksi berhasil ditambahkan!');
    }

    // public function pinjam()
    // {
    //     $currentPage = $this->request->getVar('page_transaksi') ? $this->request->getVar('page_transaksi') : 1;

    //     $keyword = $this->request->getVar('keyword');
    //     if ($keyword) {
    //         $transaksi = $this->transaksiModel->search($keyword);
    //     } else {
    //         $transaksi = $this->transaksiModel;
    //     }

    //     $transaksi = $this->transaksiModel->paginate(10, 'transaksi');
    //     $pager = $this->transaksiModel->pager;
    //     $transaksi = $this->transaksiModel->getPeminjaman();
    //     $data = [
    //         'title' => 'Transaksi Pinjam',
    //         'transaksi' => $transaksi,
    //         'isi' => 'peminjaman',
    //         'pager' => $pager,
    //         'currentPage' => $currentPage,
    //     ];
    //     return view('admin/body', $data);
    // }

    // public function kembali()
    // {

    // }

    public function peminjaman()
    {
        $currentPage = $this->request->getVar('page_peminjaman') ? $this->request->getVar('page_peminjaman') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $pinjam = $this->transaksiModel->search($keyword);
        } else {
            $pinjam = $this->transaksiModel;
        }

        $pinjam = $this->transaksiModel->paginate(10, 'transaksi');
        $pager = $this->transaksiModel->pager;
        $pinjam = $this->transaksiModel->getPeminjaman();
        $data = [
            'title' => 'Transaksi Peminjaman',
            'peminjaman' => $pinjam,
            'isi' => 'peminjaman',
            'pager' => $pager,
            'currentPage' => $currentPage,
        ];
        return view('admin/transaksi/peminjaman', $data);
    }

    public function pengembalian()
    {
        $currentPage = $this->request->getVar('page_transaksi') ? $this->request->getVar('page_transaksi') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $kembali = $this->transaksiModel->search($keyword);
        } else {
            $kembali = $this->transaksiModel;
        }

        $kembali = $this->transaksiModel->paginate(10, 'transaksi');
        $pager = $this->transaksiModel->pager;
        $kembali = $this->transaksiModel->getPeminjaman();
        $kembali = $this->transaksiModel->getPengembalian();
        $data = [
            'title' => 'Transaksi Pengembalian',
            'pengembalian' => $kembali,
            'isi' => 'pengembalian',
            'pager' => $pager,
            'currentPage' => $currentPage,
        ];
        return view('admin/transaksi/pengembalian', $data);
    }

    public function selesai()
    {
    $id = $this->request->getPost('id_transaksi');
    $tgl_kembali = date('Y-m-d');
    $this->transaksiModel->update($id, ['tgl_kembali' => $tgl_kembali]);
    return redirect()->to(base_url('transaksi/pengembalian'));
    }


    public function deleteTransaksi()
    {
        $id = $this->request->getPost('id_transaksi');
        $transaksi = $this->transaksiModel->find($id);

        // Pastikan transaksi ditemukan
        if ($transaksi) {
            // Hapus data transaksi dari database
            $success = $this->transaksiModel->delete($id);

            if ($success) {
                session()->setFlashdata('message', 'Transaksi berhasil dihapus!');
            } else {
                session()->setFlashdata('errors', 'Gagal menghapus transaksi.');
            }
        } else {
            session()->setFlashdata('errors', 'Transaksi tidak ditemukan.');
        }

        return redirect()->to('/admin/peminjaman');
    }
}
