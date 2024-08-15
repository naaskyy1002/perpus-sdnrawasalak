<?php

namespace App\Controllers;
use App\Models\SaprasModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class Sapras extends BaseController
{
    protected $saprasModel;

    //menginisialisasi beberapa dependensi dan layanan yang diperlukan oleh kelas,
    public function __construct()
    {
        $this->saprasModel = new SaprasModel();
    }

    public function sarana_prasarana()
    {
        $sapras = $this->saprasModel->getSapras();
        $data = [
            'title' => 'Data Sarana Prasarana',
            'sapras' => $sapras,
        ];

        return view('admin/sapras/sarana_prasarana', $data);
    }


    public function printSapras()
    {
        $sapras = $this->saprasModel->getSapras();
    
        $data = [
            'title' => 'Daftar Sarana Prasarana',
            'sapras' => $sapras,
        ];
        return view('admin/sapras/printSapras', $data);
    }
    

    public function excelSapras()
    {
        $data = $this->saprasModel->getSapras();

        // Membuat instance spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menulis judul tabel
        $sheet->setCellValue('A1', 'Data Sarana Prasarana');
        $sheet->mergeCells('A1:F1'); // Merge cells dari A1 sampai J1
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER); // Center align
        $sheet->getStyle('A1')->getFont()->setBold(true); // Buat teks judul tebal

        // Menulis header kolom
        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'Kode Barang');
        $sheet->setCellValue('C3', 'Nama Barang');
        $sheet->setCellValue('D3', 'Tanggal Masuk');
        $sheet->setCellValue('E3', 'Kondisi Barang');
        $sheet->setCellValue('F3', 'Nama Peminjam');
        

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

        // Mendapatkan base_url dari konfigurasi
        $baseUrl = base_url() . 'sapras/';

        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $no);
            $sheet->setCellValue('B' . $row, $item['kode_barang']);
            $sheet->setCellValue('C' . $row, $item['nama_barang']);
            $sheet->setCellValue('D' . $row, $item['tanggal_masuk']);
            $sheet->setCellValue('E' . $row, $item['kondisi_barang']);
            $sheet->setCellValue('F' . $row, $item['nama_peminjam']);

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
        $filename = 'data_sarana_prasarana' . $timestamp . '.xlsx';

        // Mengatur header HTTP untuk download file
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Menulis file ke output
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }

    public function addSapras() 
    {
        // Ambil data dari request
        $kode_barang        = $this->request->getPost('a_kodebarang');
        $nama_barang        = $this->request->getPost('a_namabarang');
        $tanggal_masuk      = $this->request->getPost('a_tanggalmasuk');
        $kondisi_barang     = $this->request->getPost('a_kondisibarang');
        $nama_peminjam      = $this->request->getPost('a_namapeminjam');

        // Data untuk disimpan ke database
        $data = [
            'kode_barang'        => $kode_barang,
            'nama_barang'        => $nama_barang,
            'tanggal_masuk'      => $tanggal_masuk,
            'kondisi_barang'     => $kondisi_barang,
            'nama_peminjam'      => $nama_peminjam,
        ];

        // Simpan data menggunakan model
        $this->saprasModel->createSapras($data);

        // Redirect dengan pesan sukses
        return redirect()->to('/admin/sapras')->with('message', 'Data berhasil ditambahkan!');
    }

    public function editSapras()
    {
        // Ambil data dari form
        $id                 = $this->request->getPost('e_id');
        $kode_barang        = $this->request->getPost('e_kodebarang');
        $nama_barang        = $this->request->getPost('e_namabarang');
        $tanggal_masuk      = $this->request->getPost('e_tanggalmasuk');
        $kondisi_barang     = $this->request->getPost('e_kondisibarang');
        $nama_peminjam      = $this->request->getPost('e_namapeminjam');

        // Data untuk disimpan ke database
        $data = [
            'kode_barang'       => $kode_barang,
            'nama_barang'       => $nama_barang,
            'tanggal_masuk'     => $tanggal_masuk,
            'kondisi_barang'    => $kondisi_barang,
            'nama_peminjam'     => $nama_peminjam,
        ];

        // Update data buku di database
        $this->saprasModel->updateSapras($data, $id);

        // Redirect dengan pesan sukses
        return redirect()->to('/admin/sapras')->with('message', 'Data berhasil diubah!');
    }

    public function deleteSapras()
    {
        $id = $this->request->getPost('id');
        $sapras = $this->saprasModel->find($id);

        // Pastikan data ditemukan
        if ($sapras) {
            // Hapus data dari database
            $success = $this->saprasModel->deleteSapras($id);

            if ($success) {
                session()->setFlashdata('message', 'Data berhasil dihapus!');
            } else {
                session()->setFlashdata('errors', 'Gagal menghapus data.');
            }
        } else {
            session()->setFlashdata('errors', 'Data tidak ditemukan.');
        }

        return redirect()->to('/admin/sapras');
    }


}