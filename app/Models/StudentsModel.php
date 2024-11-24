<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentsModel extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'class_id',
        'name',
        'nis',
        'email',
        'phone',
        'address',
        'created_at',
        'updated_at'
    ];

    public function getStudentsByClass($classId)
    {
        return $this->where('class_id', $classId)->findAll();
    }
}
