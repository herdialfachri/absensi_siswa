<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UsersController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data['users'] = $this->userModel->findAll();
        return view('dashboard/users', $data);
    }

    public function create()
    {
        return view('dashboard/create_user');
    }

    public function store()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => md5($this->request->getPost('password')),
            'role' => $this->request->getPost('role')
        ];

        $this->userModel->save($data);
        return redirect()->to('/users');
    }

    public function edit($id)
    {
        $data['user'] = $this->userModel->find($id);
        return view('dashboard/edit_user', $data);
    }

    public function update($id)
    {
        $password = $this->request->getPost('password');

        if (empty($password)) {
            $user = $this->userModel->find($id);
            $password = $user['password'];
        } else {
            $password = md5($password);
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $password,
            'role' => $this->request->getPost('role')
        ];

        $this->userModel->update($id, $data);
        return redirect()->to('/users');
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        return redirect()->to('/users');
    }
}