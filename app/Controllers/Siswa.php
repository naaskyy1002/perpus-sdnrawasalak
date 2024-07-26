<?php

namespace App\Controllers;
use App\Models\SiswaModel;

class Siswa extends BaseController
{
    protected $siswaModel;

    //menginisialisasi beberapa dependensi dan layanan yang diperlukan oleh kelas,
    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
    }

    // DATA SISWA
    public function data_siswa()
    {
        // menampilkan page halaman saat di klik
        $currentPage = $this->request->getVar('page_siswa') ? $this->request->getVar('page_siswa') :
        1;

        // mencari keyword yang sesuai untuk halaman data siswa
        $keyword = $this->request->getVar('keyword');
        if($keyword) {
            $siswa = $this->siswaModel->search($keyword);
        }else {
            $siswa = $this->siswaModel;
        }

        $siswa = $this->siswaModel->paginate(1, 'siswa'); // menentukan seberapa banyak data siswa ditampilkan di views
        $pager = $this->siswaModel->pager;
        $data = [
            'title' => 'Data Siswa',
            'siswa' => $siswa,
            'pager' => $pager,
            'currentPage' => $currentPage,
        ];
        return view('admin/maindata/data_siswa', $data);
    }

    public function addSiswa()
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
                ->with('errors', 'Gagal menambahkan data siswa. Silakan periksa input Anda.');
        }
    } else {
        return redirect()->back()->withInput()
            ->with('errors', 'Gagal menambahkan data siswa. Silahkan unggah foto');
    }

        // Ambil data dari request
        $nisn          = $this->request->getPost('a_nisn');
        $username      = $this->request->getPost('a_username');
        $password      = $this->request->getPost('a_password');
        $dob           = $this->request->getPost('a_dob');
        $jenis_kelamin = $this->request->getPost('a_jk');
        $kelas         = $this->request->getPost('a_kelas');
        $file          = $this->request->getFile('a_foto');
        $fotoName      = $username . '.' . $file->getExtension(); // Nama file foto dengan ekstensi
        
        // Proses upload foto
        if (!$file->move('assets/img/siswa', $fotoName)) {
            return redirect()->back()->withInput()
                ->with('errors', 'Upload foto gagal.');
        }

        // Data untuk disimpan ke database
        $data = [
            'nisn'          => $nisn,
            'username'      => $username,
            'password'      => $password,
            'dob'           => $dob,
            'jenis_kelamin' => $jenis_kelamin,
            'kelas'         => $kelas,
            'foto'          => $fotoName,
        ];

        // Simpan data menggunakan model
        $this->siswaModel->createSiswa($data);

        return redirect()->to('admin/dataSiswa')->with('message', 'Siswa berhasil ditambahkan!');
    }

    public function editSiswa()
    {
        // Ambil data dari form
        $id             = $this->request->getPost('e_nisn');
        $nisn           = $this->request->getPost('e_nisn');
        $username       = $this->request->getPost('e_username');
        $password       = $this->request->getPost('e_password');
        $dob            = $this->request->getPost('e_dob');
        $jenis_kelamin  = $this->request->getPost('e_jk');
        $kelas          = $this->request->getPost('e_kelas');

        // Data untuk disimpan ke database
        $data = [
            'nisn'          => $nisn,
            'username'      => $username,
            'password'      => $password,
            'dob'           => $dob,
            'jenis_kelamin' => $jenis_kelamin,
            'kelas'         => $kelas,
        ];

        if($this->request->getFile('e_foto')->isValid()) {
        // Validasi input untuk profile
        $validation = $this->validate([
            'e_foto' => [
                'uploaded[e_foto]',
                'mime_in[e_foto,image/jpg,image/jpeg,image/png]',
                'max_size[e_foto,2048]', 
            ],
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()
                ->with('errors', 'Gagal menambahkan data siswa. Silahkan periksa input anda.');
        } 

            // Validasi berhasil, hapus foto lama jika ada
            $old_foto = $this->request->getPost('e_oldfoto');
            if ($old_foto && file_exists('assets/img/siswa/' . $old_foto)) {
                unlink('assets/img/siswa/' . $old_foto);
            }

            // Simpan foto baru
            $foto = $this->request->getFile('e_foto');
            $foto_name = $nisn . '.' . $foto->getExtension();
            $foto->move('assets/img/siswa', $foto_name);
            $data['foto'] = $foto_name;
        } else {
            // Tidak ada bukti yang diunggah atau validasi gagal, gunakan bukti lama
            $data['foto'] = $this->request->getPost('e_oldfoto');   
        }

        // Update data siswa di database
        $this->siswaModel->updateSiswa($data, $id);

        // Redirect dengan pesan sukses
        return redirect()->to('admin/dataSiswa')->with('message', 'Data siswa berhasil diubah!');
    }

    public function deleteSiswa()
    {
        $id = $this->request->getPost('nisn');
        $siswa = $this->siswaModel->where('nisn', $id)->first();

        if ($siswa) {
            $old_foto = $siswa['foto'];

            if (file_exists('assets/img/siswa/' . $old_foto)) {
                unlink('assets/img/siswa/' . $old_foto);
            }

            $success = $this->siswaModel->where('nisn', $id)->delete();

            if ($success) {
                session()->setFlashdata('message', 'Siswa berhasil dihapus!');
            } else {
                session()->setFlashdata('errors', 'Gagal menghapus siswa.');
            }
        } else {
            session()->setFlashdata('errors', 'Siswa tidak ditemukan.');
        }

        return redirect()->to('admin/dataSiswa');
    }
}
