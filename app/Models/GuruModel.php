<?php

namespace App\Models;
use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table ="guru";
    protected $primaryKey = 'id';
    protected $allowedFields = ['nip','nama_lengkap', 'jabatan', 'dob', 'alamat', 'telp', 'email', 'foto'];

    public function setTable($table)
    {
        $this->table = $table;
    }

    public function createGuru($data)
    {
        return $this->db->table('guru')
                        ->insert($data);
    }

    public function updateGuru($data, $id)
    {
        return $this->db->table('guru')
                        ->update($data, array('nip' => $id));
    }

    public function deleteGuru($id)
    {
        return $this->db->table('guru')
                        ->delete(array('nip' => $id));
    }

    public function getGuru()
    {
        return $this->db->table('guru')
                        ->select('*')
                        ->get()->getResultArray();
    }

}
