<?php

namespace App\Controllers;
use App\Models\VisitorModel;
use App\Models\SiswaModel;

class Visitor extends BaseController
{
    protected $visitorModel;
    protected $siswaModel;

    //menginisialisasi beberapa dependensi dan layanan yang diperlukan oleh kelas,
    public function __construct()
    {
        $this->visitorModel = new VisitorModel();
        $this->siswaModel = new SiswaModel();
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
        // dd($this->request->getPost());
        $data = [
            'nisn' => $this->request->getPost('s_nis'),
            'nama' => $this->request->getPost('s_nama'),
            'kelas' => $this->request->getPost('s_kelas'),
            'visit' => date('Y-m-d'),
        ];

        $this->visitorModel->addVisitor($data);
        return redirect()->to('/admin/daftarPengunjung')->with('message', 'Berhasil menambahkan pengunjung!');
    }

    public function getSiswaByNISN()
    {
        if($this->request->isAJAX()) {
            $searchTerm = $this->request->getGet('searchTerm');

            if ($searchTerm) {
                $siswa = $this->siswaModel->getSiswaByNISN($searchTerm);
                return $this->response->setJSON([$siswa]);
            } 
                return $this->response->setJSON([]);
        }
        return $this->response->setJSON(['error' => 'Not Found'])->setStatusCode(404);
    }
}
