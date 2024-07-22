<?php

namespace App\Models;
use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table ="buku";
    protected $primaryKey = 'id_buku';
    protected $allowedFields = ['kode_buku', 'sampul', 'judul_buku', 'pengarang', 'penerbit', 'tahun_terbit', 'kategori', 'no_rak', 'jumlah_buku'];
    protected $useTimestamps = true;
    protected $createdField ='created_at';
    protected $updatedField ='updated_at';

    public function setTable($table)
    {
        $this->table = $table;
    }

    public function search($keyword)
    {
        return $this->table('buku')
                    ->like('kode_buku', $keyword)
                    ->orLike('judul_buku', $keyword)
                    ->orLike('kategori', $keyword);
    }

    public function searching($keyword)
    {
        return $this->table('buku_rusak')->like('kode_buku', $keyword)
                                        ->orLike('judul_buku', $keyword)
                                        ->orLike('kategori', $keyword);
    }

    public function createBuku($data)
    {
        return $this->db->table('buku')
                        ->insert($data);
    }

    public function updateBuku($data, $id)
    {
        return $this->db->table('buku')
                        ->update($data, array('id_buku' => $id));
    }

    public function deleteBuku($id)
    {
        return $this->db->table('buku')
                        ->delete(array('id_buku' => $id));
    } 

    public function decreaseStock($kode_buku)
    {
        $this->where('kode_buku', $kode_buku)
             ->set('jumlah_buku', 'jumlah_buku - 1', false)
             ->update();
    }

    public function increaseStock($kode_buku)
    {
        $this->where('kode_buku', $kode_buku)
             ->set('jumlah_buku', 'jumlah_buku + 1', false)
             ->update();
    }

    public function printBuku($data)
    {
        return $this->db->table('buku')
                        ->get()->getResultArray();
    }


    // BUKU RUSAK
    public function createBkr($data)
    {
        return $this->db->table('buku_rusak')
                        ->insert($data);
    }

    public function updateBkr($data, $id)
    {
        return $this->db->table('buku_rusak')
                        ->update($data, array('id_buku' => $id));
    }

    public function deleteBkr($id)
    {
        return $this->db->table('buku_rusak')
                        ->delete(array('id_buku' => $id));
    }
    
    public function printBkr($data)
    {
        return $this->db->table('buku_rusak')
                        ->get()->getResultArray();
    }

}
