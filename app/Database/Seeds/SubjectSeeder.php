<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'Matematika'],
            ['name' => 'Bahasa Indonesia'],
            ['name' => 'IPA'],
        ];

        $this->db->table('subjects')->insertBatch($data);
    }
}
