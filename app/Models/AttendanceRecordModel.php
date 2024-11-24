<?php

namespace App\Models;

use CodeIgniter\Model;

class AttendanceRecordModel extends Model
{
    protected $table = 'attendance_records';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'schedule_id',
        'student_id',
        'status',
        'note',
        'created_at',
        'updated_at',
    ];

    public function getAttendanceRecords()
    {
        return $this
            ->select('attendance_records.*, schedules.day, schedules.time, students.name as student_name, classes.name as student_class, students.nis as student_nis')
            ->join('schedules', 'attendance_records.schedule_id = schedules.id')
            ->join('students', 'attendance_records.student_id = students.id')
            ->join('classes', 'students.class_id = classes.id')
            ->orderBy('attendance_records.id', 'ASC')
            ->findAll();
    }
}
