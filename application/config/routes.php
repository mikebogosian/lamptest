<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'session';

$route['register'] = 'session/register';
$route['login'] = 'session/login';
$route['logout'] = 'session/logout';

$route['user/(:any)'] = 'users/userDetail/$1';
$route['addFriendship/(:any)'] = 'users/addFriendship/$1';
$route['removeFriendship/(:any)'] = 'users/removeFriendship/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
