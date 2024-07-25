<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $primaryKey = 'id_buku';
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $table; // Properti untuk menyimpan nama tabel saat ini

    // `allowedFields` untuk masing-masing tabel
    protected $allowedFieldsBuku = [
        'kode_buku', 'sampul', 'judul_buku', 'pengarang', 'penerbit', 
        'tahun_terbit', 'kategori', 'no_rak', 'jumlah_buku'
    ];
    protected $allowedFieldsBukuRusak = [
        'kode_buku', 'judul_buku', 'pengarang', 'tanggal_pendataan', 
        'foto_bukti', 'keterangan'
    ];

    // Method untuk mengatur nama tabel dan allowed fields secara dinamis
    public function setTable($table)
    {
        $this->table = $table;
        if ($table === 'buku') {
            $this->allowedFields = $this->allowedFieldsBuku;
        } elseif ($table === 'buku_rusak') {
            $this->allowedFields = $this->allowedFieldsBukuRusak;
        }
    }

    public function search($keyword)
    {
        $this->setTable('buku');
        return $this->table($this->table)
                    ->like('kode_buku', $keyword)
                    ->orLike('judul_buku', $keyword)
                    ->orLike('kategori', $keyword)
                    ->findAll();
    }

    public function searching($keyword)
    {
        $this->setTable('buku_rusak');
        return $this->table($this->table)
                    ->like('kode_buku', $keyword)
                    ->orLike('judul_buku', $keyword)
                    ->orLike('keterangan', $keyword)
                    ->findAll();
    }

    // BUKU LAYAK
    public function getBuku()
    {
        $this->setTable('buku');
        return $this->table($this->table)
                    ->select('*')
                    ->get()
                    ->getResultArray();
    }

    public function createBuku($data)
    {
        $this->setTable('buku');
        return $this->insert($data);
    }

    public function updateBuku($data, $id)
    {
        $this->setTable('buku');
        return $this->update($id, $data);
    }

    public function deleteBuku($id)
    {
        $this->setTable('buku');
        return $this->delete($id);
    }

    // public function decreaseStock($kode_buku)
    // {
    //     $this->setTable('buku');
    //     return $this->where('kode_buku', $kode_buku)
    //                 ->set('jumlah_buku', 'jumlah_buku - 1', false)
    //                 ->update();
    // }

    // public function increaseStock($kode_buku)
    // {
    //     $this->setTable('buku');
    //     return $this->where('kode_buku', $kode_buku)
    //                 ->set('jumlah_buku', 'jumlah_buku + 1', false)
    //                 ->update();
    // }

    public function printBuku()
    {
        $this->setTable('buku');
        return $this->findAll();
    }

    // BUKU RUSAK
    public function getBukuRusak()
    {
    $this->setTable('buku_rusak');
    return $this->table($this->table)
                ->select('*')
                ->get()
                ->getResultArray();
    }

    public function createBkr($data)
    {
        $this->setTable('buku_rusak');
        return $this->insert($data);
    }

    public function updateBkr($data, $id)
    {
        $this->setTable('buku_rusak');
        return $this->update($id, $data);
    }

    public function deleteBkr($id)
    {
        $this->setTable('buku_rusak');
        return $this->delete($id);
    }
    
    public function printBkr()
    {
        $this->setTable('buku_rusak');
        return $this->findAll();
    }
}
