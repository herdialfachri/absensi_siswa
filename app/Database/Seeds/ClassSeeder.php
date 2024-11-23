<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ClassSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'X IPA 1', 'teacher_id' => 1],
            ['name' => 'X IPA 2', 'teacher_id' => 1],
        ];

        $this->db->table('classes')->insertBatch($data);
    }
}
