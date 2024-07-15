<?php

namespace App\Models;
use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table ="admin";
    protected $primaryKey = 'id';
    protected $allowedFields = ['nip', 'username', 'password', 'nama_lengkap', 'jabatan'];
    protected $useTimestamps = true;
    protected $createdField ='created_at';
    protected $updatedField ='updated_at';

    public function setTable($table)
    {
        $this->table = $table;
    }

    public function createAdmin($data)
    {
        return $this->db->table('admin')
                        ->insert($data);
    }

    public function deleteAdmin($id)
    {
        return $this->db->table('admin')
                        ->delete(array('nip' => $id));
    }

}
