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

$routes->get('/users', 'UsersController::index', ['filter' => 'master']);
$routes->get('/users/create', 'UsersController::create', ['filter' => 'master']); 
$routes->post('/users/store', 'UsersController::store', ['filter' => 'master']);
$routes->get('/users/edit/(:segment)', 'UsersController::edit/$1', ['filter' => 'master']); 
$routes->post('/users/update/(:segment)', 'UsersController::update/$1', ['filter' => 'master']);
$routes->delete('/users/delete/(:segment)', 'UsersController::delete/$1', ['filter' => 'master']);


$routes->get('/subjects', 'SubjectsController::index', ['filter' => 'admin']);
$routes->get('/subjects/create', 'SubjectsController::create', ['filter' => 'admin']);
$routes->post('/subjects/store', 'SubjectsController::store', ['filter' => 'admin']);
$routes->get('/subjects/edit/(:num)', 'SubjectsController::edit/$1', ['filter' => 'admin']);
$routes->post('/subjects/update/(:num)', 'SubjectsController::update/$1', ['filter' => 'admin']);
$routes->get('/subjects/delete/(:num)', 'SubjectsController::delete/$1', ['filter' => 'admin']);


$routes->get('/students', 'StudentsController::index', ['filter' => 'admin']);
$routes->get('/students/create', 'StudentsController::create', ['filter' => 'admin']);
$routes->post('/students/store', 'StudentsController::store', ['filter' => 'admin']);
$routes->get('/students/edit/(:num)', 'StudentsController::edit/$1', ['filter' => 'admin']);
$routes->post('/students/update/(:num)', 'StudentsController::update/$1', ['filter' => 'admin']);
$routes->get('/students/delete/(:num)', 'StudentsController::delete/$1', ['filter' => 'admin']);


$routes->get('/teachers', 'TeachersController::index', ['filter' => 'admin']);
$routes->get('/attendance_export', 'AttendanceExportController::export', ['filter' => 'teacher']);
$routes->get('/attendance_export/view', 'AttendanceExportController::view', ['filter' => 'teacher']);
$routes->get('/teachers/create', 'TeachersController::create', ['filter' => 'admin']);
$routes->post('/teachers/store', 'TeachersController::store', ['filter' => 'admin']);
$routes->get('/teachers/edit/(:num)', 'TeachersController::edit/$1', ['filter' => 'admin']);
$routes->post('/teachers/update/(:num)', 'TeachersController::update/$1', ['filter' => 'admin']);
$routes->get('/teachers/delete/(:num)', 'TeachersController::delete/$1', ['filter' => 'admin']);


$routes->get('/classes', 'ClassesController::index', ['filter' => 'admin']);
$routes->get('/classes/create', 'ClassesController::create', ['filter' => 'admin']);
$routes->post('/classes/store', 'ClassesController::store', ['filter' => 'admin']);
$routes->get('/classes/edit/(:num)', 'ClassesController::edit/$1', ['filter' => 'admin']);
$routes->post('/classes/update/(:num)', 'ClassesController::update/$1', ['filter' => 'admin']);
$routes->get('/classes/delete/(:num)', 'ClassesController::delete/$1', ['filter' => 'admin']);


$routes->get('/schedules', 'SchedulesController::index', ['filter' => 'admin']);
$routes->get('/schedules/create', 'SchedulesController::create', ['filter' => 'admin']);
$routes->post('/schedules/store', 'SchedulesController::store', ['filter' => 'admin']);
$routes->get('/schedules/edit/(:num)', 'SchedulesController::edit/$1', ['filter' => 'admin']);
$routes->post('/schedules/update/(:num)', 'SchedulesController::update/$1', ['filter' => 'admin']);
$routes->get('/schedules/delete/(:num)', 'SchedulesController::delete/$1', ['filter' => 'admin']);


$routes->get('/attendance_records', 'AttendanceRecordController::index', ['filter' => 'teacher']);
$routes->get('/attendance_records/edit/(:num)', 'AttendanceRecordController::edit/$1', ['filter' => 'teacher']);
$routes->post('/attendance_records/update/(:num)', 'AttendanceRecordController::update/$1', ['filter' => 'teacher']);
$routes->get('/reload-attendance', 'AttendanceRecordController::reloadAttendance', ['filter' => 'teacher']);
$routes->post('/filter-attendance', 'AttendanceRecordController::filterAttendance', ['filter' => 'teacher']);


$routes->get('/create', 'AttendanceRecordController::input', ['filter' => 'teacher']);
$routes->post('/save', 'AttendanceRecordController::save', ['filter' => 'teacher']);
$routes->get('/students/by-class/(:num)', 'StudentsController::byClass/$1', ['filter' => 'teacher']);
$routes->post('/search-attendance', 'AttendanceRecordController::searchAttendance', ['filter' => 'teacher']);
$routes->get('/attendance_export', 'AttendanceExportController::export', ['filter' => 'teacher']);
