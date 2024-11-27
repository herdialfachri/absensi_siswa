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
            ->findAll();

        return view('dashboard/kelas', $data);
    }

    public function create()
    {
        $data['teachers'] = $this->teachersModel->findAll();
        return view('dashboard/tambah_kelas', $data);
    }

    public function store()
    {
        $this->classesModel->save([
            'name' => $this->request->getPost('name'),
            'teacher_id' => $this->request->getPost('teacher_id')
        ]);
        return redirect()->to('/classes');
    }

    public function edit($id)
    {
        $data['class'] = $this->classesModel->find($id);
        $data['teachers'] = $this->teachersModel->findAll();
        return view('dashboard/edit_kelas', $data);
    }

    public function update($id)
    {
        $this->classesModel->update($id, [
            'name' => $this->request->getPost('name'),
            'teacher_id' => $this->request->getPost('teacher_id')
        ]);
        return redirect()->to('/classes');
    }

    public function delete($id)
    {
        $this->classesModel->delete($id);
        return redirect()->to('/classes');
    }
}