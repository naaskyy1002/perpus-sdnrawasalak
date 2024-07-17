<?php

namespace App\Models;
use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table ="transaksi";
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['kode_buku', 'nisn', 'judul_buku', 'pengarang', 'username'];

    public function search($keyword)
    {
        return $this->table('transaksi')->like('kode_buku', $keyword)
                                        ->orLike('nisn', $keyword);
    }

    public function getPeminjaman()
    {
        return $this->db->table('transaksi')
                        ->join('buku', 'buku.kode_buku=transaksi.kode_buku')
                        ->join('siswa', 'siswa.nisn=transaksi.nisn')
                        ->get()->getResultArray();
    }
}