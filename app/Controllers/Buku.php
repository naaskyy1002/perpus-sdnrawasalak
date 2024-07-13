<?php

namespace App\Controllers;
use App\Models\BukuModel;

class Buku extends BaseController
{
    protected $bukuModel;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
    }

    public function buku_layak()
    {
        $this->bukuModel->setTable('buku');
        $buku = $this->bukuModel->findAll();
        $data = [
            'title' => 'Daftar Buku',
            'buku' => $buku
        ];

        return view('admin/buku/buku_layak', $data);
    }

    public function addBuku() 
    {
    $check_sampul = $this->validate([
        'sampul' => [
            'uploaded[a_sampul]',
            'mime_in[a_sampul,image/jpg,image/jpeg,image/png]'
        ]
    ]);

    if (!$check_sampul) {
        $data = [
            'kode_buku'     => $this->request->getPost('a_kodebuku'),
            'sampul'        => "NoCover.jpg",
            'judul_buku'    => $this->request->getPost('a_judulbuku'),
            'pengarang'     => $this->request->getPost('a_pengarang'),
            'penerbit'      => $this->request->getPost('a_penerbit'),
            'tahun_terbit'  => $this->request->getPost('a_tahunterbit'),
            'kategori'      => $this->request->getPost('a_kategori'),
            'no_rak'        => $this->request->getPost('a_norak'),
            'jumlah_buku'   => $this->request->getPost('a_jumlahbuku'),
        ];
    } else {
        $sampul_name  = $this->request->getPost('a_judulbuku');
        $sampul = $this->request->getFile('a_sampul');
        $sampulName = $sampul->getName();
        $sampul_ext  = explode(".", $sampulName);
        $sampul_exts = end($sampul_ext);
        $name_sampul = $sampul_name.'.'.$sampul_exts;

        $data = [
            'kode_buku'     => $this->request->getPost('a_kodebuku'),
            'sampul'        => $name_sampul,
            'judul_buku'    => $this->request->getPost('a_judulbuku'),
            'pengarang'     => $this->request->getPost('a_pengarang'),
            'penerbit'      => $this->request->getPost('a_penerbit'),
            'tahun_terbit'  => $this->request->getPost('a_tahunterbit'),
            'kategori'      => $this->request->getPost('a_kategori'),
            'no_rak'        => $this->request->getPost('a_norak'),
            'jumlah_buku'   => $this->request->getPost('a_jumlahbuku'),
        ];
        $sampul->move('assets/img/buku', $name_sampul);
    }

    $this->bukuModel->createBuku($data);
    // return $this->buku_layak();
    return redirect()->to('/admin/buku_layak')->with('message', 'Buku berhasil ditambahkan!');
}

    public function editBuku($id)
    {
        $check_sampul = $this->validate([
            'sampul' => [
                'uploaded[e_sampul]',
                'mime_in[e_sampul,image/jpg,image/jpeg,image/png]'
            ]
        ]);
        if (!$check_sampul) {
            $id = $this->request->getPost('e_idbuku');
            $data = [
                'kode_buku'     => $this->request->getPost('e_kodebuku'),
                'sampul'        => $this->request->getPost('e_oldsampul'),
                'judul_buku'    => $this->request->getPost('e_judulbuku'),
                'pengarang'     => $this->request->getPost('e_pengarang'),
                'penerbit'      => $this->request->getPost('e_penerbit'),
                'tahun_terbit'  => $this->request->getPost('e_tahunterbit'),
                'kategori'      => $this->request->getPost('e_kategori'),
                'no_rak'        => $this->request->getPost('e_norak'),
                'jumlah_buku'   => $this->request->getPost('e_jumlahbuku'),
            ];
        }
        else {
            $old_foto = $this->request->getPost('e_oldsampul');
            if($old_foto != 'NoPhoto.jpg') unlink('assets/img/buku'. $old_foto);

            $id = $this->request->getPost('e_idbuku');
            $sampul_name  = $this->request->getPost('e_judulbuku');
            $sampul = $this->request->getFile('e_sampul');
            $sampulName = $sampul->getName();
            $sampul_ext  = explode(".", $sampulName);
            $sampul_exts = end($sampul_ext);
            $name_sampul = $sampul_name.'.'.$sampul_exts;

            $data = [
                'kode_buku'     => $this->request->getPost('e_kodebuku'),
                'sampul'        => $name_sampul,
                'judul_buku'    => $this->request->getPost('e_judulbuku'),
                'pengarang'     => $this->request->getPost('e_pengarang'),
                'penerbit'      => $this->request->getPost('e_penerbit'),
                'tahun_terbit'  => $this->request->getPost('e_tahunterbit'),
                'kategori'      => $this->request->getPost('e_kategori'),
                'no_rak'        => $this->request->getPost('e_norak'),
                'jumlah_buku'   => $this->request->getPost('e_jumlahbuku'),
            ];
            $sampul->move('assets/img/buku', $name_sampul);
        }

        $this->bukuModel->updateBuku($data, $id);
        return redirect()->to('/admin/buku_layak')->with('message', 'Buku berhasil diubah!');

    }

    public function deleteBuku()
    {
        $id = $this->request->getPost('d_idbuku');
        
        $old_foto = $this->request->getPost('d_oldsampul');
        if($old_foto != 'NoPhoto.jpg') unlink('assets/img/buku' . $old_foto);

        $this->bukuModel->deleteBuku($id);
        return redirect()->to('/admin/buku_layak')->with('message', 'Buku berhasil dihapus!');
    }

    public function buku_rusak()
    {
        $this->bukuModel->setTable('buku_rusak');
        $bkrusak = $this->bukuModel->findAll();
        $data = [
            'title' => 'Daftar Buku Rusak',
            'bkrusak' => $bkrusak
        ];
        
        return view('admin/buku/buku_rusak', $data);
    }
}
