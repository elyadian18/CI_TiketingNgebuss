<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['hapusPenumpang/(:any)'] = 'Admin/hapus_penumpang/$1';
$route['print'] ='Guest/print';
$route['Verifikasi/(:num)'] = 'Admin/verifikasiPembayaran/$1';
$route['admin/konfirmasi-pembayaran'] ='admin/keHalamanKonfirmasi';
$route['kirimKonfirmasi'] ='Guest/kirimKonfirmasi';

$route['cekKonfirmasi'] ='Guest/cekKonfirmasi';

$route['pembayaran'] ='Guest/keHalamanPembayaran';
$route['pesanTiket'] ='Guest/pesanTiket';
$route['pesan/(:any)'] ='Guest/pesan/$1';
$route['editJadwal'] = 'Admin/edit_jadwal';
$route['admin/dashboard/edit-jadwal/(:any)'] = 'Admin/keHalamanEditJadwal/$1';
$route['admin/dashboard/berangkat-jadwal/(:any)'] = 'Admin/prosesBerangkat/$1';
$route['hapusJadwal/(:any)'] = 'Admin/hapus_jadwal/$1';
$route['tambahJadwal'] ='admin/tambah_jadwal';
$route['admin/dashboard/data-penumpang'] ='admin/keHalamanPenumpang';
$route['admin/dashboard/kelola-jadwal'] ='admin/keHalamanKelolaJadwal';
$route['cariTiket'] ='Guest/cariTiket';

$route['editTerminal'] = 'Admin/edit_terminal';
$route['admin/dashboard/edit/(:any)'] = 'Admin/keHalamanEdit/$1';
$route['hapusTerminal/(:any)'] = 'Admin/hapus_terminal/$1';
$route['tambahTerminal'] = 'Admin/tambah_terminal';
$route['admin/dashboard'] = 'Admin/keHalamanDashboard';

$route['logout'] = 'Admin/logout';
$route['proseslogin'] = 'Admin/login';
$route['login'] = 'Admin/keHalamanLogin';

$route['konfirmasi'] = 'Guest/keHalamanKonfirmasi';
$route['default_controller'] = 'Guest/keHalamanDepan';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
