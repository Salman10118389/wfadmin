<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['translate_uri_dashes'] = FALSE;
$route['default_controller'] = 'admin';


$route['admin'] = 'admin/index';
$route['admin/buka-kunci'] = 'admin/buka_kunci';
$route['admin/cek-login'] = 'admin/cek_login';
$route['admin/simpan-gambar'] = 'admin/simpan_gambar';
$route['admin/cek-lupa-password'] = 'admin/cek_lupa_password';
$route['admin/tambah-data'] = 'admin/tambah_data';
$route['admin/hapus-data'] = 'admin/hapus_data';

$route['admin/upload-menu-all/(:any)'] = 'admin/upload_menu_all/$1';
$route['admin/inactive-menu-admin/(:any)/(:any)'] = 'admin/inactive_menu_all/$1/$2';
$route['admin/active-menu-admin/(:any)/(:any)'] = 'admin/active_menu_all/$1/$2';
$route['admin/hapus-menu-admin/(:any)/(:any)/(:any)/(:any)'] = 'admin/hapus_menu_all/$1/$2/$3/$4';

$route['admin/(:any)'] = 'admin/view/$1';
$route['admin/(:any)/(:any)'] = 'admin/views/$1/$2';
$route['admin/(:any)/(:any)/(:any)'] = 'admin/viewss/$1/$2/$3';
$route['admin/(:any)/(:any)/(:any)/(:any)'] = 'admin/viewsss/$1/$2/$3/$4';

// ------------------------------------------------------Api CRUD Data

$route['api/ambil-menu-admin'] = 'api/ambil_menu_admin';
$route['api/tambah-menu-admin'] = 'api/tambah_menu_admin';
$route['api/hapus-menu-admin'] = 'api/hapus_menu_admin';
$route['api/ubah-menu-admin'] = 'api/ubah_menu_admin';

$route['api/ambil-submenu-admin/(:any)'] = 'api/ambil_submenu_admin/$1';
$route['api/ambil-submenu-web/(:any)'] = 'api/ambil_submenu_web/$1';


$route['api/tambah-data/(:any)'] = 'api/api_tambah_data/$1';
$route['api/ubah-data/(:any)'] = 'api/api_ubah_data/$1';
$route['api/hapus-data/(:any)'] = 'api/api_hapus_data/$1';



$route['api/baca-data/(:any)/(:any)/(:any)'] = 'api/api_baca_data/$1/$2/$3';



$route['login/cek-login'] = 'login/cek_login';
$route['login/(:any)'] = 'login/view/$1';

// --------------------------------------------------------- Email
$route['email'] = 'menu/email_view';
// --------------------------------------------------------- Iframe
$route['iframe/(:any)'] = 'admin/iframe/$1';


$route['(:any)'] = 'web/view/$1';
$route['404_override'] = 'web/error404';

