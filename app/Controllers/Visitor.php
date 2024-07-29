<?php

namespace App\Controllers;
use App\Models\VisitorModel;
use App\Models\SiswaModel;

class Visitor extends BaseController
{
    protected $visitorModel;
    protected $siswaModel;

    public function __construct()
    {
        $this->visitorModel = new VisitorModel();
        $this->siswaModel = new SiswaModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_visitor') ? $this->request->getVar('page_visitor') : 1;
        $keyword = $this->request->getVar('keyword');

        // Memperbaiki pencarian berdasarkan keyword
        if ($keyword) {
            $visitors = $this->visitorModel->search($keyword);
        } else {
            $visitors = $this->visitorModel->paginate(10, 'visitor');
        }

        $pager = $this->visitorModel->pager;
        $today = date('Y-m-d');
        
        $data = [
            'title' => 'Daftar Pengunjung',
            'visitors' => $visitors,
            'pager' => $pager,
            'currentPage' => $currentPage,
        ];

        return view('admin/kunjungan/daftar_pengunjung', $data);
    }

    public function addVisitor()
    {
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
