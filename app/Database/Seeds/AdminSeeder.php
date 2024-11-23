<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['user_id' => 1, 'name' => 'Admin One', 'phone' => '081234567890', 'email' => 'admin1@example.com'],
        ];

        $this->db->table('admins')->insertBatch($data);
    }
}
