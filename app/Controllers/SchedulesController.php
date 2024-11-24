<?php

namespace App\Controllers;

use App\Models\SchedulesModel;

class SchedulesController extends BaseController
{
    protected $schedulesModel;

    public function __construct()
    {
        $this->schedulesModel = new SchedulesModel();
    }

    public function index()
    {
        $data['schedules'] = $this->schedulesModel->getSchedules();
        return view('dashboard/matpel', $data);
    }
}
