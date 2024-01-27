<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['accountsreport'] = 'Welcome/AccountsReport';
$route['AccountsDReport'] = 'Welcome/AccountsDReport';

$route['home'] = 'Welcome/index';
$route['admin'] = 'Welcome/admindashboard';
$route['counter'] = 'Welcome/counterdashboard';
$route['user'] = 'Welcome/userdashboard';

$route['newUser'] = 'Welcome/newUser';
$route['RegSave'] = 'Welcome/RegSave';
$route['login'] = 'Welcome/login';
$route['LgoCheck'] = 'Welcome/LgoCheck';
$route['logout'] = 'Welcome/logout';

$route['BookTicket'] = 'Welcome/ticket_Search';
$route['Discount'] = 'Welcome/D_ticket_Search';
$route['UserBookTicket'] = 'Welcome/User_ticket_Search';
$route['UserDiscount'] = 'Welcome/User_D_ticket_Search';

$route['SitPlan'] = 'Welcome/TicketBookingService';
$route['DiscountSitPlan'] = 'Welcome/DisCountTicketBookingService';
$route['UserSitPlan'] = 'Welcome/UserTicketBookingService';
$route['UserDiscountSitPlan'] = 'Welcome/UserDisCountTicketBookingService';

$route['makeResurve'] = 'Welcome/makeResurve';
$route['UserMakeResurve'] = 'Welcome/UserMakeResurve';
$route['DiscountMakeResurve'] = 'Welcome/DiscountMakeResurve';
$route['UserDiscountMakeResurve'] = 'Welcome/UserDiscountMakeResurve';

$route['reprint/(:any)'] = 'Welcome/reprint/$1';
$route['dreprint/(:any)'] = 'Welcome/dreprint/$1';