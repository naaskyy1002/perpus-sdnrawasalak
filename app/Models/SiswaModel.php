<?php

namespace App\Models;
use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = "siswa";
    protected $primaryKey = "id";
    protected $allowedFields = ['nisn', 'username', 'password', 'jenis_kelamin', 'kelas'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

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

}
