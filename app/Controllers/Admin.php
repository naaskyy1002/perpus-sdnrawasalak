<?php

namespace App\Controllers;
use App\Models\AdminModel;
use App\Models\GuruModel;
use App\Models\TransaksiModel;



class Admin extends BaseController
{
    protected $adminModel;
    protected $guruModel;
    protected $transaksiModel;
    

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        $this->guruModel = new GuruModel();
        $this->transaksiModel = new TransaksiModel();
    }

    public function home()
    {
        $currentPage = $this->request->getVar('page_transaksi') ? $this->request->getVar('page_transaksi') :
        1;

        $keyword = $this->request->getVar('keyword');
        if($keyword) {
            $pinjam = $this->transaksiModel->search($keyword);
        }else {
            $pinjam = $this->transaksiModel;
        }

        $pinjam = $this->transaksiModel->paginate(10, 'transaksi');
        $pager = $this->transaksiModel->pager;
        $pinjam = $this->transaksiModel->getPeminjaman();
        $data =[
            'title' => 'Beranda | Perpustakaan SDN Rawasalak',
            'peminjaman' => $pinjam,
            // 'search' => $pinjams,
            'isi' => 'peminjaman',
            'pager' => $pager,
            'currentPage' => $currentPage,
            'total_buku' => $this->adminModel->totalBuku(),
            'total_bkr' => $this->adminModel->totalBkr(),
            'total_pinjam' => $this->adminModel->totalPinjam(),
            'total_kembali' => $this->adminModel->totalKembali(),
        ];

        return view('admin/body', $data);
    }

        public function daftar_pengunjung()
        {
            return view('admin/kunjungan/daftar_pengunjung');
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

    public function profil_admin()
    {
    $username = $this->session->get('username');
    $profil = $this->adminModel->getAdmin();
    $data = [
        'title' => 'PROFIL SAYA',
        'profil' => $profil,
    ];
    return view('admin/profil_admin', $data);
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
        $dob = $this->request->getPost('a_dob');
        $alamat = $this->request->getPost('a_alamat');
        $telepon = $this->request->getPost('a_telepon');
        $email = $this->request->getPost('a_email');
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
            'dob' => $dob,
            'alamat' => $alamat,
            'telp' => $telepon,
            'email' => $email,
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
        $dob = $this->request->getPost('e_dob');
        $alamat = $this->request->getPost('e_alamat');
        $telepon = $this->request->getPost('e_telepon');
        $email = $this->request->getPost('e_email');
        $jabatan = $this->request->getPost('e_jabatan');
        $username = $this->request->getPost('e_username');
        $password = $this->request->getPost('e_password');

        // Data untuk disimpan ke database
        $data = [
            'nip' => $nip,
            'nama_lengkap' => $nama,
            'dob' => $dob,
            'alamat' => $alamat,
            'telp' => $telepon,
            'email' => $email,
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
    

    public function data_guru()
    {
        $currentPage = $this->request->getVar('page_guru') ? $this->request->getVar('page_guru') :
        1;

        $keyword = $this->request->getVar('keyword');
        if($keyword) {
            $guru = $this->guruModel->search($keyword);
        }else {
            $guru = $this->guruModel;
        }

        $guru = $this->guruModel->paginate(10, 'guru');
        $pager = $this->guruModel->pager;
        // $admin = $this->adminModel->findAll();
        $data = [
            'title' => 'Daftar Guru',
            'guru' => $guru,
            'pager' => $pager,
            'currentPage' => $currentPage,
        ];
        return view('admin/maindata/data_guru', $data);
    }
    
    public function addGuru() 
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
                ->with('errors', 'Gagal menambahkan data guru. Silakan periksa input Anda.');
        }

        // Ambil data dari request
        $nip = $this->request->getPost('a_nip');
        $nama = $this->request->getPost('a_nama');
        $dob = $this->request->getPost('a_dob');
        $alamat = $this->request->getPost('a_alamat');
        $telepon = $this->request->getPost('a_telepon');
        $email = $this->request->getPost('a_email');
        $jabatan = $this->request->getPost('a_jabatan');
        $username = $this->request->getPost('a_username');
        $password = $this->request->getPost('a_password');

        // Proses upload foto
        $file = $this->request->getFile('a_foto');
        $fotoName = $nama . '.' . $file->getExtension();
        
        if (!$file->move('assets/img/guru', $fotoName)) {
            return redirect()->back()->withInput()
                ->with('errors', 'Upload foto gagal.');
        }

        // Data untuk disimpan ke database
        $data = [
            'nip' => $nip,
            'nama_lengkap' => $nama,
            'dob' => $dob,
            'alamat' => $alamat,
            'telp' => $telepon,
            'email' => $email,
            'jabatan' => $jabatan,
            'foto' => $fotoName,
            'username' => $username,
            'password' => $password,
        ];

        // Simpan data menggunakan model
        $this->guruModel->createGuru($data);

        return redirect()->to('/admin/dataGuru')->with('message', 'Guru berhasil ditambahkan!');
    }

    public function editGuru()
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
        $dob = $this->request->getPost('e_dob');
        $alamat = $this->request->getPost('e_alamat');
        $telepon = $this->request->getPost('e_telepon');
        $email = $this->request->getPost('e_email');
        $jabatan = $this->request->getPost('e_jabatan');
        $username = $this->request->getPost('e_username');
        $password = $this->request->getPost('e_password');

        // Data untuk disimpan ke database
        $data = [
            'nip' => $nip,
            'nama_lengkap' => $nama,
            'dob' => $dob,
            'alamat' => $alamat,
            'telp' => $telepon,
            'email' => $email,
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
            if ($old_foto && file_exists('assets/img/guru/' . $old_foto)) {
                unlink('assets/img/guru/' . $old_foto);
            }

            // Simpan foto bukti baru
            $foto = $this->request->getFile('e_foto');
            $fotoName = $nip . '.' . $foto->getExtension();
            $foto->move('assets/img/guru', $fotoName);
            $data['foto'] = $fotoName;
        }

        // Update data buku di database
        $this->guruModel->updateGuru($data, $id);

        // Redirect dengan pesan sukses
        return redirect()->to('/admin/dataGuru')->with('message', 'Data guru berhasil diubah!');
    }

    public function deleteGuru()
    {
        // mencari admin berdasarkan nip dan dihapuskan
        $id = $this->request->getPost('nip');
        $guru = $this->guruModel->where('nip', $id)->first();
    
        // Pastikan buku ditemukan
        if ($guru) {
            $old_foto = $guru['foto']; // Ambil nama sampul buku
    
            // Hapus sampul buku dari folder jika file ada
            if (file_exists('assets/img/guru/' . $old_foto)) {
                unlink('assets/img/guru/' . $old_foto);
            }
    
            // Hapus data buku dari database
            $success = $this->gurunModel->where('nip', $id)->delete();
    
            if ($success) {
                session()->setFlashdata('message', 'Guru berhasil dihapus!');
            } else {
                session()->setFlashdata('errors', 'Gagal menghapus guru.');
            }
        } else {
            session()->setFlashdata('errors', 'Guru tidak ditemukan.');
        }
    
        return redirect()->to('/admin/dataGuru');
    }
}