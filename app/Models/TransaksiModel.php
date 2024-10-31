<?php

namespace App\Models;
use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = "transaksi"; // Menetapkan nama tabel
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['kode_buku', 'nisn', 'tgl_pinjam', 'tgl_kembali', 'status'];

    public function totalTransaksi()
    {
        return $this->db->table('transaksi')
                        ->countAll();
    }

    // mengambil data peminjaman yang belum dikembalikan
    public function getByPinjaman($nisn)
    {
        return $this->select('transaksi.*, buku.judul_buku, buku.pengarang, siswa.username')
                    ->join('buku', 'buku.kode_buku = transaksi.kode_buku')
                    ->join('siswa', 'siswa.nisn = transaksi.nisn')
                    ->where('transaksi.nisn', $nisn)
                    ->where('transaksi.tgl_kembali', NULL) 
                    ->findAll(); // Ganti getResultArray() dengan findAll()
    }

    // mengambil data peminjaman yang sudah dikembalikan
    public function getByRiwayat($nisn)
    {
        return $this->select('transaksi.*, buku.judul_buku, buku.pengarang, siswa.username')
                    ->join('buku', 'buku.kode_buku = transaksi.kode_buku')
                    ->join('siswa', 'siswa.nisn = transaksi.nisn')
                    ->where('transaksi.nisn', $nisn)
                    ->where('transaksi.tgl_kembali !=', NULL) 
                    ->findAll(); // Ganti getResultArray() dengan findAll()
    }
    
    // menambah transaksi pinjam
    public function createTransaksi($data)
    {
        $this->db->transStart();
    
        // Insert transaction data
        $this->db->table('transaksi')->insert($data);
    
        // Fetch current book stock
        $book_stock = $this->db->table('buku')
          ->select('jumlah_buku')
          ->where('kode_buku', $data['kode_buku'])
          ->get()
          ->getRowArray();
    
        // Check if the book stock is sufficient
        if ($book_stock['jumlah_buku'] <= 0) {
          $this->db->transRollback();
          return false;
        }
    
        // Update book stock
        $this->db->table('buku')
          ->set('jumlah_buku', 'jumlah_buku-1', FALSE)
          ->where('kode_buku', $data['kode_buku'])
          ->update();
    
        $this->db->transComplete();
    
        if ($this->db->transStatus() === FALSE) {
          return false;
        }
    
        return true;
    }

    // mengambil transaksi peminjaman
    public function getPeminjaman()
    {
        return $this->db->table('transaksi')
                    ->join('buku', 'buku.kode_buku = transaksi.kode_buku')
                    ->join('siswa', 'siswa.nisn = transaksi.nisn')
                    ->where('transaksi.tgl_kembali', NULL) // Mengambil data yang belum dikembalikan
                    ->get()->getResultArray();
    }
    
    // mengambil transaksi pengembalian 
    public function getPengembalian()
    {
        return $this->db->table('transaksi')
                    ->join('buku', 'buku.kode_buku = transaksi.kode_buku')
                    ->join('siswa', 'siswa.nisn = transaksi.nisn')
                    ->where('transaksi.tgl_kembali !=', NULL ) //mengambil data yang sudah dikembalikan
                    ->get()->getResultarray();
    }

    public function selesai($id, $tgl_kembali)
    {
        // jika buku sudah dikembalikan maka stok akan bertambah 1
        $this->db->transStart();
    
        // Update transaction data
        $this->db->table('transaksi')
          ->where('id_transaksi', $id)
          ->update(['tgl_kembali' => $tgl_kembali]);
    
        // Fetch the book code
        $book_code = $this->db->table('transaksi')
          ->select('kode_buku')
          ->where('id_transaksi', $id)
          ->get()
          ->getRowArray();
    
        // Update book stock
        $this->db->table('buku')
          ->set('jumlah_buku', 'jumlah_buku+1', FALSE)
          ->where('kode_buku', $book_code['kode_buku'])
          ->update();
    
        $this->db->transComplete();
    
        if ($this->db->transStatus() === FALSE) {
          return false;
        }
    
        return true;
    }

    
    // menghapus transaksi
    public function deleteTransaksi($id)
    {
        return $this->db->table('transaksi')
                        ->delete(array('id_transaksi' => $id));
                        
    }

    public function printPinjam()
    {
        return $this->findAll(); 
    }

    public function printKembali()
    {
        return $this->findAll(); 
    }
}
