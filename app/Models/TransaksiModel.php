<?php

namespace App\Models;
use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table ='transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['kode_buku', 'nisn', 'tgl_pinjam', 'tgl_kembali'];

    public function search($keyword)
    {
        return $this->table('transaksi')
            ->join('buku', 'buku.kode_buku = transaksi.kode_buku')
            ->join('siswa', 'siswa.nisn = transaksi.nisn')
            ->like('buku.judul_buku', $keyword)
            ->orLike('buku.kode_buku', $keyword)
            ->orLike('siswa.username', $keyword);
    }

    public function createTransaksi($data)
    {
        return $this->db->table('transaksi')
                        ->insert($data);
    }

    public function getPeminjaman()
    {
        return $this->db->table('transaksi')
                        ->select('transaksi.*, buku.judul_buku, buku.pengarang, siswa.username') // Menambahkan field yang dibutuhkan
                        ->join('buku', 'buku.kode_buku = transaksi.kode_buku')
                        ->join('siswa', 'siswa.nisn = transaksi.nisn')
                        ->where('transaksi.tgl_kembali', NULL) // Mengambil data yang belum dikembalikan
                        ->get()->getResultArray();
    }
    

    public function getPengembalian()
    {
        return $this->db->table('transaksi')
                        ->select('transaksi.*, buku.judul_buku, buku.pengarang, siswa.username') // Menambahkan field yang dibutuhkan
                        ->join('buku', 'buku.kode_buku = transaksi.kode_buku')
                        ->join('siswa', 'siswa.nisn = transaksi.nisn')
                        ->where('transaksi.tgl_kembali !=', NULL )            //mengambil data yang sudah dikembalikan
                        ->get()->getResultArray();
    }

    public function selesai($id, $tgl_kembali)
    {
        $this->update($id, ['status' => 'kembali', 'tgl_kembali' => $tgl_kembali]);
    }

    public function updateTransaksi($id, $data)
{
    return $this->table('transaksi')
                ->update($id,$data);
}


    public function deleteTransaksi($id)
    {
        return $this->table('transaksi') // Tambahkan ini untuk menentukan tabel
                    ->delete(array('id_transaksi' => $id));
    }

    public function printPinjam($data)
    {
        return $this->db->table('transaksi')
                        ->get()->getResultArray();
    }

    public function printKembali($data)
    {
        return $this->db->table('transaksi')
                        ->get()->getResultArray();
    }
}