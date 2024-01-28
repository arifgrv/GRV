<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'homepage';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//home controller
$route['homepage'] = 'Homepage/index';

//login controller
$route['login'] = 'Login_Controller/login';
$route['is_logged_in'] = 'Login_Controller/is_logged_in';
$route['LgoCheck'] = 'Login_Controller/LgoCheck';
$route['logout'] = 'Login_Controller/logout';


// admin controller
$route['admin'] = 'Admin_Controller/index';


//Counter Controller
$route['counter'] = 'Counter_Controller/index';
$route['BookTicket/(:any)'] = 'Counter_Controller/ticket_Search/$1';
$route['SitPlan'] = 'Counter_Controller/SitPlan';


//Customer Controller
$route['customer'] = 'Customer_Controller/index';

//sava data to DB
$route['Save'] = 'SavaInformation_Controller/index';



