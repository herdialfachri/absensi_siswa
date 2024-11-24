<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AttendanceRecordModel;
use App\Models\SchedulesModel;
use App\Models\StudentsModel;

class AttendanceRecordController extends BaseController
{
    protected $attendanceRecordModel;
    protected $schedulesModel;
    protected $studentsModel;

    public function __construct()
    {
        $this->attendanceRecordModel = new AttendanceRecordModel();
        $this->schedulesModel = new SchedulesModel();
        $this->studentsModel = new StudentsModel();
    }

    public function index()
    {
        $data['attendanceRecords'] = $this->attendanceRecordModel->getAttendanceRecords();
        return view('dashboard/absensi', $data);
    }

    public function input()
    {
        $data['schedules'] = $this->schedulesModel->getSchedules(); // Mendapatkan jadwal dengan relasi
        return view('dashboard/input_absensi', $data);
    }

    public function save()
    {
        $schedule_id = $this->request->getPost('schedule_id');
        $students = $this->studentsModel->where('class_id', $this->request->getPost('class_id'))->findAll();

        foreach ($students as $student) {
            $this->attendanceRecordModel->save([
                'schedule_id' => $schedule_id,
                'student_id' => $student['id'],
                'status' => $this->request->getPost('status_' . $student['id']),
                'note' => $this->request->getPost('note_' . $student['id']),
            ]);
        }

        return redirect()->to('/attendance_records')->with('success', 'Data absensi berhasil disimpan.');
    }
}
