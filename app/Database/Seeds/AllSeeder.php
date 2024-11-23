<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AllSeeder extends Seeder
{
    public function run()
    {
        // Seeder untuk tabel Users
        $this->call('UserSeeder');

        // Seeder untuk tabel Admins
        $this->call('AdminSeeder');

        // Seeder untuk tabel Masters
        $this->call('MasterSeeder');

        // Seeder untuk tabel Teachers
        $this->call('TeacherSeeder');

        // Seeder untuk tabel Classes
        $this->call('ClassSeeder');

        // Seeder untuk tabel Students
        $this->call('StudentSeeder');

        // Seeder untuk tabel Subjects
        $this->call('SubjectSeeder');

        // Seeder untuk tabel Schedules
        $this->call('ScheduleSeeder');

        // Seeder untuk tabel AttendanceRecords
        $this->call('AttendanceRecordSeeder');
    }
}
