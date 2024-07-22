<?php

namespace App\Controllers;
use App\Models\BukuModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

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

    public function printBuku()
    {
        $currentPage = $this->request->getVar('page_printBuku') ? $this->request->getVar('page_printBuku') :
        1;

        $keyword = $this->request->getVar('keyword');
        if($keyword) {
            $buku = $this->bukuModel->searching($keyword);
        }else {
            $buku = $this->bukuModel;
        }

        $buku = $this->bukuModel->paginate(10, 'printBuku');
        $pager = $this->bukuModel->pager;

        $data = [
            'title' => 'Daftar Buku Layak',
            'buku' => $buku,
            'pager' => $pager,
            'currentPage' => $currentPage,
        ];
        return view('admin/buku/printBuku', $data);
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

    public function printBkr()
    {
        $currentPage = $this->request->getVar('page_printBkr') ? $this->request->getVar('page_printBkr') :
        1;

        $keyword = $this->request->getVar('keyword');
        if($keyword) {
            $bkrusak = $this->bukuModel->searching($keyword);
        }else {
            $bkrusak = $this->bukuModel;
            $this->bukuModel->setTable('buku_rusak');
        }

        $bkrusak = $this->bukuModel->paginate(10, 'printBkr');
        $pager = $this->bukuModel->pager;

        $data = [
            'title' => 'Daftar Buku Rusak',
            'bkrusak' => $bkrusak,
            'pager' => $pager,
            'currentPage' => $currentPage,
        ];
        return view('admin/buku/printBkr', $data);
    }

    public function excelBkr()
    {
        $data = $this->bukuModel->setTable('buku_rusak');

        // Membuat instance spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menulis judul tabel
        $sheet->setCellValue('A1', 'Data Buku Rusak');
        $sheet->mergeCells('A1:H1'); // Merge cells dari A1 sampai H1
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER); // Center align
        $sheet->getStyle('A1')->getFont()->setBold(true); // Buat teks judul tebal

        // Menulis header kolom
        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'NIM');
        $sheet->setCellValue('C3', 'Nama');
        $sheet->setCellValue('D3', 'Tanggal Lahir');
        $sheet->setCellValue('E3', 'Jenis Kelamin');
        $sheet->setCellValue('F3', 'Alamat');
        $sheet->setCellValue('G3', 'Email');
        $sheet->setCellValue('H3', 'Foto');
        // Tambahkan header kolom lainnya sesuai kebutuhan

        // Menambahkan style untuk header
        $headerStyleArray = [
            'font' => [
                'bold' => true,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'FFFF00', // Warna kuning
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ];

        $sheet->getStyle('A3:H3')->applyFromArray($headerStyleArray);

        // Menulis data ke dalam spreadsheet
        $row = 4; // Mulai dari baris kedua setelah header
        $no = 1;

        // Mendapatkan base_url dari konfigurasi
        $baseUrl = base_url() . 'mhs-foto/';

        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $no);
            $sheet->setCellValue('B' . $row, $item['mhs_nim']);
            $sheet->setCellValue('C' . $row, $item['mhs_nama']);
            $sheet->setCellValue('D' . $row, $item['mhs_dob']);
            $sheet->setCellValue('E' . $row, $item['mhs_jk']);
            $sheet->setCellValue('F' . $row, $item['mhs_alamat']);
            $sheet->setCellValue('G' . $row, $item['mhs_email']);

            // Menggabungkan teks dan menambahkan hyperlink
            $photoUrl = $baseUrl . $item['mhs_photo'];
            $sheet->setCellValue('H' . $row, $photoUrl);
            $sheet->getCell('H' . $row)->getHyperlink()->setUrl($photoUrl);
            // Tambahkan data kolom lainnya sesuai kebutuhan

            $row++; // looping data dari database
            $no++; // looping untuk nomor urut data
        }

        // Menambahkan style  pada tabel
        $styleArray = [
            // menambahkan border
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
            // mengatur perataan teks
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_LEFT,
            ],
        ];

        $sheet->getStyle('A3:H' . ($row - 1))->applyFromArray($styleArray);


        // Membuat nama file dengan format yyyymmddhhmmss
        $timestamp = date('Ymd_His');
        $filename = 'data_mhs_' . $timestamp . '.xlsx';

        // Mengatur header HTTP untuk download file
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Menulis file ke output
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
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
