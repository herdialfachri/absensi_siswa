<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['username' => 'admin', 'password' => password_hash('admin123', PASSWORD_DEFAULT), 'role' => 'admin', 'created_at' => date('Y-m-d H:i:s')],
            ['username' => 'master', 'password' => password_hash('master123', PASSWORD_DEFAULT), 'role' => 'master', 'created_at' => date('Y-m-d H:i:s')],
            ['username' => 'teacher_andi', 'password' => password_hash('teacher123', PASSWORD_DEFAULT), 'role' => 'teacher', 'created_at' => date('Y-m-d H:i:s')],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
