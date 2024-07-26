<?php

namespace App\Controllers;
use App\Models\JadwalModel;

class Jadwal extends BaseController
{
    protected $jadwalModel;

    public function __construct()
    {
        $this->jadwalModel = new JadwalModel();
    }

    public function jadwal_kunjungan()
    {
        $jadwal = $this->jadwalModel->findAll();
        $data = [
            'title'  => 'Jadwal Kunjungan',
            'jadwal' => $jadwal
        ];
        return view('admin/kunjungan/jadwal_kunjungan', $data);
    }

    public function editJadwal()
    {
        // Ambil data dari form
        $id = $this->request->getPost('e_idjk');
        $data = [
            'senin' => $this->request->getPost('e_senin'),
            'selasa' => $this->request->getPost('e_selasa'),
            'rabu' => $this->request->getPost('e_rabu'),
            'kamis' => $this->request->getPost('e_kamis'),
            'jumat' => $this->request->getPost('e_jumat'),
            'sabtu' => $this->request->getPost('e_sabtu'),
        ];

        $this->jadwalModel->updateJadwal($data, $id);

        // Redirect dengan pesan sukses
        return redirect()->to('/admin/jadwalKunjungan')->with('message', 'Jadwal berhasil diubah!');
    }
}
