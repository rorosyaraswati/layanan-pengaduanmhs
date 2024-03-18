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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'loginmhs';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['pengaduan_view'] = 'Pengaduan_mhs/index';
$route['edit_png/(:any)'] = 'Pengaduan_mhs/edit_png/$1';
$route['delete_pengaduan/(:any)'] = 'Pengaduan_mhs/delete_pengaduan/$1';
$route['save_pengaduan'] = 'Pengaduan_mhs/save_pengaduan';
$route['update_pengaduan/(:num)'] = 'Pengaduan_mhs/update_pengaduan/$1';


$route['keluhan_view'] = 'Keluhan_mhs/index';
$route['keluhan/add'] = 'Keluhan_mhs/add_keluhan';
$route['keluhan/save'] = 'Keluhan_mhs/save_keluhan';
$route['save_keluhan'] = 'Keluhan_mhs/save_keluhan';
$route['keluhan/delete/(:any)'] = 'Keluhan_mhs/delete_keluhan/$1';
$route['keluhan/edit/(:any)'] = 'Keluhan_mhs/edit_keluhan/$1';
$route['keluhan/update/(:any)'] = 'Keluhan_mhs/update_keluhan/$1';

//...

$route['login-admin'] = 'LoginController/index'; 
$route['authenticate'] = 'LoginController/checkLogin';
$route['logout'] = 'LoginController/logout';
$route['dashboard'] = 'DashboardController/index'; 
$route['register'] = 'LoginController/register'; 

//...
$route['loginmhs'] = 'mhs/loginMHS/index';
$route['pengaduan'] = 'mhs/administrasi_ctl/index';
//...


$route['profile_view'] = 'ProfileController/profile_view';
$route['save_profile'] = 'ProfileController/save_profile';
$route['update_profile'] = 'ProfileController/update_profile';

$route['akademik_view'] = 'akademik_ctl/index';
$route['save_akademik'] = 'akademik_ctl/save_akademik';
$route['generate_pdf'] = 'akademik_ctl/generatePDF';


$route['generate-pdf'] = 'PDF/pdf_akademik/generatePdf';
$route['lp_akademik'] = 'laporan_akd/index';

$route['generate-pdf'] = 'PDF/pdf_infrastruktur/generatePdf';
$route['lp_infrastruktur'] = 'laporan_inf/index';

$route['generate-pdf'] = 'PDF/pdf_administrasi/generatePdf';
$route['lp_administrasi'] = 'laporan_adm/index';

$route['generate-pdf'] = 'PDF/pdf_keamanan/generatePdf';
$route['lp_keamanan'] = 'laporan_kea/index';




$route['infrastruktur_view'] = 'infrastruktur_ctl/index';
$route['save_infrastruktur'] = 'infrastruktur_ctl/save_infrastruktur';


$route['keamanan_view'] = 'keamanan_ctl/index';
$route['save_keamanan'] = 'keamanan_ctl/save_keamanan';

$route['login_view'] = 'login_ctl/index';
$route['logout'] = 'login_ctl/logout';

$route['administrasi_view'] = 'administrasi_ctl/index';
$route['save_administrasi'] = 'administrasi_ctls/save_administrasi';





$route['beranda/(:any)'] = 'Beranda/beranda/$1';
