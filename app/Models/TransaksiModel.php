<?php

namespace App\Models;
use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi'; // Menetapkan nama tabel
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['kode_buku', 'nisn', 'tgl_pinjam', 'tgl_kembali'];

    public function search($keyword)
    {
        return $this->select('transaksi.*, buku.judul_buku, buku.pengarang, siswa.username')
                    ->join('buku', 'buku.kode_buku = transaksi.kode_buku')
                    ->join('siswa', 'siswa.nisn = transaksi.nisn')
                    ->like('buku.judul_buku', $keyword)
                    ->orLike('buku.kode_buku', $keyword)
                    ->orLike('siswa.username', $keyword)
                    ->findAll(); // Ganti getResultArray() dengan findAll()
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
        return $this->insert($data);
    }

    // mengambil transaksi peminjaman
    public function getPeminjaman()
    {
        return $this->db->table('transaksi')
                    ->join('buku', 'buku.kode_buku = transaksi.kode_buku')
                    ->join('siswa', 'siswa.nisn = transaksi.nisn')
                    ->where('transaksi.tgl_kembali', NULL) // Mengambil data yang belum dikembalikan
                    ->get()->getResultArray();
                    // ->findAll(); // Ganti getResultArray() dengan findAll()
    }
    
    // mengambil transaksi pengembalian 
    public function getPengembalian()
    {
        return $this->db->table('transaksi')
                    ->join('buku', 'buku.kode_buku = transaksi.kode_buku')
                    ->join('siswa', 'siswa.nisn = transaksi.nisn')
                    ->where('transaksi.tgl_kembali !=', NULL ) //mengambil data yang sudah dikembalikan
                    ->get()->getResultarray();
                    // ->findAll(); // Ganti getResultArray() dengan findAll()
    }

    public function selesai($id, $tgl_kembali)
    {
        return $this->db->table('transaksi')
        ->where('id_transaksi', $id)
        ->update(['status' => 'kembali', 'tgl_kembali' => $tgl_kembali]);
    }

    public function updateTransaksi($id, $data)
    {
        return $this->update($id, $data);
    }

    // menghapus transaksi
    public function deleteTransaksi($id)
    {
        return $this->delete($id);
    }

    public function printPinjam()
    {
        return $this->findAll(); // Ganti getResultArray() dengan findAll()
    }

    public function printKembali()
    {
        return $this->findAll(); // Ganti getResultArray() dengan findAll()
    }
}
