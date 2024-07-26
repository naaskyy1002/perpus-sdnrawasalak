<?php

namespace App\Controllers;
use App\Models\VisitorModel;
use App\Models\SiswaModel;

class Visitor extends BaseController
{
    protected $visitorModel;

    //menginisialisasi beberapa dependensi dan layanan yang diperlukan oleh kelas,
    public function __construct()
    {
        $this->visitorModel = new VisitorModel();
    }

    public function index()
    {
        $today = date('Y-m-d');
        $visitors = $this->visitorModel->getVisitorsByDate($today);
        
        $data = [
            'title' => 'Daftar Pengunjung',
            'visitors' => $visitors
        ];

        return view('admin/kunjungan/daftar_pengunjung', $data);
    }


    public function addVisitor()
    {
        if ($this->request->getMethod() == 'post') {
            $data = [
                'nisn' => $this->request->getPost('nisn'),
                'nama' => $this->request->getPost('nama'),
                'kelas' => $this->request->getPost('kelas'),
                'visit' => date('Y-m-d'),
            ];

            $this->visitorModel->insert($data);
            return redirect()->to('/admin/pengunjung')->with('message', 'Visitor added successfully.');
        }
    }

    public function getSiswaByNISN($nisn)
{
    $siswaModel = new SiswaModel();
    $siswa = $siswaModel->where('nisn', $nisn)->first();

    if ($siswa) {
        return $this->response->setJSON([
            'nama' => $siswa['username'], // Asumsi username adalah nama
            'kelas' => $siswa['kelas']
        ]);
    } else {
        return $this->response->setJSON(null);
    }
}

}
