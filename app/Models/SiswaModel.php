<?php

namespace App\Models;
use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = "siswa";
    protected $primaryKey = 'id';
    protected $allowedFields = ['nisn', 'username', 'password', 'jenis_kelamin', 'kelas', 'dob'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getUser()
    {
    }

    public function search($keyword)
    {
        return $this->table('siswa')
                    ->like('username', $keyword)
                    ->orLike('nisn', $keyword)
                    ->orLike('kelas', $keyword);
    }

    public function getSiswa()
    {
        return $this->table('siswa')
                    ->select('*')
                    ->get()
                    ->getResultArray();
    }

    public function createSiswa($data)
    {
        return $this->db->table('siswa')
                        ->insert($data); // Menggunakan metode insert bawaan Model
    }

    public function updateSiswa($data, $id)
    {
        return $this->db->table('siswa')
                        ->update($data, array('nisn' => $id));
    }

    public function deleteSiswa($id)
{
    return $this->db->table('siswa')
                    ->delete(array('nisn' => $id)); // Menggunakan metode delete dengan table
}

    public function getSiswaByNISN($username)
    {
        $result = $this->like('username', $username)->first();
        
        if ($result) {
            return [
                'id'    => $result['nisn'],
                'text'  => $result['username'] . ' - ' . $result['username'],
                'snama' => $result['username'],
                'skelas'  => $result['kelas'],
            ];
        }
        return [];
    }
}
