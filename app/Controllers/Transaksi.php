<?php

namespace App\Controllers;
use App\Models\TransaksiModel;
use App\Models\BukuModel;
use App\Models\SiswaModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class Transaksi extends BaseController
{
    protected $transaksiModel;
    protected $bukuModel;
    protected $siswaModel;

    //menginisialisasi beberapa dependensi dan layanan yang diperlukan oleh kelas,
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

        $this->bukuModel->setTable('buku');
        // Cek apakah kode buku ada di database
        $buku = $this->bukuModel->where('kode_buku', $kode)->first();
        if (!$buku) {
            session()->setFlashdata('errors', 'Kode buku tidak ditemukan.');
            return redirect()->back()->withInput(); // Menjaga inputan form
        }

        // cek stok buku
        if ($buku['jumlah_buku'] == 0) {
            session()->setFlashdata('errors', 'Stok buku habis.');
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

    public function printPinjam()
    {
        $pinjam = $this->transaksiModel->getPeminjaman();
    
        $data = [
            'title' => 'Transaksi Peminjaman',
            'peminjaman' => $pinjam,
            'isi' => 'peminjaman',
        ];
        return view('admin/transaksi/printPinjam', $data);
    }

    public function excelPinjam()
    {
        $data = $this->transaksiModel->getPeminjaman();

        // Membuat instance spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
    
        // Menulis judul tabel
        $sheet->setCellValue('A1', 'Data Peminjaman');
        $sheet->mergeCells('A1:F1'); // Merge cells dari A1 sampai G1
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER); // Center align
        $sheet->getStyle('A1')->getFont()->setBold(true); // Buat teks judul tebal
    
        // Menulis header kolom
        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'Kode Buku');
        $sheet->setCellValue('C3', 'Judul Buku');
        $sheet->setCellValue('D3', 'Pengarang');
        $sheet->setCellValue('E3', 'Nama Peminjam');
        $sheet->setCellValue('F3', 'Tanggal Pinjaman');
    
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
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ];
    
        $sheet->getStyle('A3:F3')->applyFromArray($headerStyleArray);
    
        // Menulis data ke dalam spreadsheet
        $row = 4; // Mulai dari baris kedua setelah header
        $no = 1;
    
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $no);
            $sheet->setCellValue('B' . $row, $item['kode_buku']);
            $sheet->setCellValue('C' . $row, $item['judul_buku']);
            $sheet->setCellValue('D' . $row, $item['pengarang']);
            $sheet->setCellValue('E' . $row, $item['username']);
            
            // Mengubah format tanggal menjadi d-m-y
            $formattedDate = date('d-m-Y', strtotime($item['tgl_pinjam']));
            $sheet->setCellValue('F' . $row, $formattedDate);
        
            $row++; // looping data dari database
            $no++; // looping untuk nomor urut data
        }
        
    
        // Menambahkan style pada tabel
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
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ];
    
        $sheet->getStyle('A3:F' . ($row - 1))->applyFromArray($styleArray);
    
        // Menyesuaikan lebar kolom secara otomatis
        foreach (range('A', 'F') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }
    
        // Membuat nama file dengan format yyyymmddhhmmss
        $timestamp = date('Ymd_His');
        $filename = 'data_peminjaman_' . $timestamp . '.xlsx';
    
        // Mengatur header HTTP untuk download file
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
    
        // Menulis file ke output
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }

    // PEMINJAMAN
    public function peminjaman()
    {
        $pinjam = $this->transaksiModel->getPeminjaman();
        $data = [
            'title' => 'Transaksi Peminjaman',
            'peminjaman' => $pinjam,
            'isi' => 'peminjaman',
        ];
        return view('admin/transaksi/peminjaman', $data);
    }

    public function pengembalian()
    {
        // $kembali = $this->transaksiModel->getPeminjaman();
        $kembali = $this->transaksiModel->getPengembalian();
        $data = [
          'title' => 'Transaksi Pengembalian',
          'pengembalian' => $kembali,
          'isi' => 'pengembalian',
        ];
        return view('admin/transaksi/pengembalian', $data);
    }
    

    public function selesai()
    {
        $id = $this->request->getPost('id_transaksi');
        $data = [
            'tgl_kembali' => date('Y-m-d')
        ];
        $this->transaksiModel->selesai($id, $data);
        return redirect()->to(base_url('admin/pengembalian'));
    }


    public function deleteTransaksi()
    {
        $id = $this->request->getPost('id_transaksi');
    
        // Cek apakah id_transaksi ada di database
        $transaksi = $this->transaksiModel->find($id);
        if (!$transaksi) {
            return redirect()->to('/admin/peminjaman')->with('errors', 'ID Transaksi tidak ditemukan.');
        }
    
        $this->bukuModel->setTable('buku');
        // Ambil kode_buku dari transaksi yang akan dihapus
        $kode_buku = $transaksi['kode_buku'];
    
        // Tambah stok buku sebelum menghapus transaksi
        $this->bukuModel->where('kode_buku', $kode_buku)->set('jumlah_buku', 'jumlah_buku+1', false)->update();
    
        // Hapus transaksi
        $deleted = $this->transaksiModel->deleteTransaksi($id);
    
        if ($deleted) {
            return redirect()->to('/admin/peminjaman')->with('message', 'Transaksi berhasil dihapus.');
        } else {
            return redirect()->to('/admin/peminjaman')->with('errors', 'Gagal menghapus transaksi.');
        }
    }
    
    public function deleteTransaksiKB()
    {
        $id = $this->request->getPost('id_transaksi');
        
        // Cek apakah id_transaksi ada di database
        $transaksi = $this->transaksiModel->find($id);
        if (!$transaksi) {
            return redirect()->to('/admin/pengembalian')->with('errors', 'ID Transaksi tidak ditemukan.');
        }
        
        // Hapus transaksi
        $deleted = $this->transaksiModel->deleteTransaksi($id);
        
        if ($deleted) {
            return redirect()->to('/admin/pengembalian')->with('message', 'Transaksi berhasil dihapus.');
        } else {
            return redirect()->to('/admin/pengembalian')->with('errors', 'Gagal menghapus transaksi.');
        }
    }

    public function printKembali()
    {
        // $kembali = $this->transaksiModel->getPeminjaman();
        $kembali = $this->transaksiModel->getPengembalian();
        $data = [
            'title' => 'Transaksi Peminjaman',
            'peminjaman' => $kembali,
            'isi' => 'peminjaman',
        ];
        return view('admin/transaksi/printKembali', $data);
    }

    public function excelKembali()
    {
        $data = $this->transaksiModel->getPengembalian();

        // Membuat instance spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
    
        // Menulis judul tabel
        $sheet->setCellValue('A1', 'Data Pengembalian');
        $sheet->mergeCells('A1:G1'); // Merge cells dari A1 sampai G1
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER); // Center align
        $sheet->getStyle('A1')->getFont()->setBold(true); // Buat teks judul tebal
    
        // Menulis header kolom
        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'Kode Buku');
        $sheet->setCellValue('C3', 'Judul Buku');
        $sheet->setCellValue('D3', 'Pengarang');
        $sheet->setCellValue('E3', 'Nama Peminjam');
        $sheet->setCellValue('F3', 'Tanggal Pinjaman');
        $sheet->setCellValue('G3', 'Tanggal Pengembalian');
    
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
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ];
    
        $sheet->getStyle('A3:G3')->applyFromArray($headerStyleArray);
    
        // Menulis data ke dalam spreadsheet
        $row = 4; // Mulai dari baris kedua setelah header
        $no = 1;
    
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $no);
            $sheet->setCellValue('B' . $row, $item['kode_buku']);
            $sheet->setCellValue('C' . $row, $item['judul_buku']);
            $sheet->setCellValue('D' . $row, $item['pengarang']);
            $sheet->setCellValue('E' . $row, $item['username']);
            
            // Mengubah format tanggal menjadi d-m-y
            $formattedDate = date('d-m-Y', strtotime($item['tgl_pinjam']));
            $sheet->setCellValue('F' . $row, $formattedDate);
            $formattedDate = date('d-m-Y', strtotime($item['tgl_kembali']));
            $sheet->setCellValue('G' . $row, $formattedDate);
        
            $row++; // looping data dari database
            $no++; // looping untuk nomor urut data
        }
        
    
        // Menambahkan style pada tabel
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
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ];
    
        $sheet->getStyle('A3:G' . ($row - 1))->applyFromArray($styleArray);
    
        // Menyesuaikan lebar kolom secara otomatis
        foreach (range('A', 'G') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }
    
        // Membuat nama file dengan format yyyymmddhhmmss
        $timestamp = date('Ymd_His');
        $filename = 'data_pengembalian_' . $timestamp . '.xlsx';
    
        // Mengatur header HTTP untuk download file
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
    
        // Menulis file ke output
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
}
