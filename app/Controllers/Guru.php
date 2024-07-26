<?php

namespace App\Controllers;
use App\Models\GuruModel;


class Guru extends BaseController
{
    protected $guruModel;
    protected $session;

    //menginisialisasi beberapa dependensi dan layanan yang diperlukan oleh kelas,
    public function __construct()
    {
        $this->guruModel = new GuruModel();
        $this->session = \Config\Services::session();
    }

    // DATA GURU
    public function data_guru()
    {
        // menampilkan page halaman saat di klik
        $currentPage = $this->request->getVar('page_guru') ? $this->request->getVar('page_guru') :
        1;

        // mencari keyword yang sesuai untuk halaman data guru
        $keyword = $this->request->getVar('keyword');
        if($keyword) {
            $guru = $this->guruModel->search($keyword);
        }else {
            $guru = $this->guruModel;
        }

        $guru = $this->guruModel->paginate(10, 'guru'); // menentukan seberapa banyak data guru ditampilkan di views
        $pager = $this->guruModel->pager;
        
        $data = [
            'title' => 'Data Guru',
            'guru' => $guru,
            'pager' => $pager,
            'currentPage' => $currentPage,
        ];
        return view('admin/maindata/data_guru', $data);
    }

    public function addGuru()
    {
        // Cek apakah file foto yang diunggah valid
        if ($this->request->getFile('a_foto')->isValid()) {
            $validation = $this->validate([
                'a_foto' => [
                'uploaded[a_foto]',
                'mime_in[a_foto,image/jpg,image/jpeg,image/png]',
                'max_size[a_foto,2048]',
            ],
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()
                ->with('errors', 'Gagal menambahkan data guru. Periksa tipe file dan ukuran foto.');
            }
        } else {
            return redirect()->back()->withInput()
                ->with('errors', 'Gagal menambahkan data guru. Silakan unggah foto.');
            }

            // Ambil data dari request
            $nip        = $this->request->getPost('a_nip');
            $nama       = $this->request->getPost('a_nama');
            $dob        = $this->request->getPost('a_dob');
            $alamat     = $this->request->getPost('a_alamat');
            $telepon    = $this->request->getPost('a_telepon');
            $email      = $this->request->getPost('a_email');
            $jabatan    = $this->request->getPost('a_jabatan');

            // Proses upload foto
            $file     = $this->request->getFile('a_foto');
            $fotoName = $nama . '.' . $file->getExtension(); // Nama file foto dengan ekstensi

                                                // rename file
            if (!$file->move('assets/img/guru', $fotoName)) {
                return redirect()->back()->withInput()
                    ->with('errors', 'Upload foto gagal.');
            }

            // Data untuk disimpan ke database
            $data = [
                'nip'           => $nip,
                'nama_lengkap'  => $nama,
                'dob'           => $dob,
                'alamat'        => $alamat,
                'telp'          => $telepon,
                'email'         => $email,
                'jabatan'       => $jabatan,
                'foto'          => $fotoName,
            ];

            // Simpan data menggunakan model
            $this->guruModel->createGuru($data);

        return redirect()->to('/admin/dataGuru')->with('message', 'Guru berhasil ditambahkan!');
    }

    public function editGuru()
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

        // Data untuk disimpan ke database
        $data = [
            'nip'           => $nip,
            'nama_lengkap'  => $nama,
            'dob'           => $dob,
            'alamat'        => $alamat,
            'telp'          => $telepon,
            'email'         => $email,
            'jabatan'       => $jabatan,
        ];

        if ($this->request->getFile('e_foto')->isValid()) {
            $validation = $this->validate([
                'e_foto' => [
                    'uploaded[e_foto]',
                    'mime_in[e_foto,image/jpg,image/jpeg,image/png]',
                    'max_size[e_foto,2048]',
            ],
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()
                ->with('errors', 'Gagal menambahkan data guru. Silakan periksa input Anda.');
        }

        // Validasi berhasil, hapus foto lama jika ada
        $old_foto = $this->request->getPost('e_oldfoto');
        if ($old_foto && file_exists('assets/img/guru/' . $old_foto)) {
            unlink('assets/img/guru/' . $old_foto);
        }

        // Simpan foto baru
        $foto = $this->request->getFile('e_foto');
        $fotoName = $nip . '.' . $foto->getExtension();
        $foto->move('assets/img/guru', $fotoName);
        $data['foto'] = $fotoName;
        } else {
            // Tidak ada yang diunggah atau validasi gagal, gunakan foto lama
            $data['foto'] = $this->request->getPost('e_oldfoto');
        }

        // Update data guru di database
        $this->guruModel->updateGuru($data, $id);

        // Redirect dengan pesan sukses
        return redirect()->to('/admin/dataGuru')->with('message', 'Data guru berhasil diubah!');
    }

    public function deleteGuru()
    {
        // mencari guru berdasarkan nip dan dihapuskan
        $id = $this->request->getPost('nip');
        $guru = $this->guruModel->where('nip', $id)->first();

        // Pastikan guru ditemukan
        if ($guru) {
            $old_foto = $guru['foto']; // Ambil nama foto guru
            // Hapus foto guru dari folder jika file ada
            if (file_exists('assets/img/guru/' . $old_foto)) {
                unlink('assets/img/guru/' . $old_foto);
            }

            // Hapus data guru dari database
            $success = $this->guruModel->where('nip', $id)->delete();

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