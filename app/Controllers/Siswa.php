<?php

namespace App\Controllers;
use App\Models\SiswaModel;

class Siswa extends BaseController
{
    protected $siswaModel;

    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
    }

    public function data_siswa()
    {
        $currentPage = $this->request->getVar('page_siswa') ? $this->request->getVar('page_siswa') :
        1;

        $keyword = $this->request->getVar('keyword');
        if($keyword) {
            $siswa = $this->siswaModel->search($keyword);
        }else {
            $siswa = $this->siswaModel;
        }

        // $siswa = $this->siswaModel->findAll();
        $siswa = $this->siswaModel->paginate(1, 'siswa');
        $pager = $this->siswaModel->pager;
        $data = [
            'title' => 'Daftar Siswa',
            'siswa' => $siswa,
            'pager' => $pager,
            'currentPage' => $currentPage,
        ];
        return view('admin/maindata/data_siswa', $data);
    }

    public function addSiswa()
    {
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

        $nisn = $this->request->getPost('a_nisn');
        $username = $this->request->getPost('a_username');
        $password = $this->request->getPost('a_password');
        $jenis_kelamin = $this->request->getPost('a_jk');
        $kelas = $this->request->getPost('a_kelas');

        $file = $this->request->getFile('a_foto');
        $fotoName = $username . '.' . $file->getExtension();
        
        if (!$file->move('assets/img/siswa', $fotoName)) {
            return redirect()->back()->withInput()
                ->with('errors', 'Upload foto gagal.');
        }

        $data = [
            'nisn' => $nisn,
            'username' => $username,
            'password' => $password,
            'jenis_kelamin' => $jenis_kelamin,
            'kelas' => $kelas,
            'foto' => $fotoName,
        ];

        $this->siswaModel->createSiswa($data);

        return redirect()->to('admin/dataSiswa')->with('message', 'Siswa berhasil ditambahkan!');
    }

    public function editSiswa()
    {
        // Ambil data dari form
        $id = $this->request->getPost('e_nisn');
        $nisn = $this->request->getPost('e_nisn');
        $username = $this->request->getPost('e_username');
        $password = $this->request->getPost('e_password');
        $jenis_kelamin = $this->request->getPost('e_jk');
        $kelas = $this->request->getPost('e_kelas');

        // Data untuk disimpan ke database
        $data = [
            'nisn' => $nisn,
            'username' => $username,
            'password' => $password,
            'jenis_kelamin' => $jenis_kelamin,
            'kelas' => $kelas,
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
            $foto->move('assets/img/buku', $foto_name);
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
