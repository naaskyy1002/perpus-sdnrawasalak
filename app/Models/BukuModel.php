<?php

namespace App\Models;
use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table;
    protected $primaryKey = 'id_buku';
    protected $useTimestamps = true;
    protected $createdField ='created_at';
    protected $updatedField ='updated_at';

    public function setTable($table)
    {
        $this->table = $table;
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

}
