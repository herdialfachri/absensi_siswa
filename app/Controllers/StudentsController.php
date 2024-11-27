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
        $data['students'] = $this->studentsModel
            ->select('students.*, classes.name as class_name')
            ->join('classes', 'students.class_id = classes.id')
            ->findAll();

        return view('dashboard/siswa', $data);
    }

    public function create()
    {
        $data['classes'] = $this->classesModel->findAll();
        return view('dashboard/create_siswa', $data);
    }

    public function store()
    {
        $this->studentsModel->save([
            'class_id' => $this->request->getPost('class_id'),
            'name' => $this->request->getPost('name'),
            'nis' => $this->request->getPost('nis'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->to('/students');
    }

    public function edit($id)
    {
        $data['student'] = $this->studentsModel->find($id);
        $data['classes'] = $this->classesModel->findAll();
        return view('dashboard/edit_siswa', $data);
    }

    public function update($id)
    {
        $this->studentsModel->update($id, [
            'class_id' => $this->request->getPost('class_id'),
            'name' => $this->request->getPost('name'),
            'nis' => $this->request->getPost('nis'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->to('/students');
    }

    public function delete($id)
    {
        $this->studentsModel->delete($id);
        return redirect()->to('/students');
    }

    public function byClass($classId)
    {
        $students = $this->studentsModel->getStudentsByClass($classId);

        return $this->response->setJSON($students);
    }
}
