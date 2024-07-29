<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
            'nama_lengkap' => "Raina Rahmawati Fitri",
            'username'     => "admin",
            'password'     => password_hash('admin', PASSWORD_BCRYPT),
            ],
            [
            'nama_lengkap' => "Sarah Syakira Rambe",
            'username'     => "operator",
            'password'     => password_hash('operator', PASSWORD_BCRYPT),
            ]
        ];

        $this->db->table('admin')->insert($data);
    }
}
