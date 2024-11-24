<?php

namespace App\Controllers;

use App\Models\StudentsModel;
use App\Models\ClassesModel;

class StudentsController extends BaseController
{
    protected $studentsModel;
    protected $classesModel;

    public function __construct()
    {
        $this->studentsModel = new StudentsModel();
        $this->classesModel = new ClassesModel();
    }

    public function index()
    {
        // Join untuk mendapatkan nama kelas
        $data['students'] = $this->studentsModel
            ->select('students.*, classes.name as class_name')
            ->join('classes', 'students.class_id = classes.id')
            ->findAll(); // Ambil data siswa dan kelas terkait

        return view('dashboard/siswa', $data);
    }

    public function byClass($classId)
    {
        // Ambil data siswa berdasarkan class_id
        $students = $this->studentsModel->getStudentsByClass($classId);
        
        // Kirimkan data dalam format JSON
        return $this->response->setJSON($students);
    }
}
