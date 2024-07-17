<?php

namespace App\Controllers;
use App\Models\AdminModel;



class Admin extends BaseController
{
    protected $adminModel;
    

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    public function home()
    {
        $data =[
            'title' => 'Beranda | Perpustakaan SDN Rawasalak',
            'total_buku' => $this->adminModel->totalBuku(),
            'total_bkr' => $this->adminModel->totalBkr(),
            // 'total_pinjam' => $this->adminModel->totalPinjam(),
            // 'total_kembali' => $this->adminModel->totalKemabli(),
        ];

        return view('admin/body', $data);
    }

        public function daftar_pengunjung()
        {
            return view('admin/kunjungan/daftar_pengunjung');
        }

        public function jadwal_kunjungan()
        {
            return view('admin/kunjungan/jadwal_kunjungan');
        }

    // DATA ADMIN
    public function data_admin()
    {
        $currentPage = $this->request->getVar('page_admin') ? $this->request->getVar('page_admin') :
        1;

        $keyword = $this->request->getVar('keyword');
        if($keyword) {
            $admin = $this->adminModel->search($keyword);
        }else {
            $admin = $this->adminModel;
        }

        $admin = $this->adminModel->paginate(10, 'admin');
        $pager = $this->adminModel->pager;
        // $admin = $this->adminModel->findAll();
        $data = [
            'title' => 'Daftar Admin',
            'admin' => $admin,
            'pager' => $pager,
            'currentPage' => $currentPage,
        ];
        return view('admin/maindata/data_admin', $data);
    }

    public function addAdmin() 
    {
        $validation = $this->validate([
            'a_foto' => [
                'uploaded[a_foto]',
                'mime_in[a_foto,image/jpg,image/jpeg,image/png]',
                'max_size[a_foto,2048]', 
            ],
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()
                ->with('errors', 'Gagal menambahkan data admin. Silakan periksa input Anda.');
        }

        // Ambil data dari request
        $nip = $this->request->getPost('a_nip');
        $nama = $this->request->getPost('a_nama');
        $jabatan = $this->request->getPost('a_jabatan');
        $username = $this->request->getPost('a_username');
        $password = $this->request->getPost('a_password');

        // Proses upload foto
        $file = $this->request->getFile('a_foto');
        $fotoName = $nama . '.' . $file->getExtension();
        
        if (!$file->move('assets/img/admin', $fotoName)) {
            return redirect()->back()->withInput()
                ->with('errors', 'Upload foto gagal.');
        }

        // Data untuk disimpan ke database
        $data = [
            'nip' => $nip,
            'nama_lengkap' => $nama,
            'jabatan' => $jabatan,
            'foto' => $fotoName,
            'username' => $username,
            'password' => $password,
        ];

        // Simpan data menggunakan model
        $this->adminModel->createAdmin($data);

        return redirect()->to('/admin/dataAdmin')->with('message', 'Admin berhasil ditambahkan!');
    }

    public function editAdmin()
    {
        // Validasi input untuk foto bukti
        $validation = $this->validate([
            'e_foto' => [
                'uploaded[e_foto]',
                'mime_in[e_foto,image/jpg,image/jpeg,image/png]',
                'max_size[e_foto,2048]', 
            ],
        ]);

        // Ambil data dari form
        $id = $this->request->getPost('e_nip');
        $nip = $this->request->getPost('e_nip');
        $nama = $this->request->getPost('e_namalengkap');
        $jabatan = $this->request->getPost('e_jabatan');
        $username = $this->request->getPost('e_username');
        $password = $this->request->getPost('e_password');

        // Data untuk disimpan ke database
        $data = [
            'nip' => $nip,
            'nama_lengkap' => $nama,
            'jabatan' => $jabatan,
            'username' => $username,
            'password' => $password,
        ];

        if (!$validation) {
            // Tidak ada bukti yang diunggah atau validasi gagal, gunakan bukti lama
            $data['foto'] = $this->request->getPost('e_oldfoto');
        } else {
            // Validasi berhasil, hapus foto bukti lama jika ada
            $old_foto = $this->request->getPost('e_oldfoto');
            if ($old_foto && file_exists('assets/img/admin/' . $old_foto)) {
                unlink('assets/img/admin/' . $old_foto);
            }

            // Simpan foto bukti baru
            $foto = $this->request->getFile('e_foto');
            $fotoName = $nip . '.' . $foto->getExtension();
            $foto->move('assets/img/admin', $fotoName);
            $data['foto'] = $fotoName;
        }

        // Update data buku di database
        $this->adminModel->updateAdmin($data, $id);

        // Redirect dengan pesan sukses
        return redirect()->to('/admin/dataAdmin')->with('message', 'Data admin berhasil diubah!');
    }

    public function deleteAdmin()
    {
        // mencari admin berdasarkan nip dan dihapuskan
        $id = $this->request->getPost('nip');
        $admin = $this->adminModel->where('nip', $id)->first();
    
        // Pastikan buku ditemukan
        if ($admin) {
            $old_foto = $admin['foto']; // Ambil nama sampul buku
    
            // Hapus sampul buku dari folder jika file ada
            if (file_exists('assets/img/admin/' . $old_foto)) {
                unlink('assets/img/admin/' . $old_foto);
            }
    
            // Hapus data buku dari database
            $success = $this->adminModel->where('nip', $id)->delete();
    
            if ($success) {
                session()->setFlashdata('message', 'Admin berhasil dihapus!');
            } else {
                session()->setFlashdata('errors', 'Gagal menghapus admin.');
            }
        } else {
            session()->setFlashdata('errors', 'Admin tidak ditemukan.');
        }
    
        return redirect()->to('/admin/dataAdmin');
    }

    
        public function profil_admin()
        {
            return view('admin/profil_admin');
        }

        
                // public function data_guru()
                // {
                //     return view('admin/maindata/data_guru');
                // }
}