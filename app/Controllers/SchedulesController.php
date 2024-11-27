<?php

namespace App\Controllers;

use App\Models\SchedulesModel;
use App\Models\ClassesModel;
use App\Models\SubjectsModel;
use App\Models\TeachersModel;

class SchedulesController extends BaseController
{
    protected $schedulesModel;
    protected $classesModel;
    protected $subjectsModel;
    protected $teachersModel;

    public function __construct()
    {
        $this->schedulesModel = new SchedulesModel();
        $this->classesModel = new ClassesModel();
        $this->subjectsModel = new SubjectsModel();
        $this->teachersModel = new TeachersModel();
    }

    public function index()
    {
        $data['schedules'] = $this->schedulesModel
            ->select('schedules.*, classes.name as class_name, subjects.name as subject_name, teachers.name as teacher_name')
            ->join('classes', 'schedules.class_id = classes.id')
            ->join('subjects', 'schedules.subject_id = subjects.id')
            ->join('teachers', 'schedules.teacher_id = teachers.id')
            ->findAll();
        
        return view('dashboard/matpel', $data);
    }

    public function create()
    {
        $data['classes'] = $this->classesModel->findAll();
        $data['subjects'] = $this->subjectsModel->findAll();
        $data['teachers'] = $this->teachersModel->findAll();
        return view('dashboard/create_matpel', $data);
    }

    public function store()
    {
        $this->schedulesModel->save([
            'class_id' => $this->request->getPost('class_id'),
            'subject_id' => $this->request->getPost('subject_id'),
            'teacher_id' => $this->request->getPost('teacher_id'),
            'name' => $this->request->getPost('name'),
            'day' => $this->request->getPost('day'),
            'time' => $this->request->getPost('time'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect()->to('/schedules');
    }

    public function edit($id)
    {
        $data['schedule'] = $this->schedulesModel->find($id);
        $data['classes'] = $this->classesModel->findAll();
        $data['subjects'] = $this->subjectsModel->findAll();
        $data['teachers'] = $this->teachersModel->findAll();
        return view('dashboard/edit_matpel', $data);
    }

    public function update($id)
    {
        $this->schedulesModel->update($id, [
            'class_id' => $this->request->getPost('class_id'),
            'subject_id' => $this->request->getPost('subject_id'),
            'teacher_id' => $this->request->getPost('teacher_id'),
            'name' => $this->request->getPost('name'),
            'day' => $this->request->getPost('day'),
            'time' => $this->request->getPost('time'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect()->to('/schedules');
    }

    public function delete($id)
    {
        $this->schedulesModel->delete($id);
        return redirect()->to('/schedules');
    }
}
