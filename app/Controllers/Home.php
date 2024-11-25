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
        return view('dashboard/dashboard_admin');
    }

    public function dashboard_master(): string
    {
        return view('dashboard/dashboard_master');
    }

    public function dashboard_teacher(): string
    {
        return view('dashboard/dashboard_teacher');
    }
}
