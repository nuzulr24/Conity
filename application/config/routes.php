<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth/controller_ctl/index';
$route['home'] = 'main/welcome/index';

// user routes
$route['user']  = 'user/controller_ctl';
$route['user/(:any)'] = 'user/controller_ctl/$1';
$route['user/(:any)/(:any)'] = 'user/controller_ctl/$1/$2';

// auth routes
$route['auth']  = 'auth/controller_ctl';
$route['auth/(:any)'] = 'auth/controller_ctl/$1';
$route['auth/(:any)/(:any)'] = 'auth/controller_ctl/$1/$2';

// api user routes
$route['apiUser']  = 'api/apiUser';
$route['apiUser/(:any)'] = 'api/apiUser/$1';
$route['apiUser/(:any)/(:any)'] = 'api/apiUser/$1/$2';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
