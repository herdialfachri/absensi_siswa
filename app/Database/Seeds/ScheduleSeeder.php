<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['class_id' => 1, 'subject_id' => 1, 'teacher_id' => 1, 'day' => 'Monday', 'time' => '08:00:00'],
            ['class_id' => 1, 'subject_id' => 2, 'teacher_id' => 1, 'day' => 'Tuesday', 'time' => '09:00:00'],
        ];

        $this->db->table('schedules')->insertBatch($data);
    }
}
