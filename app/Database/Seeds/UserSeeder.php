<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'Ayesa123',
            'email' => 'ayesa@gmail.com',
            'password' => 8514082388,
            'mobile' => 8514082388,
            'full_name' => 'Ayesa Khatun',
            'created_by' => 1,
            'is_active' => 1,
            'is_online' => 1
        ];

        $this->db->table('users')->insert($data);
    }
}
