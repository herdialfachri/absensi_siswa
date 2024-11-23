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
        $data['subjects'] = $this->subjectsModel->findAll(); // Ambil semua data dari tabel subjects
        return view('dashboard/pelajaran', $data); // Arahkan ke view
    }
}
