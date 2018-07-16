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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['.+(welcome)']='$1';

$route['admin']='AN_admin';
$route['admin/(.+)']='AN_admin/$1';




$route['artikel']='semua_artikel/semua';
$route['artikel/(\d+)']='semua_artikel/semua/$1';

$route['artikel/(\d+)[-\w]+']='semua_artikel/detail/$1';

$route['article']='semua_artikel/semua';
$route['article/(\d+)']='semua_artikel/semua/$1';

$route['article/(\d+)[-\w]+']='semua_artikel/detail/$1';

$route['galeri']='semua_galeri/semua';
$route['galeri/(\d+)']='semua_galeri/semua/$1';

$route['galeri/(\d+)[-\w]+']='semua_galeri/detail/$1';

$route['blog']='semua_artikel/semua';
$route['blog/(\d+)']='semua_artikel/semua/$1';

$route['blog/(\d+)[-\w]+']='semua_artikel/detail/$1';

$route['faq/(\d+)[-\w]+$']='faq/detail/$1';

$route['agenda/(\d+)[-\w]+$']='agenda/detail/$1';
$route['agenda']='agendas/list_agenda/0';
$route['agenda/(\d+)/?$']='agendas/list_agenda/$1';

$route['download/(\d+)[-\w]+$']='download/detail/$1';
$route['download']='downloads/list_download/0';
$route['download/(\d+)/?$']='downloads/list_download/$1';

$route['kategori/(\d+)/?$']='kategori_artikel/detail/$1';
$route['kategori/(\d+)/(\d+)$']='kategori_artikel/detail/$1/$2';

$route['kategori/(\d+)[-\w]+$']='kategori_artikel/detail/$1';
$route['kategori/(\d+)[-\w]+/(\d+)$']='kategori_artikel/detail/$1/$2';


$route['category/(\d+)/?$']='kategori_artikel/detail/$1';
$route['category/(\d+)/(\d+)$']='kategori_artikel/detail/$1/$2';

$route['category/(\d+)[-\w]+$']='kategori_artikel/detail/$1';
$route['category/(\d+)[-\w]+/(\d+)$']='kategori_artikel/detail/$1/$2';


$route['kategori-galeri/(\d+)/?$']='kategori_galeri/detail/$1';
$route['kategori-galeri/(\d+)/(\d+)$']='kategori_galeri/detail/$1/$2';

$route['kategori-galeri/(\d+)[-\w]+$']='kategori_galeri/detail/$1';
$route['kategori-galeri/(\d+)[-\w]+/(\d+)$']='kategori_galeri/detail/$1/$2';

$route['tag/(\d+)/?$']='tags_artikel/detail/$1';
$route['tag/(\d+)/(\d+)$']='tags_artikel/detail/$1/$2';

$route['tag/(\d+)[-\w]+$']='tags_artikel/detail/$1';
$route['tag/(\d+)[-\w]+/(\d+)$']='tags_artikel/detail/$1/$2';


$route['label/(\d+)/?$']='tags_artikel/detail/$1';
$route['label/(\d+)/(\d+)$']='tags_artikel/detail/$1/$2';

$route['label/(\d+)[-\w]+$']='tags_artikel/detail/$1';
$route['label/(\d+)[-\w]+/(\d+)$']='tags_artikel/detail/$1/$2';

$route['page/(\d+)/?$']='page/detail/$1';
$route['page/(\d+)[-\w]+$']='page/detail/$1';


$route["about-us"]="about_us";
$route["tentang-kami"]="about_us";

$route["syarat-dan-ketentuan"]="syarat_ketentuan";
$route["terms-and-conditions"]="syarat_ketentuan";
