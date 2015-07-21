<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "main";
$route['404_override'] = '';
$route['login'] = "/main/login";
$route['register'] = "/main/register";
$route['mainpage'] = "/main/mainpage";
$route['products'] = "/products";
$route['show'] = "/main/show";
$route['add'] = "/main/add";
$route['showproduct/(:any)'] = "products/show/$1";
$route['addproduct/(:any)'] = "products/add/$1";
//end of routes.php
