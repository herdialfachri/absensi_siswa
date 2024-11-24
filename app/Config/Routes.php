<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Home::dashboard');
$routes->get('/login', 'Home::login');
$routes->get('/subjects', 'SubjectsController::index');
$routes->get('/students', 'StudentsController::index');
$routes->get('/teachers', 'TeachersController::index');
$routes->get('/classes', 'ClassesController::index');
$routes->get('/schedules', 'SchedulesController::index');

$routes->get('/attendance_records', 'AttendanceRecordController::index');
$routes->get('/attendance_records/edit/(:num)', 'AttendanceRecordController::edit/$1');
$routes->post('/attendance_records/update/(:num)', 'AttendanceRecordController::update/$1');
$routes->get('/reload-attendance', 'AttendanceRecordController::reloadAttendance');


$routes->get('/create', 'AttendanceRecordController::input'); // Halaman tambah absensi
$routes->post('/save', 'AttendanceRecordController::save');
$routes->get('students/by-class/(:num)', 'StudentsController::byClass/$1');
$routes->post('/search-attendance', 'AttendanceRecordController::searchAttendance');
