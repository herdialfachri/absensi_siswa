<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('landingpage/index');
    }

    public function dashboard(): string
    {
        return view('dashboard/index');
    }

    public function login(): string
    {
        return view('login/index');
    }
}
