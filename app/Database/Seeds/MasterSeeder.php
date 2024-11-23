<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MasterSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['user_id' => 2, 'name' => 'Master One', 'phone' => '082345678901', 'email' => 'master1@example.com'],
        ];

        $this->db->table('masters')->insertBatch($data);
    }
}
