<?php

namespace App\Controllers;

use App\Models\ClassesModel;
use App\Models\TeachersModel;

class ClassesController extends BaseController
{
    protected $classesModel;
    protected $teachersModel;

    public function __construct()
    {
        $this->classesModel = new ClassesModel();
        $this->teachersModel = new TeachersModel();
    }

    public function index()
    {
        $data['classes'] = $this->classesModel
            ->select('classes.*, teachers.name as teacher_name')
            ->join('teachers', 'classes.teacher_id = teachers.id')
            ->findAll(); // Ambil data kelas dan guru terkait
        return view('dashboard/kelas', $data);
    }
}
