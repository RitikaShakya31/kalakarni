<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'web';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['register'] = 'Web/register';
$route['login'] = 'Web/login';
$route['logincode'] = 'Web/logincode';

$route['checkout'] = 'Web/checkout';
$route['guest-checkout/(:any)'] = 'Web/guest_checkout/$1/';
$route['cart'] = 'Web/cart';
$route['search'] = 'Web/search';
$route['about'] = 'Web/about';

$route['contact'] = 'Web/contact';
$route['my-orders'] = 'Web/my_orders';
$route['my-profile'] = 'Web/my_profile';
$route['logout'] = 'Web/logout';

$route['privacy-policy'] = 'Web/privacypolicy';
$route['term-and-condition'] = 'Web/termscondition';
$route['faq'] = 'Web/faq';

$route['type/(:any)'] = 'Web/product_list/$1';
$route['product/(:any)/(:any)'] = 'Web/product/$1/$2';
$route['product_details/(:any)/(:any)'] = 'Web/product_view/$1/$2';

$route['payment_failed'] = 'Web/payment_closed';
