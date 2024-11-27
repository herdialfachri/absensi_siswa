<?php

namespace App\Controllers;

use App\Models\TeachersModel;
use App\Models\UserModel;

class TeachersController extends BaseController
{
    protected $teachersModel;
    protected $usersModel;

    public function __construct()
    {
        $this->teachersModel = new TeachersModel();
        $this->usersModel = new UserModel();
    }

    public function index()
    {
        $data['teachers'] = $this->teachersModel->findAll();
        return view('dashboard/guru', $data);
    }

    public function create()
    {
        $data['users'] = $this->usersModel->findAll();
        return view('dashboard/create_guru', $data);
    }

    public function store()
    {
        $user = $this->usersModel->where('username', $this->request->getPost('username'))->first();
        $this->teachersModel->save([
            'user_id' => $user['id'],
            'name' => $this->request->getPost('name'),
            'nip' => $this->request->getPost('nip'),
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
            'address' => $this->request->getPost('address')
        ]);
        return redirect()->to('/teachers');
    }

    public function edit($id)
    {
        $data['teacher'] = $this->teachersModel->find($id);
        $data['users'] = $this->usersModel->findAll();
        return view('dashboard/edit_guru', $data);
    }

    public function update($id)
    {
        $user = $this->usersModel->where('username', $this->request->getPost('username'))->first();
        $this->teachersModel->update($id, [
            'user_id' => $user['id'],
            'name' => $this->request->getPost('name'),
            'nip' => $this->request->getPost('nip'),
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
            'address' => $this->request->getPost('address')
        ]);
        return redirect()->to('/teachers');
    }

    public function delete($id)
    {
        $this->teachersModel->delete($id);
        return redirect()->to('/teachers');
    }
}