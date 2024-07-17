<?php

namespace App\Controllers;
use App\Models\TransaksiModel;

class Transaksi extends BaseController
{
    protected $transaksiModel;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();   
    }
    
    public function peminjaman()
    {
        $currentPage = $this->request->getVar('page_transaksi') ? $this->request->getVar('page_transaksi') :
        1;

        $keyword = $this->request->getVar('keyword');
        if($keyword) {
            $pinjam = $this->transaksiModel->search($keyword);
        }else {
            $pinjam = $this->transaksiModel;
        }

        $pinjam = $this->transaksiModel->paginate(10, 'transaksi');
        $pager = $this->transaksiModel->pager;
        $pinjam = $this->transaksiModel->getPeminjaman();
        $data=[
            'title' => 'Transaksi Peminjaman',
            'peminjaman' => $pinjam,
            // 'search' => $pinjams,
            'isi' => 'peminjaman',
            'pager' => $pager,
            'currentPage' => $currentPage,
        ];
        return view('admin/transaksi/peminjaman', $data);
    }

    
}