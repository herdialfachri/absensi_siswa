<?php

namespace App\Controllers;

use App\Models\StudentsModel;
use App\Models\TeachersModel;
use App\Models\ClassesModel;
use App\Models\SubjectsModel;
use App\Models\AttendanceRecordModel;
use App\Models\SchedulesModel;

class Home extends BaseController
{
    protected $studentsModel;
    protected $teachersModel;
    protected $classesModel;
    protected $subjectsModel;
    protected $attendanceRecordModel;
    protected $schedulesModel;

    public function __construct()
    {
        $this->studentsModel = new StudentsModel();
        $this->teachersModel = new TeachersModel();
        $this->classesModel = new ClassesModel();
        $this->subjectsModel = new SubjectsModel();
        $this->attendanceRecordModel = new AttendanceRecordModel();
        $this->schedulesModel = new SchedulesModel();
    }

    public function index()
    {
        $data['studentCount'] = $this->studentsModel->countAllResults();
        $data['teacherCount'] = $this->teachersModel->countAllResults();
        $data['classCount'] = $this->classesModel->countAllResults();
        $data['subjectCount'] = $this->subjectsModel->countAllResults();

        return view('landingpage/index', $data);
    }

    public function dashboard_admin(): string
    {
        $data['studentCount'] = $this->studentsModel->countAllResults();
        $data['teacherCount'] = $this->teachersModel->countAllResults();
        $data['attendanceCount'] = $this->attendanceRecordModel->countAllResults();
        $data['scheduleCount'] = $this->schedulesModel->countAllResults();

        return view('dashboard/dashboard_admin', $data);
    }

    public function dashboard_master(): string
    {
        $data['studentCount'] = $this->studentsModel->countAllResults();
        $data['teacherCount'] = $this->teachersModel->countAllResults();
        $data['attendanceCount'] = $this->attendanceRecordModel->countAllResults();
        $data['scheduleCount'] = $this->schedulesModel->countAllResults();
        
        return view('dashboard/dashboard_master', $data);
    }

    public function dashboard_teacher(): string
    {
        $data['studentCount'] = $this->studentsModel->countAllResults();
        $data['teacherCount'] = $this->teachersModel->countAllResults();
        $data['attendanceCount'] = $this->attendanceRecordModel->countAllResults();
        $data['scheduleCount'] = $this->schedulesModel->countAllResults();

        return view('dashboard/dashboard_teacher', $data);
    }
}
