<?php

namespace App\Models;
use CodeIgniter\Model;

class VisitorModel extends Model
{
    protected $table = 'pengunjung';
    protected $primaryKey = 'id_pengunjung';
    protected $allowedFields = ['nisn', 'nama', 'kelas', 'visit_date'];

    public function getVisitorsByDate($date)
    {
        return $this->where('visit_date', $date)->findAll();
    }
}
