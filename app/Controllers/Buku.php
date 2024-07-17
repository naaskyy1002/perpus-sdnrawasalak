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

    // BUKU LAYAK
    public function buku_layak()
    {
        $currentPage = $this->request->getVar('page_buku') ? $this->request->getVar('page_buku') :
        1;

        $keyword = $this->request->getVar('keyword');
        if($keyword) {
            $buku = $this->bukuModel->search($keyword);
        }else {
            $buku = $this->bukuModel;
        }

        $buku = $this->bukuModel->paginate(10, 'buku');
        $pager = $this->bukuModel->pager;
        // $buku = $this->bukuModel->findAll();
        $data = [
            'title' => 'Daftar Buku',
            'buku' => $buku,
            'pager' => $pager,
            'currentPage' => $currentPage,
        ];

        return view('admin/buku/buku_layak', $data);
    }

    public function addBuku() 
    {
        // Validasi input untuk sampul
        $validation = $this->validate([
            'a_sampul' => [
                'uploaded[a_sampul]',
                'mime_in[a_sampul,image/jpg,image/jpeg,image/png]',
                'max_size[a_sampul,2048]', 
            ],
        ]);

        if (!$validation) {
            // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan kesalahan
            return redirect()->back()->withInput()
                                    ->with('errors', 'Maaf, gagal menambahkan data buku. Silakan periksa input Anda.');
        }

        // Ambil data dari request
        $kode_buku      = $this->request->getPost('a_kodebuku');
        $judul_buku     = $this->request->getPost('a_judulbuku');
        $pengarang      = $this->request->getPost('a_pengarang');
        $penerbit       = $this->request->getPost('a_penerbit');
        $tahun_terbit   = $this->request->getPost('a_tahunterbit');
        $kategori       = $this->request->getPost('a_kategori');
        $no_rak         = $this->request->getPost('a_norak');
        $jumlah_buku    = $this->request->getPost('a_jumlahbuku');

        // Proses upload sampul
        $file = $this->request->getFile('a_sampul');
        $sampulName = $kode_buku . '.' . $file->getExtension(); // Gunakan judul buku sebagai nama file
        $file->move('assets/img/buku', $sampulName);             // konfigurasi upload

        // Data untuk disimpan ke database
        $data = [
            'kode_buku'     => $kode_buku,
            'sampul'        => $sampulName,
            'judul_buku'    => $judul_buku,
            'pengarang'     => $pengarang,
            'penerbit'      => $penerbit,
            'tahun_terbit'  => $tahun_terbit,
            'kategori'      => $kategori,
            'no_rak'        => $no_rak,
            'jumlah_buku'   => $jumlah_buku,
        ];

        // Simpan data menggunakan model
        $this->bukuModel->createBuku($data);

        // Redirect dengan pesan sukses
        return redirect()->to('/admin/buku')->with('message', 'Buku berhasil ditambahkan!');
    }


    public function editBuku()
    {
        // Validasi input untuk sampul
        $validation = $this->validate([
            'e_sampul' => [
                'uploaded[e_sampul]',
                'mime_in[e_sampul,image/jpg,image/jpeg,image/png]',
                'max_size[e_sampul,2048]', 
            ],
        ]);

        // Ambil data dari form
        $id           = $this->request->getPost('e_idbuku');
        $kode_buku    = $this->request->getPost('e_kodebuku');
        $judul_buku   = $this->request->getPost('e_judulbuku');
        $pengarang    = $this->request->getPost('e_pengarang');
        $penerbit     = $this->request->getPost('e_penerbit');
        $tahun_terbit = $this->request->getPost('e_tahunterbit');
        $kategori     = $this->request->getPost('e_kategori');
        $no_rak       = $this->request->getPost('e_norak');
        $jumlah_buku  = $this->request->getPost('e_jumlahbuku');

        // Data untuk disimpan ke database
        $data = [
            'kode_buku'     => $kode_buku,
            'judul_buku'    => $judul_buku,
            'pengarang'     => $pengarang,
            'penerbit'      => $penerbit,
            'tahun_terbit'  => $tahun_terbit,
            'kategori'      => $kategori,
            'no_rak'        => $no_rak,
            'jumlah_buku'   => $jumlah_buku,
        ];

        if (!$validation) {
            // Tidak ada sampul yang diunggah atau validasi gagal, gunakan sampul lama
            $data['sampul'] = $this->request->getPost('e_oldsampul');
        } else {
            // Validasi berhasil, hapus foto sampul lama jika ada
            $old_foto = $this->request->getPost('e_oldsampul');
            if ($old_foto && file_exists('assets/img/buku/' . $old_foto)) {
                unlink('assets/img/buku/' . $old_foto);
            }

            // Simpan foto sampul baru
            $sampul = $this->request->getFile('e_sampul');
            $sampul_name = $kode_buku . '.' . $sampul->getExtension();
            $sampul->move('assets/img/buku', $sampul_name);
            $data['sampul'] = $sampul_name;
        }

        // Update data buku di database
        $this->bukuModel->updateBuku($data, $id);

        // Redirect dengan pesan sukses
        return redirect()->to('/admin/buku')->with('message', 'Buku berhasil diubah!');
    }



    public function deleteBuku()
    {
        $id = $this->request->getPost('id_buku');
        $buku = $this->bukuModel->find($id);
    
        // Pastikan buku ditemukan
        if ($buku) {
            $old_foto = $buku['sampul']; // Ambil nama sampul buku
    
            // Hapus sampul buku dari folder jika file ada
            if (file_exists('assets/img/buku/' . $old_foto)) {
                unlink('assets/img/buku/' . $old_foto);
            }
    
            // Hapus data buku dari database
            $success = $this->bukuModel->deleteBuku($id);
    
            if ($success) {
                session()->setFlashdata('message', 'Buku berhasil dihapus!');
            } else {
                session()->setFlashdata('errors', 'Gagal menghapus buku.');
            }
        } else {
            session()->setFlashdata('errors', 'Buku tidak ditemukan.');
        }
    
        return redirect()->to('/admin/buku');
    }
    

    // BUKU RUSAK
    public function buku_rusak()
    {     
        $currentPage = $this->request->getVar('page_bukuRusak') ? $this->request->getVar('page_bukuRusak') :
        1;

        $keyword = $this->request->getVar('keyword');
        if($keyword) {
            $bkrusak = $this->bukuModel->searching($keyword);
        }else {
            $bkrusak = $this->bukuModel;
            $this->bukuModel->setTable('buku_rusak');
        }

        $bkrusak = $this->bukuModel->paginate(10, 'buku_rusak');
        $pager = $this->bukuModel->pager;

        // $bkrusak = $this->bukuModel->findAll();
        $data = [
            'title' => 'Daftar Buku Rusak',
            'bkrusak' => $bkrusak,
            'pager' => $pager,
            'currentPage' => $currentPage,
        ];
        
        return view('admin/buku/buku_rusak', $data);
    }

    public function addBkr()
    {
        // Validasi input untuk foto bukti
        $validation = $this->validate([
            'abkr_bukti' => [
                'uploaded[abkr_bukti]',
                'mime_in[abkr_bukti,image/jpg,image/jpeg,image/png]',
                'max_size[abkr_bukti,2048]',
            ],
        ]);

        if (!$validation) {
            // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan kesalahan
            return redirect()->back()->withInput()->with('errors', [
                'validation' => 'Maaf, gagal menambahkan data buku rusak. Silakan periksa input Anda.',
                'details' => $this->validator->getErrors()
            ]);
        }

        // Ambil data dari request
        $kode_buku         = $this->request->getPost('abkr_kode');
        $judul_buku        = $this->request->getPost('abkr_judul');
        $pengarang         = $this->request->getPost('abkr_pengarang');
        $kategori          = $this->request->getPost('abkr_kategori');
        $tanggal_pendataan = $this->request->getPost('abkr_tgldata');
        $halaman           = $this->request->getPost('abkr_hal');
        $keterangan        = $this->request->getPost('abkr_ket');
        
        // Proses upload foto bukti
        $file = $this->request->getFile('abkr_bukti');
        $buktiName = $kode_buku . '.' . $file->getExtension(); // Gunakan judul buku sebagai nama file
        $file->move('assets/img/bukti', $buktiName);

        // Data untuk disimpan ke database
        $data = [
            'kode_buku'         => $kode_buku,
            'judul_buku'        => $judul_buku,
            'pengarang'         => $pengarang,
            'kategori'          => $kategori,
            'tanggal_pendataan' => $tanggal_pendataan,
            'halaman'           => $halaman,
            'keterangan'        => $keterangan,
            'foto_bukti'        => $buktiName,
        ];

        // Simpan data menggunakan model
        $this->bukuModel->createBkr($data);

        // Redirect dengan pesan sukses
        return redirect()->to('/admin/bukuRusak')->with('message', 'Buku rusak berhasil ditambahkan!');
    }

    public function editBkr()
    {
        // Validasi input untuk foto bukti
        $validation = $this->validate([
            'ebkr_bukti' => [
                'uploaded[ebkr_bukti]',
                'mime_in[ebkr_bukti,image/jpg,image/jpeg,image/png]',
                'max_size[ebkr_bukti,2048]',
            ],
        ]);

        // Ambil data dari form
        $id                = $this->request->getPost('ebkr_id');
        $kode_buku         = $this->request->getPost('ebkr_kode');
        $judul_buku        = $this->request->getPost('ebkr_judul');
        $pengarang         = $this->request->getPost('ebkr_pengarang');
        $kategori          = $this->request->getPost('ebkr_kategori');
        $tanggal_pendataan = $this->request->getPost('ebkr_tgl');
        $halaman           = $this->request->getPost('ebkr_hal');
        $keterangan        = $this->request->getPost('ebkr_ket');

        // Data untuk disimpan ke database
        $data = [
            'kode_buku'         => $kode_buku,
            'judul_buku'        => $judul_buku,
            'pengarang'         => $pengarang,
            'kategori'          => $kategori,
            'tanggal_pendataan' => $tanggal_pendataan,
            'halaman'           => $halaman,
            'keterangan'        => $keterangan,
        ];

        if (!$validation) {
            // Tidak ada bukti yang diunggah atau validasi gagal, gunakan bukti lama
            $data['foto_bukti'] = $this->request->getPost('ebkr_oldbukti');
        } else {
            // Validasi berhasil, hapus foto bukti lama jika ada
            $old_foto = $this->request->getPost('ebkr_oldbukti');
            if ($old_foto && file_exists('assets/img/bukti/' . $old_foto)) {
                unlink('assets/img/bukti/' . $old_foto);
            }

            // Simpan foto bukti baru
            $bukti = $this->request->getFile('ebkr_bukti');
            $buktiName = $kode_buku . '.' . $bukti->getExtension();
            $bukti->move('assets/img/bukti', $buktiName);
            $data['foto_bukti'] = $buktiName;
        }

        // Update data buku di database
        $this->bukuModel->updateBkr($data, $id);

        // Redirect dengan pesan sukses
        return redirect()->to('/admin/bukuRusak')->with('message', 'Buku rusak berhasil diubah!');
    }


    public function deleteBkr()
    {
        $id = $this->request->getPost('id_buku');
        $this->bukuModel->setTable('buku_rusak');
        $bukuRusak = $this->bukuModel->find($id);
    
        // Pastikan buku ditemukan
        if ($bukuRusak) {
            $old_foto = $bukuRusak['foto_bukti']; // Ambil nama sampul buku
    
            // Hapus sampul buku dari folder jika file ada
            if (file_exists('assets/img/bukti/' . $old_foto)) {
                unlink('assets/img/bukti/' . $old_foto);
            }
    
            // Hapus data buku dari database
            $success = $this->bukuModel->deleteBkr($id);
    
            if ($success) {
                session()->setFlashdata('message', 'Buku Rusak berhasil dihapus!');
            } else {
                session()->setFlashdata('errors', 'Gagal menghapus buku rusak.');
            }
        } else {
            session()->setFlashdata('errors', 'Buku tidak ditemukan.');
        }
    
        return redirect()->to('/admin/bukuRusak');
    }


}
