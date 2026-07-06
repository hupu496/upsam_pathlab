<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['validatelogin']='welcome/validatelogin';
$route['dashboard']='welcome/dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Main Routes
$route['login'] = 'auth/login';
$route['dashboard'] = 'dashboard/index';

// Masters Routes
$route['masters'] = 'masters/index';
$route['masters/lab'] = 'masters/lab';
$route['masters/center'] = 'masters/center';
$route['masters/doctor'] = 'masters/doctor';
$route['masters/patient'] = 'masters/patient';
$route['masters/test'] = 'masters/test';
// Workflow Routes
$route['patients/enter'] = 'patients/enter';
$route['samples/request'] = 'samples/request';
$route['reports'] = 'reports/index';
$route['reports/create'] = 'reports/create';
$route['reports/print/(:any)'] = 'reports/print/$1';