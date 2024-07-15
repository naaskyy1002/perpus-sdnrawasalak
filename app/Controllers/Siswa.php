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
        $siswa = $this->siswaModel->findAll();
        $data = [
            'title' => 'Daftar Siswa',
            'siswa' => $siswa
        ];
        return view('admin/maindata/data_siswa', $data);
    }

    public function addSiswa()
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
                ->with('errors', 'Gagal menambahkan data siswa. Silakan periksa input Anda.');
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