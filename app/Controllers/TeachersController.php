<?php

namespace App\Controllers;

use App\Models\TeachersModel;

class TeachersController extends BaseController
{
    protected $teachersModel;

    public function __construct()
    {
        $this->teachersModel = new TeachersModel();
    }

    public function index()
    {
        $data['teachers'] = $this->teachersModel->findAll(); // Ambil semua data dari tabel teachers
        return view('dashboard/guru', $data); // Arahkan ke view
    }
}
