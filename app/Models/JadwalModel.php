<?php

namespace App\Models;
use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table = "jadwal_kunjungan";
    protected $primaryKey = 'id_jk';
    protected $allowedFields = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'];

    public function updateJadwal($data, $id)
    {
        return $this->update($id, $data);
    }
}
