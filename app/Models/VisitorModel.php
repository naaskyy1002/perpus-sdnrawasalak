<?php

namespace App\Models;
use CodeIgniter\Model;

class VisitorModel extends Model
{
    protected $table = 'pengunjung';
    protected $primaryKey = 'id_pengunjung';
    protected $allowedFields = ['nisn', 'nama', 'kelas', 'visit'];

    public function getVisitorsByDate($date)
    {
        return $this->where('visit', $date)->findAll();
    }

    public function addVisitor($data)
    {
        return $this->insert($data);
    }
}
