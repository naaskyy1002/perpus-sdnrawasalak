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

    public function totalPengunjungByMonth()
    {
        // Mendapatkan bulan dan tahun saat ini
        $currentMonth = date('m');
        $currentYear = date('Y');

        // Menghitung jumlah pengunjung yang memiliki tanggal 'visit' sesuai dengan bulan dan tahun saat ini
        return $this->db->table($this->table)
                        ->where('MONTH(visit)', $currentMonth)
                        ->where('YEAR(visit)', $currentYear)
                        ->countAllResults();
    }

    public function deleteOldVisitors()
    {
        // Mendapatkan tanggal satu tahun yang lalu dari hari ini
        $oneYearAgo = date('Y-m-d', strtotime('-1 year'));

        // Menghapus data pengunjung yang memiliki tanggal 'visit' lebih kecil dari satu tahun lalu
        return $this->where('visit <', $oneYearAgo)->delete();
    }

    public function getMonthlyVisitorsThisYear()
    {
        $currentYear = date('Y');
        $result = [];
    
        for ($month = 1; $month <= 12; $month++) {
            // Menghitung jumlah pengunjung untuk setiap bulan di tahun berjalan
            $visitorCount = $this->db->table($this->table)
                ->where('MONTH(visit)', $month)
                ->where('YEAR(visit)', $currentYear)
                ->countAllResults();
    
            // Memasukkan hasil ke array
            $result[] = [
                'month' => date('F', mktime(0, 0, 0, $month, 10)), // Nama bulan
                'count' => $visitorCount
            ];
        }
    
        return $result;
    }
    


}
