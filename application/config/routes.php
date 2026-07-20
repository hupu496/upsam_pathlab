<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['validatelogin']='welcome/validatelogin';
$route['dashboard']='welcome/dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Masters Routes
$route['masters'] = 'masters/index';
$route['masters/lab'] = 'masters/lab';
$route['masters/lab_delete'] = 'masters/lab_delete';
$route['masters/center'] = 'masters/center';
$route['masters/add_center'] = 'masters/add_center';
$route['masters/center_delete'] = 'masters/center_delete';

$route['masters/doctor'] = 'masters/doctor';
$route['masters/patient'] = 'masters/patient';
$route['masters/test'] = 'masters/test';
$route['masters/lab_add'] = 'masters/lab_add';  
$route['masters/lab_update'] = 'masters/lab_update';      
$route['masters/center_update'] = 'masters/center_update';  
// Workflow Routes
// ==================== PATIENT REGISTRATION ROUTES ====================
$route['admin/patient'] = 'admin/patient/index';
$route['admin/patient/index'] = 'admin/patient/index';
$route['admin/patient/save'] = 'admin/patient/save';
$route['admin/patient/add'] = 'admin/patient/add';
$route['admin/patient/edit/(:num)'] = 'admin/patient/edit/$1';
$route['admin/patient/update/(:num)'] = 'admin/patient/update/$1';
$route['admin/patient/delete/(:num)'] = 'admin/patient/delete/$1';
$route['admin/patient/view/(:num)'] = 'admin/patient/view/$1';
$route['admin/patient/get/(:num)'] = 'admin/patient/get/$1';
$route['admin/patient/print/(:num)'] = 'admin/patient/print/$1';
$route['admin/patient/export'] = 'admin/patient/export';
$route['admin/patient/search'] = 'admin/patient/search';
$route['admin/patient/filter'] = 'admin/patient/filter';
$route['admin/patient/bulk-delete'] = 'admin/patient/bulk_delete';
$route['admin/patient/status/(:num)/(:any)'] = 'admin/patient/update_status/$1/$2';

// ==================== APPOINTMENT ROUTES ====================
$route['admin/appointments'] = 'admin/appointments/index';
$route['admin/appointments/add'] = 'admin/appointments/add';
$route['admin/appointments/edit/(:num)'] = 'admin/appointments/edit/$1';
$route['admin/appointments/delete/(:num)'] = 'admin/appointments/delete/$1';
$route['admin/appointments/view/(:num)'] = 'admin/appointments/view/$1';
$route['admin/appointments/get/(:num)'] = 'admin/appointments/get/$1';
$route['admin/appointments/status/(:num)/(:any)'] = 'admin/appointments/update_status/$1/$2';
$route['admin/appointments/calendar'] = 'admin/appointments/calendar';
$route['admin/appointments/export'] = 'admin/appointments/export';

// ==================== TEST REQUESTS ROUTES ====================
$route['admin/test_requests'] = 'admin/test_requests/index';
$route['admin/test_requests/add'] = 'admin/test_requests/add';
$route['admin/test_requests/edit/(:num)'] = 'admin/test_requests/edit/$1';
$route['admin/test_requests/delete/(:num)'] = 'admin/test_requests/delete/$1';
$route['admin/test_requests/view/(:num)'] = 'admin/test_requests/view/$1';
$route['admin/test_requests/get/(:num)'] = 'admin/test_requests/get/$1';
$route['admin/test_requests/status/(:num)/(:any)'] = 'admin/test_requests/update_status/$1/$2';
$route['admin/test_requests/print/(:num)'] = 'admin/test_requests/print/$1';
$route['admin/test_requests/export'] = 'admin/test_requests/export';

// ==================== REPORT ROUTES ====================
$route['admin/reports'] = 'admin/reports/index';
$route['admin/reports/daily'] = 'admin/reports/daily';
$route['admin/reports/monthly'] = 'admin/reports/monthly';
$route['admin/reports/yearly'] = 'admin/reports/yearly';
$route['admin/reports/doctor_wise'] = 'admin/reports/doctor_wise';
$route['admin/reports/test_wise'] = 'admin/reports/test_wise';
$route['admin/reports/patient_wise'] = 'admin/reports/patient_wise';
$route['admin/reports/center_wise'] = 'admin/reports/center_wise';
$route['admin/reports/lab_wise'] = 'admin/reports/lab_wise';
$route['admin/reports/export/(:any)'] = 'admin/reports/export/$1';
$route['admin/reports/generate/(:any)'] = 'admin/reports/generate/$1';

// ==================== SETTINGS ROUTES ====================
$route['admin/settings'] = 'admin/settings/index';
$route['admin/settings/profile'] = 'admin/settings/profile';
$route['admin/settings/profile/update'] = 'admin/settings/update_profile';
$route['admin/settings/system'] = 'admin/settings/system';
$route['admin/settings/system/update'] = 'admin/settings/update_system';
$route['admin/settings/backup'] = 'admin/settings/backup';
$route['admin/settings/backup/create'] = 'admin/settings/create_backup';
$route['admin/settings/backup/restore/(:any)'] = 'admin/settings/restore_backup/$1';
$route['admin/settings/backup/download/(:any)'] = 'admin/settings/download_backup/$1';
$route['admin/settings/backup/delete/(:any)'] = 'admin/settings/delete_backup/$1';
$route['admin/settings/users'] = 'admin/settings/users';
$route['admin/settings/users/add'] = 'admin/settings/add_user';
$route['admin/settings/users/edit/(:num)'] = 'admin/settings/edit_user/$1';
$route['admin/settings/users/delete/(:num)'] = 'admin/settings/delete_user/$1';
$route['admin/settings/users/status/(:num)/(:any)'] = 'admin/settings/update_user_status/$1/$2';

// ==================== MASTER MANAGEMENT (Combined) ====================
$route['admin/master'] = 'admin/master_management/index';
$route['admin/master_management'] = 'admin/master_management/index';