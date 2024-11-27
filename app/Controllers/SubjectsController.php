<?php

namespace App\Controllers;

use App\Models\SubjectsModel;

class SubjectsController extends BaseController
{
    protected $subjectsModel;

    public function __construct()
    {
        $this->subjectsModel = new SubjectsModel();
    }

    public function index()
    {
        $data['subjects'] = $this->subjectsModel->findAll();
        return view('dashboard/pelajaran', $data);
    }

    public function create()
    {
        return view('dashboard/tambah_pelajaran');
    }

    public function store()
    {
        $this->subjectsModel->save([
            'name' => $this->request->getPost('name')
        ]);
        return redirect()->to('/subjects');
    }

    public function edit($id)
    {
        $data['subject'] = $this->subjectsModel->find($id);
        return view('dashboard/edit_pelajaran', $data);
    }

    public function update($id)
    {
        $this->subjectsModel->update($id, [
            'name' => $this->request->getPost('name')
        ]);
        return redirect()->to('/subjects');
    }

    public function delete($id)
    {
        $this->subjectsModel->delete($id);
        return redirect()->to('/subjects');
    }
}