<?php

namespace App\Models;
use CodeIgniter\Model;

class LoginModel extends Model
{
    // Tabel untuk admin dan operator
    protected $tableAdmin = 'admin'; // Tabel admin
    protected $primaryKeyAdmin = 'nip';
    protected $allowedFieldsAdmin = ['username', 'password', 'level', 'nama_lengkap'];

    // Tabel untuk siswa
    protected $tableSiswa = 'siswa'; // Tabel siswa
    protected $primaryKeySiswa = 'nisn';
    protected $allowedFieldsSiswa = ['username', 'password', 'role', 'nama_lengkap'];
    
    public function getAdmin($username)
    {
        return $this->db->table($this->tableAdmin)
                        ->where(array('username' => $username))
                        ->get()->getRowArray();
    }

    public function getSiswa($username)
    {
        return $this->db->table($this->tableSiswa)
                        ->where(array('username' => $username))
                        ->get()->getRowArray();
    }
}
