<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
  | -------------------------------------------------------------------------
  | URI ROUTING
  | -------------------------------------------------------------------------
  | This file lets you re-map URI requests to specific controller functions.
  |
  | Typically there is a one-to-one relationship between a URL string
  | and its corresponding controller class/method. The segments in a
  | URL normally follow this pattern:
  |
  |	example.com/class/method/id/
  |
  | In some instances, however, you may want to remap this relationship
  | so that a different class/function is called than the one
  | corresponding to the URL.
  |
  | Please see the user guide for complete details:
  |
  |	http://codeigniter.com/user_guide/general/routing.html
  |
  | -------------------------------------------------------------------------
  | RESERVED ROUTES
  | -------------------------------------------------------------------------
  |
  | There area two reserved routes:
  |
  |	$route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the "welcome" class
  | would be loaded.
  |
  |	$route['404_override'] = 'errors/page_missing';
  |
  | This route will tell the Router what URI segments to use if those provided
  | in the URL cannot be matched to a valid route.
  |
 */
$route['default_controller'] = 'home/index';
$route['404_override'] = '';
$route['privacy'] = 'page/index';
$route['term'] = 'page/index';
$route['about'] = 'page/index';
$route['learn'] = 'page/index';
$route['stacksguide_ads/cart/(:any)'] = 'stacksguide_ads/cart/$1';
$route['stacksguide_ads/remove_item_from_cart/(:any)'] = 'stacksguide_ads/remove_item_from_cart/$1/$2';

/* admin */
$route['admin'] = 'admin/index';
$route['admin/signup'] = 'admin/signup';
$route['admin/create_member'] = 'admin/create_member';
$route['admin/login'] = 'admin/index';
$route['admin/logout'] = 'admin/logout';
$route['admin/login/validate_credentials'] = 'admin/validate_credentials';

$route['admin/category'] = 'admin_category/index';
$route['admin/category/add'] = 'admin_category/add';
$route['admin/category/update'] = 'admin_category/update';
$route['admin/category/update/(:any)'] = 'admin_category/update/$1';
$route['admin/category/delete/(:any)'] = 'admin_category/delete/$1';
$route['admin/category/(:any)'] = 'admin_category/index/$1'; //$1 = page number


$route['admin/escorts'] = 'admin_escorts/index';
$route['admin/escorts/add'] = 'admin_escorts/add';
$route['admin/escorts/update'] = 'admin_escorts/update';
$route['admin/escorts/update/(:any)'] = 'admin_escorts/update/$1';
$route['admin/escorts/delete/(:any)'] = 'admin_escorts/delete/$1';
$route['admin/escorts/(:any)'] = 'admin_escorts/index/$1'; //$1 = page number

$route['admin/user'] = 'admin_user/index';
$route['admin/user/add'] = 'admin_user/add';
$route['admin/user/update'] = 'admin_user/update';
$route['admin/user/exportcsv'] = 'admin_user/exportcsv';
$route['admin/user/update/(:any)'] = 'admin_user/update/$1';
$route['admin/user/delete/(:any)'] = 'admin_user/delete/$1';
$route['admin/user/(:any)'] = 'admin_user/index/$1'; //$1 = page number

$route['admin/cms'] = 'admin_cms/index';
$route['admin/cms/add'] = 'admin_cms/add';
$route['admin/cms/update'] = 'admin_cms/update';
$route['admin/cms/update/(:any)'] = 'admin_cms/update/$1';
$route['admin/cms/delete/(:any)'] = 'admin_cms/delete/$1';
$route['admin/cms/(:any)'] = 'admin_cms/index/$1'; //$1 = page number


$route['admin/advertisement'] = 'admin_advertisement/index';
$route['admin/advertisement/add'] = 'admin_advertisement/add';
$route['admin/advertisement/update'] = 'admin_advertisement/update';
$route['admin/advertisement/update/(:any)'] = 'admin_advertisement/update/$1';
$route['admin/advertisement/delete/(:any)'] = 'admin_advertisement/delete/$1';
$route['admin/advertisement/(:any)/(:any)'] = 'admin_advertisement/index/$1';
//$route['ajax_call/set_session_language_shortcode/(:any)'] = 'ajax_call/set_session_language_shortcode/$1';

$route['admin/affiliates'] = 'admin_affiliates/index';
$route['admin/affiliates/add'] = 'admin_affiliates/add';
$route['admin/affiliates/update'] = 'admin_affiliates/update';
$route['admin/affiliates/update/(:any)'] = 'admin_affiliates/update/$1';
$route['admin/affiliates/delete/(:any)'] = 'admin_affiliates/delete/$1';
$route['admin/affiliates/(:any)'] = 'admin_affiliates/index/$1'; //$1 = page number

$route['admin/blog'] = 'admin_blog/index';
$route['admin/blog/add'] = 'admin_blog/add';
$route['admin/blog/update'] = 'admin_blog/update';
$route['admin/blog/update/(:any)'] = 'admin_blog/update/$1';
$route['admin/blog/delete/(:any)'] = 'admin_blog/delete/$1';
$route['admin/blog/clone/(:any)'] = 'admin_blog/do_clone/$1';
$route['admin/blog/delete_image/(:any)'] = 'admin_blog/delete_image/$1';
$route['admin/blog/(:any)'] = 'admin_blog/index/$1'; //$1 = page number
$route['admin/blog/(:any)'] = 'admin_blog/index/$1';

$route['admin/country'] = 'admin_country/index';
$route['admin/country/add'] = 'admin_country/add';
$route['admin/country/update'] = 'admin_country/update';
$route['admin/country/update/(:any)'] = 'admin_country/update/$1';
$route['admin/country/delete/(:any)'] = 'admin_country/delete/$1';
$route['admin/country/(:any)'] = 'admin_country/index/$1';

$route['admin/state'] = 'admin_state/index';
$route['admin/state/add'] = 'admin_state/add';
$route['admin/state/update'] = 'admin_state/update';
$route['admin/state/update/(:any)'] = 'admin_state/update/$1';
$route['admin/state/delete/(:any)'] = 'admin_state/delete/$1';
$route['admin/state/(:any)'] = 'admin_state/index/$1';

$route['admin/city'] = 'admin_city/index';
$route['admin/city/add'] = 'admin_city/add';
$route['admin/city/update'] = 'admin_city/update';
$route['admin/city/update/(:any)'] = 'admin_city/update/$1';
$route['admin/city/delete/(:any)'] = 'admin_city/delete/$1';
$route['admin/city/(:any)'] = 'admin_city/index/$1';

$route['admin/webmag'] = 'admin_webmag/index';
$route['admin/webmag/add'] = 'admin_webmag/add';
$route['admin/webmag/update'] = 'admin_webmag/update';
$route['admin/webmag/update/(:any)'] = 'admin_webmag/update/$1';
$route['admin/webmag/delete/(:any)'] = 'admin_webmag/delete/$1';
$route['admin/webmag/(:any)'] = 'admin_webmag/index/$1';

$route['admin/external_link'] = 'admin_external_link/index';
$route['admin/external_link/add'] = 'admin_external_link/add';
$route['admin/external_link/update'] = 'admin_external_link/update';
$route['admin/external_link/update/(:any)'] = 'admin_external_link/update/$1';
$route['admin/external_link/delete/(:any)'] = 'admin_external_link/delete/$1';
$route['admin/external_link/(:any)'] = 'admin_external_link/index/$1';

$route['admin/events'] = 'admin_events/index';
$route['admin/events/add'] = 'admin_events/add';
$route['admin/events/update'] = 'admin_events/update';
$route['admin/events/update/(:any)'] = 'admin_events/update/$1';
$route['admin/events/delete/(:any)'] = 'admin_events/delete/$1';
$route['admin/events/(:any)'] = 'admin_events/index/$1';

$route['admin/build_ads'] = 'admin_build_ads/index';
$route['admin/build_ads/add'] = 'admin_build_ads/add';
$route['admin/build_ads/update'] = 'admin_build_ads/update';
$route['admin/build_ads/update/(:any)'] = 'admin_build_ads/update/$1';
$route['admin/build_ads/delete/(:any)'] = 'admin_build_ads/delete/$1';
$route['admin/build_ads/(:any)'] = 'admin_build_ads/index/$1';

$route['admin/webcam'] = 'admin_webcam/index';
$route['admin/webcam/add'] = 'admin_webcam/add';
$route['admin/webcam/update'] = 'admin_webcam/update';
$route['admin/webcam/update/(:any)'] = 'admin_webcam/update/$1';
$route['admin/webcam/delete/(:any)'] = 'admin_webcam/delete/$1';
$route['admin/webcam/(:any)'] = 'admin_webcam/index/$1';

$route['admin/dashboard'] = 'dashboard/index';

$route['signup'] = 'signup/index';
$route['signup/(:num)'] = 'signup/index/$1';
//$route['blog/(:num)/(:num)'] = 'newsletter/index/$1/$2';
$route['signup/specific/(:any)'] = 'signup/specific/$1';


$route['escorts'] = 'escorts/index';
$route['escorts/(:num)'] = 'escorts/index/$1';
//$route['escorts/escort_detail/(:any)/(:any)/(:any)'] = 'escorts/escort_detail/$1/$2/$3';
$route['escorts/(:any)'] = 'escorts/index/$1';


$route['admin/warning_disclaimer'] = 'admin_warning_disclaimer/index';
$route['admin/warning_disclaimer/add'] = 'admin_warning_disclaimer/add';
$route['admin/warning_disclaimer/update'] = 'admin_warning_disclaimer/update';
$route['admin/warning_disclaimer/update/(:any)'] = 'admin_warning_disclaimer/update/$1';
$route['admin/warning_disclaimer/delete/(:any)'] = 'admin_warning_disclaimer/delete/$1';
$route['admin/warning_disclaimer/(:any)'] = 'admin_warning_disclaimer/index/$1';

$route['admin/footer'] = 'admin_footer/index';
$route['admin/footer/add'] = 'admin_footer/add';
$route['admin/footer/update'] = 'admin_footer/update';
$route['admin/footer/update/(:any)'] = 'admin_footer/update/$1';
$route['admin/footer/delete/(:any)'] = 'admin_footer/delete/$1';
$route['admin/footer/(:any)'] = 'admin_footer/index/$1';

$route['admin/membership_price'] = 'admin_membership_price/index';
$route['admin/membership_price/add'] = 'admin_membership_price/add';
$route['admin/membership_price/update'] = 'admin_membership_price/update';
$route['admin/membership_price/update/(:any)'] = 'admin_membership_price/update/$1';
$route['admin/membership_price/delete/(:any)'] = 'admin_membership_price/delete/$1';
$route['admin/membership_price/(:any)'] = 'admin_membership_price/index/$1';

$route['admin/comment'] = 'admin_comment/index';
$route['admin/comment/status/(:any)'] = 'admin_comment/status/$1';
$route['admin/comment/delete/(:any)'] = 'admin_comment/delete/$1';
$route['admin/comment/update/(:any)'] = 'admin_comment/update/$1';
$route['admin/comment/(:any)'] = 'admin_comment/index/$1';
/*/
/* End of file routes.php */
/* Location: ./application/config/routes.php */