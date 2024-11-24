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
                'note' => $this->request->getPost('note_' . $student['id']) ?: 'Tidak ada catatan',
            ]);
        }

        return redirect()->to('/attendance_records')->with('success', 'Data absensi berhasil disimpan.');
    }

    public function searchAttendance()
    {
        if ($this->request->isAJAX()) {
            $nis = $this->request->getVar('nis'); // Pastikan parameter 'nis' diterima
            if (!$nis) {
                return $this->response->setJSON([]);
            }

            $attendanceRecords = $this->attendanceRecordModel
                ->select('attendance_records.*, students.nis as student_nis, students.name as student_name, classes.name as student_class, schedules.day, schedules.time')
                ->join('students', 'attendance_records.student_id = students.id', 'left')
                ->join('classes', 'students.class_id = classes.id', 'left')
                ->join('schedules', 'attendance_records.schedule_id = schedules.id', 'left')
                ->like('students.nis', $nis) // Pencarian berdasarkan NIS
                ->findAll();

            // Debugging
            if (empty($attendanceRecords)) {
                return $this->response->setJSON(['message' => 'Data tidak ditemukan.']);
            }

            $data = array_map(function ($record) {
                return [
                    'id' => $record['id'],
                    'student_nis' => $record['student_nis'],
                    'day' => $record['day'],
                    'time' => $record['time'],
                    'student_name' => $record['student_name'],
                    'student_class' => $record['student_class'],
                    'status' => $record['status'],
                    'note' => $record['note'] ?? '-',
                    'edit_url' => base_url('/attendance_records/edit/' . $record['id']),
                ];
            }, $attendanceRecords);

            return $this->response->setJSON($data);
        }
    }

    public function edit($id)
    {
        $attendanceRecord = $this->attendanceRecordModel
            ->select('attendance_records.*, students.nis as student_nis, students.name as student_name, classes.name as student_class')
            ->join('students', 'attendance_records.student_id = students.id')
            ->join('classes', 'students.class_id = classes.id')
            ->where('attendance_records.id', $id)
            ->first();

        if (!$attendanceRecord) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan.');
        }

        return view('dashboard/edit_absensi', ['record' => $attendanceRecord]);
    }

    public function update($id)
    {
        $data = [
            'status' => $this->request->getPost('status'),
            'note' => $this->request->getPost('note'),
        ];

        if ($this->attendanceRecordModel->update($id, $data)) {
            return redirect()->to('/attendance_records')->with('success', 'Data absensi berhasil diperbarui.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data absensi.');
        }
    }

    public function reloadAttendance()
    {
        if ($this->request->isAJAX()) {
            $attendanceRecords = $this->attendanceRecordModel
                ->select('attendance_records.*, students.nis as student_nis, students.name as student_name, classes.name as student_class, schedules.day, schedules.time')
                ->join('students', 'attendance_records.student_id = students.id', 'left')
                ->join('classes', 'students.class_id = classes.id', 'left')
                ->join('schedules', 'attendance_records.schedule_id = schedules.id', 'left')
                ->findAll();

            $data = array_map(function ($record) {
                return [
                    'id' => $record['id'],
                    'student_nis' => $record['student_nis'],
                    'day' => $record['day'],
                    'time' => $record['time'],
                    'student_name' => $record['student_name'],
                    'student_class' => $record['student_class'],
                    'status' => $record['status'],
                    'note' => $record['note'] ?? '-',
                    'edit_url' => base_url('/attendance_records/edit/' . $record['id']),
                ];
            }, $attendanceRecords);

            return $this->response->setJSON($data);
        }
    }
}
