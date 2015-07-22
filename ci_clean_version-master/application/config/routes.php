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
$route['addproduct/(:any)'] = "carts/add/$1";
$route['cart'] = "carts";
$route['delete/(:any)'] = "carts/delete/$1";
$route['addorder/(:any)'] = "orders/create/$1";
$route['updatecart'] = "carts/update";
//end of routes.php
