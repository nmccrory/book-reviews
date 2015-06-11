<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'processes';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['register'] = 'processes/register';
$route['login'] = 'processes/login';
$route['logout'] = 'processes/logout';
$route['books'] = 'processes/book_route';
$route['books/add'] = 'books/showform';
$route['books/(:any)'] = 'books/showBook/$1';
$route['addbook'] = 'books/addBookandRev';
$route['add/(:any)'] = 'books/addReview/$1';
$route['users/(:any)'] = 'processes/showUser/$1';
?>