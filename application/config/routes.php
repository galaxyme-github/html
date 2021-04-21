<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'site';
$route['404_override'] = '';
$route['login'] = 'auth/index';
$route['logout'] = 'auth/logout';
$route['translate_uri_dashes'] = FALSE;

$route['us/(.+)'] = 'site/state_foodtrucks/us/$1';
$route['home'] = 'site';
$route['about-us'] = 'site/about';
$route['contact-us'] = 'site/contact';
$route['terms'] = 'site/terms';
$route['help-center'] = 'site/help_center';
$route['how-it-works/(:any)'] = 'site/how_it_works/$1';
$route['bft-guarantee'] = 'site/guarantee';
$route['become-bft-member'] = 'site/become_bft_member';

/* control panel routes */
$route['bft-member/pending-applications'] = 'member/pending_applications';
$route['bft-member/processed-applications'] = 'member/processed_applications';
$route['bft-member/application-details/(.+)'] = 'member/application_details/$1/$2';
$route['settings/account-security'] = 'settings/account_security';
$route['my-foodtrucks'] = 'foodtruck/all';
$route['catering-menu'] = 'menu/index';
$route['foodtruck/page-builder/(:num)'] = 'foodtruck/page_editor/$1';
$route['foodtruck/page-builder/preview/(:num)'] = 'foodtruck/page_preview/$1';