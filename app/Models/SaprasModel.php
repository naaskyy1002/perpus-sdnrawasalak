<?php

namespace App\Models;

use CodeIgniter\Model;

class SaprasModel extends Model
{
    protected $table = 'sapras';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // `allowedFields` untuk masing-masing tabel
    protected $allowedFieldsSapras = [
        'kode_barang', 'nama_barang', 'tanggal_masuk', 'kondisi_barang', 'nama_peminjam'
    ];

    public function getSapras()
    {
        return $this->table('sapras')
                    ->select('*')
                    ->get()
                    ->getResultArray();
    }

    public function createSapras($data)
    {
        return $this->db->table('sapras')
                        ->insert($data);
    }

    public function updateSapras($data, $id)
    {
        return $this->db->table('sapras')
                        ->where('id', $id)
                        ->update($data);
    }

    public function deleteSapras($id)
    {
        return $this->db->table('sapras')
                        ->delete(array('id' => $id));
    }

    public function printSapras()
    {
        return $this->db->table('sapras')
                        ->findAll();
    }
}
