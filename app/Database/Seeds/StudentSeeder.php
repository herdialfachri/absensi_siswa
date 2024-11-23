<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1, // Ini akan diisi otomatis oleh auto_increment
                'class_id' => 1, 
                'name' => 'Budi', 
                'nis' => '001', 
                'email' => 'budi@example.com', 
                'phone' => '084567890123', 
                'address' => 'Jl. Pelajar No. 2',
                'created_at' => '2023-01-01 10:00:00',
                'updated_at' => '2023-01-01 10:00:00',
            ],
            [
                'id' => 2, // Ini akan diisi otomatis oleh auto_increment
                'class_id' => 2, 
                'name' => 'Citra', 
                'nis' => '002', 
                'email' => 'citra@example.com', 
                'phone' => '085678901234', 
                'address' => 'Jl. Pelajar No. 3',
                'created_at' => '2023-01-01 11:00:00',
                'updated_at' => '2023-01-01 11:00:00',
            ],
        ];
        

        $this->db->table('students')->insertBatch($data);
    }
}
