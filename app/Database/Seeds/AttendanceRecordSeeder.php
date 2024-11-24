<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AttendanceRecordSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'schedule_id' => 1,
                'student_id' => 1,
                'status' => 'Present',
                'note' => 'Hadir tepat waktu',
            ],
            [
                'schedule_id' => 1,
                'student_id' => 2,
                'status' => 'Absent',
                'note' => 'Tanpa keterangan',
            ],
        ];

        $this->db->table('attendance_records')->insertBatch($data);
    }
}
