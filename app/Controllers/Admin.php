<?php

namespace App\Controllers;
use App\Models\AdminModel;
use App\Models\TransaksiModel;

class Admin extends BaseController
{
    protected $adminModel;
    protected $guruModel;
    protected $transaksiModel;
    protected $session;

    //menginisialisasi beberapa dependensi dan layanan yang diperlukan oleh kelas,
    public function __construct()
    {
        $this->adminModel = new AdminModel();
        $this->transaksiModel = new TransaksiModel();
        $this->session = \Config\Services::session();
    }

    // Halaman awal admin = beranda
    public function home()
    {
        // menampilkan page halaman saat di klik
        $currentPage = $this->request->getVar('page_transaksi') ? $this->request->getVar('page_transaksi') :
        1;

        // mencari keyword yang sesuai untuk halaman beranda admin
        $keyword = $this->request->getVar('keyword');
        if($keyword) {
            $pinjam = $this->transaksiModel->search($keyword);
        }else {
            $pinjam = $this->transaksiModel;
        }

        $pinjam = $this->transaksiModel->paginate(10, 'transaksi'); // menentukan seberapa banyak transaksi ditampilkan di views
        $pager = $this->transaksiModel->pager;
        $pinjam = $this->transaksiModel->getPeminjaman();
        $data =[
            'title' => 'Beranda',
            'peminjaman' => $pinjam,
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

    // DAFTAR PENGUNJUNG
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
        
        $data = [
            'title' => 'Data Admin',
            'admin' => $admin,
            'pager' => $pager,
            'currentPage' => $currentPage,
        ];
        return view('admin/maindata/data_admin', $data);
    }

    public function profil_admin()
    {
        // Mendapatkan username pengguna yang saat ini masuk dari sesi
        $username = $this->session->get('username');
        // Mendapatkan semua profil admin dari model admin
        $allProfil = $this->adminModel->getAdmin();

        // Menyaring profil untuk mendapatkan profil yang sesuai dengan username pengguna yang masuk
        $profil = array_filter($allProfil, function ($profil) use ($username) {
        return $profil['username'] == $username;
        });

        // Mengambil elemen pertama dari hasil filter sebagai profil pengguna
        $profil = reset($profil);

        $data = [
        'title' => 'PROFIL SAYA',
        'profil' => $profil,
        ];

        return view('admin/profil_admin', $data);
    }

    public function addAdmin()
    {
        // Cek apakah file foto yang diunggah valid
        if($this->request->getFile('a_foto')->isValid()) {
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
        } else {
            return redirect()->back()->withInput()
                ->with('errors', 'Gagal menambahkan data admin. Silahkan unggah foto.');
        }

        // Ambil data dari request
        $nip      = $this->request->getPost('a_nip');
        $nama     = $this->request->getPost('a_nama');
        $dob      = $this->request->getPost('a_dob');
        $alamat   = $this->request->getPost('a_alamat');
        $telepon  = $this->request->getPost('a_telepon');
        $email    = $this->request->getPost('a_email');
        $jabatan  = $this->request->getPost('a_jabatan');
        $username = $this->request->getPost('a_username');
        $password = $this->request->getPost('a_password');

        // Proses upload foto
        $file = $this->request->getFile('a_foto');
        $fotoName = $nama . '.' . $file->getExtension();  // Nama file foto dengan ekstensi

                                        // rename file
        if (!$file->move('assets/img/admin', $fotoName)) {
            return redirect()->back()->withInput()
                ->with('errors', 'Upload foto gagal.');
        }

        // Data untuk disimpan ke database
        $data = [
            'nip'          => $nip,
            'nama_lengkap' => $nama,
            'dob'          => $dob,
            'alamat'       => $alamat,
            'telp'         => $telepon,
            'email'        => $email,
            'jabatan'      => $jabatan,
            'foto'         => $fotoName,
            'username'     => $username,
            'password'     => $password,
        ];

        // Simpan data menggunakan model
        $this->adminModel->createAdmin($data);

        return redirect()->to('/admin/dataAdmin')->with('message', 'Admin berhasil ditambahkan!');
    }

    public function editAdmin()
    {
        // Ambil data dari form
        $id         = $this->request->getPost('e_nip');
        $nip        = $this->request->getPost('e_nip');
        $nama       = $this->request->getPost('e_namalengkap');
        $dob        = $this->request->getPost('e_dob');
        $alamat     = $this->request->getPost('e_alamat');
        $telepon    = $this->request->getPost('e_telepon');
        $email      = $this->request->getPost('e_email');
        $jabatan    = $this->request->getPost('e_jabatan');
        $username   = $this->request->getPost('e_username');
        $password   = $this->request->getPost('e_password');

        // Data untuk disimpan ke database
        $data = [
            'nip'           => $nip,
            'nama_lengkap'  => $nama,
            'dob'           => $dob,
            'alamat'        => $alamat,
            'telp'          => $telepon,
            'email'         => $email,
            'jabatan'       => $jabatan,
            'username'      => $username,
            'password'      => $password,
        ];

        if ($this->request->getFile('e_foto')->isValid()) {
            // Validasi input untuk foto bukti
            $validation = $this->validate([
            'e_foto' => [
                'uploaded[e_foto]',
                'mime_in[e_foto,image/jpg,image/jpeg,image/png]',
                'max_size[e_foto,2048]',
            ],
        ]);
        

        if (!$validation) {
            return redirect()->back()->withInput()
                ->with('errors', 'Gagal menambahkan data admin. Silakan periksa input Anda.');
        }
        
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
        } else {
            // Tidak ada bukti yang diunggah atau validasi gagal, gunakan bukti lama
            $data['foto'] = $this->request->getPost('e_oldfoto');   
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

        // Pastikan admin ditemukan
        if ($admin) {
            $old_foto = $admin['foto']; // Ambil nama foto admin

            // Hapus sampul admin dari folder jika file ada
            if (file_exists('assets/img/admin/' . $old_foto)) {
                unlink('assets/img/admin/' . $old_foto);
            }

            // Hapus data admin dari database
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
}
