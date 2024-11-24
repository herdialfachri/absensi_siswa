<?php

namespace App\Models;

use CodeIgniter\Model;

class SchedulesModel extends Model
{
    protected $table = 'schedules';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'class_id',
        'subject_id',
        'teacher_id',
        'name',
        'day',
        'time',
        'created_at',
        'updated_at',
    ];

    public function getSchedules()
    {
        return $this
            ->select('schedules.*, classes.name as class_name, subjects.name as subject_name, teachers.name as teacher_name')
            ->join('classes', 'schedules.class_id = classes.id')
            ->join('subjects', 'schedules.subject_id = subjects.id')
            ->join('teachers', 'schedules.teacher_id = teachers.id')
            ->orderBy('schedules.id', 'ASC')
            ->findAll();
    }
}
