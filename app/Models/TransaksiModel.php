<?php

namespace App\Models;
use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table ="transaksi";
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['kode_buku', 'nisn', 'tgl_pinjam', 'tgl_kembali'];

    public function search($keyword)
    {
        return $this->table('transaksi')
                    ->like('kode_buku', $keyword)
                    ->orLike('nisn', $keyword);
                    // ->orLike('username', $keyword)
                    // ->orLike('judul_buku', $keyword);
    }

    public function createTransaksi($data)
    {
        return $this->db->table('transaksi')
                        ->insert($data);
    }

    public function getPeminjaman()
    {
        return $this->db->table('transaksi')
                        ->join('buku', 'buku.kode_buku=transaksi.kode_buku')
                        ->join('siswa', 'siswa.nisn=transaksi.nisn')
                        ->where('transaksi.tgl_kembali', NULL )              //mengambil data yang belum dikembalikan
                        ->get()->getResultArray();
    }

    public function getPengembalian()
    {
        return $this->db->table('transaksi')
                        ->join('buku', 'buku.kode_buku=transaksi.kode_buku')
                        ->join('siswa', 'siswa.nisn=transaksi.nisn')
                        ->where('transaksi.tgl_kembali !=', NULL )            //mengambil data yang sudah dikembalikan
                        ->get()->getResultArray();
    }

    public function selesai($id, $tgl_kembali)
    {
        $this->update($id, ['status' => 'kembali', 'tgl_kembali' => $tgl_kembali]);
    }

    public function deleteTransaksi($id)
    {
        return $this->db->table('transaksi')
                        ->delete(array('id_transaksi' => $id));
    } 
}