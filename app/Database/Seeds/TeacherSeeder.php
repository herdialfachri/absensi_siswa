<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TeacherSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['user_id' => 3, 'name' => 'Andi', 'nip' => '1234567890', 'phone' => '083456789012', 'email' => 'andi@example.com', 'address' => 'Jl. Pendidikan No. 1'],
        ];

        $this->db->table('teachers')->insertBatch($data);
    }
}
