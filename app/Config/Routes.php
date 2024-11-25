<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'AuthController::form_login');
$routes->post('/auth/login', 'AuthController::login');
$routes->get('/auth/logout', 'AuthController::logout');

$routes->get('/dashboard_admin', 'Home::dashboard', ['filter' => 'auth']);
$routes->get('/dashboard_master', 'Home::dashboard_master', ['filter' => 'auth']);
$routes->get('/dashboard_teacher', 'Home::dashboard_teacher', ['filter' => 'auth']);

$routes->get('/subjects', 'SubjectsController::index', ['filter' => 'auth']);
$routes->get('/students', 'StudentsController::index', ['filter' => 'auth']);
$routes->get('/teachers', 'TeachersController::index', ['filter' => 'auth']);
$routes->get('/classes', 'ClassesController::index', ['filter' => 'auth']);
$routes->get('/schedules', 'SchedulesController::index', ['filter' => 'auth']);

$routes->get('/attendance_records', 'AttendanceRecordController::index', ['filter' => 'auth']);
$routes->get('/attendance_records/edit/(:num)', 'AttendanceRecordController::edit/$1', ['filter' => 'auth']);
$routes->post('/attendance_records/update/(:num)', 'AttendanceRecordController::update/$1');
$routes->get('/reload-attendance', 'AttendanceRecordController::reloadAttendance');


$routes->get('/create', 'AttendanceRecordController::input', ['filter' => 'auth']);
$routes->post('/save', 'AttendanceRecordController::save');
$routes->get('students/by-class/(:num)', 'StudentsController::byClass/$1');
$routes->post('/search-attendance', 'AttendanceRecordController::searchAttendance');

