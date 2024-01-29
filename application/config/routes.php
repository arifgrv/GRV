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
$route['Accounts'] = 'Counter_Controller/AccountsReport';
$route['reprint/(:any)/(:any)'] = 'Counter_Controller/reprint/$1/$1';

//Customer Controller
$route['customer'] = 'Customer_Controller/index';
$route['UserBookTicket/(:any)'] = 'Customer_Controller/ticket_Search/$1';
$route['UserSitPlan'] = 'Customer_Controller/SitPlan';
$route['UserAccounts'] = 'Customer_Controller/AccountsReport';
$route['UserReprint/(:any)/(:any)'] = 'Customer_Controller/reprint/$1/$1';
$route['PaymentVerification'] = 'Customer_Controller/PaymentVerification';

//sava data to DB
$route['saveGeneral'] = 'SavaInformation_Controller/saveGeneral';
$route['saveDiscount'] = 'SavaInformation_Controller/saveDiscount';



