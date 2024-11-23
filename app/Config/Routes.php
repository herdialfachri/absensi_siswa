<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/subjects', 'SubjectsController::index');
$routes->get('/students', 'StudentsController::index');
$routes->get('/teachers', 'TeachersController::index');
$routes->get('/classes', 'ClassesController::index');

