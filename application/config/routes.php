<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['posts/index']= "posts";
$route['posts/create']= "posts/create";
$route['posts/(:any)'] = "posts/show/$1";
$route['default_controller'] = 'pages';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
