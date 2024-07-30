<?php

namespace App\Models;
use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table ="admin";
    protected $primaryKey = 'id';
    protected $allowedFields = ['nip', 'username', 'password', 'nama_lengkap', 'jabatan'];

    public function setTable($table)
    {
        $this->table = $table;
    }

    public function totalBuku()
    {
        $result = $this->db->table('buku')
                           ->selectSum('jumlah_buku')
                           ->get()
                           ->getRow();
        return $result->jumlah_buku;
    }

    public function totalBkr()
    {
        return $this->db->table('buku_rusak')
                        ->countAll();
    }

    public function totalPinjam()
    {
        return $this->db->table('transaksi')
                        ->where('tgl_pinjam IS NOT NULL')
                        ->where('tgl_kembali IS NULL')
                        ->countAllResults();  //Menghitung jumlah baris dalam tabel berdasarkan kondisi atau filter yang diterapkan.
    }
    
    public function totalKembali()
    {
        return $this->db->table('transaksi')
                        ->where('tgl_kembali IS NOT NULL')
                        ->countAllResults();  //Menghitung jumlah baris dalam tabel berdasarkan kondisi atau filter yang diterapkan.
    }
    
    public function getAdmin()
    {
        return $this->db->table('admin')
                        ->select('*')
                        ->get()->getResultArray();
    }
    
    
    public function createAdmin($data)
    {
        return $this->db->table('admin')
                        ->insert($data);
    }

    public function updateAdmin($data, $id)
    {
        return $this->db->table('admin')
                        ->update($data, array('nip' => $id));
    }

    public function deleteAdmin($id)
    {
        return $this->db->table('admin')
                        ->delete(array('nip' => $id));
    }

}
