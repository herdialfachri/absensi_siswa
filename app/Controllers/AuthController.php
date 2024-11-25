<?php

namespace App\Controllers;

use App\Models\AuthModel;

class AuthController extends BaseController
{
    public function form_login()
    {
        $session = session();
        if ($session->get('logged_in')) {
            return $this->redirectUser();
        }
        return view('login/index');
    }

    public function index()
    {
        $session = session();
        if ($session->get('logged_in')) {
            return $this->redirectUser();
        }
        return view('login/index');
    }

    public function login()
    {
        $session = session();
        $model = new AuthModel();

        $username = $this->request->getVar('username');
        $password = md5($this->request->getVar('password'));

        $user = $model->getUserByUsername($username);

        if ($user) {
            // Mengecek password dengan MD5
            if ($password === $user['password']) {
                $sessionData = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'logged_in' => true
                ];
                $session->set($sessionData);

                // Debugging: cek apakah data sesi di-set
                var_dump($session->get('logged_in')); // Harusnya true
                return $this->redirectUser();
            } else {
                $session->setFlashdata('msg', 'Wrong Username or Password');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Wrong Username or Password');
            return redirect()->to('/login');
        }
    }

    private function redirectUser()
    {
        $session = session();
        $role = $session->get('role');
    
        if ($role == 'master') {
            return redirect()->to('/dashboard_master');
        } elseif ($role == 'admin') {
            return redirect()->to('/dashboard_admin');
        } elseif ($role == 'teacher') {
            return redirect()->to('/dashboard_teacher');
        } else {
            return redirect()->to('/login');
        }
    }    

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
