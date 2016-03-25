<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'pages';
$route['article/(:any)']='pages/article/$1';
$route['section/(:any)']='pages/section/$1';
$route['contactus']='pages/contactus';
$route['pages/index']='pages/index';
$route['pages/section']='pages/section/$1';
$route['pages/article']='pages/article/$1';
$route['pages/about']='pages/about';
$route['404_override'] = '';
$route['pages/index']='pages/index';
$route['neko-admin/index']='admincontroller/index';
$route['neko-admin/inbox']='admincontroller/inbox';
$route['neko-admin/posts']='admincontroller/posts';
$route['neko-admin/pages']='admincontroller/pages';
$route['neko-admin/dashboard']='admincontroller/dashboard';
$route['neko-admin/editpage/(:any)']='admincontroller/editpage/$1';
$route['neko-admin/view/(:any)']='admincontroller/view/$1';
$route['neko-admin/edit/(:any)']='admincontroller/edit/$1';
$route['neko-admin/siteinfo']='admincontroller/siteinfo';
$route['neko-admin/logout']='admincontroller/logout';
$route['neko-admin/addblog']='admincontroller/addblog';
$route['neko-admin/addpage']='admincontroller/addpage';
$route['neko-admin/login']='admincontroller/login';
$route['neko-admin/showmessage/(:num)']='admincontroller/showmessage/$1';
$route['neko-admin']='admincontroller/index';
$route['neko-admin/deletemessage/(:num)']='admincontroller/deletemessage/$1';
$route['neko-admin/deletearticle/(:any)']='admincontroller/deletearticle/$1';
$route['neko-admin/users']='admincontroller/users';
$route['neko-admin/forgotpassword']='admincontroller/forgotpassword';
$route['neko-admin/comments'] = 'admincontroller/comments';
$route['neko-admin/commentaction']='admincontroller/commentaction';
$route['neko-admin/viewcomment']='admincontroller/viewcomment';
$route['translate_uri_dashes'] = FALSE;
