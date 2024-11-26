<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'AuthController::form_login');
$routes->post('/auth/login', 'AuthController::login');
$routes->get('/auth/logout', 'AuthController::logout');

$routes->get('/dashboard_admin', 'Home::dashboard_admin', ['filter' => 'admin']);
$routes->get('/dashboard_master', 'Home::dashboard_master', ['filter' => 'master']);
$routes->get('/dashboard_teacher', 'Home::dashboard_teacher', ['filter' => 'teacher']);

$routes->get('/users', 'UsersController::index');
$routes->get('/users/create', 'UsersController::create'); 
$routes->post('/users/store', 'UsersController::store'); 
$routes->get('/users/edit/(:segment)', 'UsersController::edit/$1'); 
$routes->post('/users/update/(:segment)', 'UsersController::update/$1'); 
$routes->delete('/users/delete/(:segment)', 'UsersController::delete/$1');


$routes->get('/subjects', 'SubjectsController::index', ['filter' => 'auth']);
$routes->get('/students', 'StudentsController::index', ['filter' => 'auth']);
$routes->get('/teachers', 'TeachersController::index', ['filter' => 'auth']);
$routes->get('/classes', 'ClassesController::index', ['filter' => 'auth']);
$routes->get('/schedules', 'SchedulesController::index', ['filter' => 'auth']);
$routes->get('/schedules_admin', 'SchedulesController::index', ['filter' => 'auth']);

$routes->get('/attendance_records', 'AttendanceRecordController::index', ['filter' => 'auth']);
$routes->get('/attendance_records/edit/(:num)', 'AttendanceRecordController::edit/$1', ['filter' => 'auth']);
$routes->post('/attendance_records/update/(:num)', 'AttendanceRecordController::update/$1');
$routes->get('/reload-attendance', 'AttendanceRecordController::reloadAttendance');
$routes->post('/filter-attendance', 'AttendanceRecordController::filterAttendance');


$routes->get('/create', 'AttendanceRecordController::input', ['filter' => 'auth']);
$routes->post('/save', 'AttendanceRecordController::save');
$routes->get('students/by-class/(:num)', 'StudentsController::byClass/$1');
$routes->post('/search-attendance', 'AttendanceRecordController::searchAttendance');

