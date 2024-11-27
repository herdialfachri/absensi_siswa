<?php

namespace App\Controllers;

use App\Models\AttendanceRecordModel;

class AttendanceExportController extends BaseController
{
    protected $attendanceRecordModel;

    public function __construct()
    {
        $this->attendanceRecordModel = new AttendanceRecordModel();
    }

    public function export()
    {
        $class_id = $this->request->getGet('class_id');
        $subject_id = $this->request->getGet('subject_id');

        $attendanceRecords = $this->attendanceRecordModel
            ->select('attendance_records.*, students.nis, students.name as student_name, classes.name as class_name, schedules.day, schedules.time, schedules.name as schedule_name')
            ->join('students', 'attendance_records.student_id = students.id')
            ->join('classes', 'students.class_id = classes.id')
            ->join('schedules', 'attendance_records.schedule_id = schedules.id');

        if ($class_id) {
            $attendanceRecords->where('classes.id', $class_id);
        }

        if ($subject_id) {
            $attendanceRecords->where('schedules.subject_id', $subject_id);
        }

        $attendanceRecords = $attendanceRecords->findAll();

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename="Attendance_Report.csv"');
        header('Cache-Control: max-age=0');

        $output = fopen('php://output', 'w');

        // Set headers
        fputcsv($output, ['NIS', 'Tanggal', 'Jadwal', 'Siswa', 'Kelas', 'Status', 'Catatan']);

        // Fill data
        foreach ($attendanceRecords as $record) {
            fputcsv($output, [
                $record['nis'],
                $record['tanggal'],
                $record['schedule_name'],
                $record['student_name'],
                $record['class_name'],
                $record['status'],
                $record['note']
            ]);
        }

        fclose($output);
        exit();
    }

    public function view()
    {
        $classes = (new \App\Models\ClassesModel())->findAll();
        $subjects = (new \App\Models\SubjectsModel())->findAll();
        return view('dashboard/export_absensi', ['classes' => $classes, 'subjects' => $subjects]);
    }
}
