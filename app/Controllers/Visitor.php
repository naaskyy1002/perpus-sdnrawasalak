<?php

namespace App\Controllers;
use App\Models\VisitorModel;

class Visitor extends BaseController
{
    protected $visitorModel;

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
                'visit_date' => date('Y-m-d'),
            ];

            $this->visitorModel->insert($data);
            return redirect()->to('/admin/pengunjung')->with('message', 'Visitor added successfully.');
        }
    }
}
