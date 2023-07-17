<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::index');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->get('/forgotpassword', 'Auth::forgotpassword');
$routes->get('/changepassword', 'Auth::changepassword');
$routes->post('/resetpassword', 'Auth::resetpassword');
$routes->post('/verify/(:any)', 'Auth::verify/$1');
$routes->get('/checktoken', 'Auth::checktoken');

$routes->group('operator', ['filter' => 'role:Operator'], function ($routes) {
    $routes->get('dashboard', 'Operator\Dashboard::index');
    $routes->get('karyawan', 'Operator\Karyawan::index');
    
    $routes->get('karyawan/create', 'Operator\Karyawan::create');
    $routes->post('karyawan/create', 'Operator\Karyawan::save');
    $routes->get('karyawan/delete/(:num)', 'Operator\Karyawan::delete/$1');
    $routes->get('karyawan/edit/(:num)', 'Operator\Karyawan::edit/$1');
    $routes->post('karyawan/edit/(:num)', 'Operator\Karyawan::update/$1');
    $routes->post('karyawan/changepassword/(:num)', 'Operator\Karyawan::changepassword/$1');
    
    $routes->get('jabatan', 'Operator\Jabatan::index');
    $routes->post('jabatan', 'Operator\Jabatan::save');
    $routes->get('jabatan/delete/(:num)', 'Operator\Jabatan::delete/$1');
    $routes->post('jabatan/update/(:num)', 'Operator\Jabatan::update/$1');
    
    $routes->get('pengaturan', 'Operator\Pengaturan::index');
    $routes->post('pengaturan', 'Operator\Pengaturan::update');
    
    $routes->get('email', 'Operator\Email::index');
    $routes->post('email', 'Operator\Email::update');
    
    $routes->get('profil', 'Operator\Profil::index');
    $routes->post('profil', 'Operator\Profil::update');
    $routes->post('profil/changepassword', 'Operator\Profil::changepassword');
    
    $routes->get('jadwal', 'Operator\Jadwal::index');
    $routes->get('jadwal/create/(:num)', 'Operator\Jadwal::create/$1');
    $routes->post('jadwal/save', 'Operator\Jadwal::save');
    $routes->post('jadwal/update', 'Operator\Jadwal::update');
    
    $routes->get('libur', 'Operator\Jadwal::libur');
    $routes->post('libur', 'Operator\Jadwal::updatelibur');
    
    $routes->get('absensi', 'Operator\Absensi::index');
    $routes->get('absensi/pdf/(:num)/(:num)/(:num)', 'Operator\Absensi::pdf/$1/$2/$3');
    $routes->get('absensi/excel/(:num)/(:num)/(:num)', 'Operator\Absensi::excel/$1/$2/$3');
    $routes->get('absensi/cetak/(:num)/(:num)/(:num)', 'Operator\Absensi::cetak/$1/$2/$3');
    $routes->post('absensi/cari', 'Operator\Absensi::cari');
    
    $routes->get('rekap', 'Operator\Absensi::rekap');
    $routes->get('rekap/pdf/(:num)/(:num)', 'Operator\Absensi::rekappdf/$1/$2');
    $routes->get('rekap/excel/(:num)/(:num)', 'Operator\Absensi::rekapexcel/$1/$2');
    $routes->get('rekap/cetak/(:num)/(:num)', 'Operator\Absensi::cetakrekap/$1/$2');
    $routes->post('rekap/cari', 'Operator\Absensi::carirekap');
    
    $routes->get('monitoring', 'Operator\Absensi::monitoring');
    $routes->post('monitoring/cari', 'Operator\Absensi::carimonitoring');
    
    $routes->get('izin', 'Operator\Absensi::izin');
    $routes->post('izin/cari', 'Operator\Absensi::cariizin');
    $routes->post('izin/update/(:num)', 'Operator\Absensi::updateizin/$1');
    
    $routes->get('penggajian', 'Operator\Penggajian::index');
    $routes->post('penggajian', 'Operator\Penggajian::save');
    $routes->get('penggajian/delete/(:num)', 'Operator\Penggajian::delete/$1');
    $routes->post('penggajian/update/(:num)', 'Operator\Penggajian::update/$1');
    $routes->get('penggajian/pdf/(:num)/(:num)', 'Operator\Penggajian::pdf/$1/$2');
    $routes->get('penggajian/slip/(:num)/(:num)', 'Operator\Penggajian::slip/$1/$2');
    $routes->get('penggajian/excel/(:num)/(:num)', 'Operator\Penggajian::excel/$1/$2');
    $routes->get('penggajian/cetak/(:num)/(:num)', 'Operator\Penggajian::cetak/$1/$2');
    $routes->post('penggajian/cari', 'Operator\Penggajian::cari');
});

$routes->group('/', ['filter' => 'role:Guru'], function ($routes) {
    $routes->get('home', 'Guru\Home::index');

    $routes->get('absensi', 'Guru\Absensi::index');
    $routes->post('absensi/masuk', 'Guru\Absensi::masuk');
    $routes->post('absensi/pulang', 'Guru\Absensi::pulang');
    
    $routes->get('izin', 'Guru\Izin::index');
    $routes->get('izin/create', 'Guru\Izin::create');
    $routes->post('izin/create', 'Guru\Izin::save');
    $routes->post('izin/cari', 'Guru\Izin::cari');
    $routes->get('izin/edit/(:num)', 'Guru\Izin::edit/$1');
    $routes->post('izin/edit/(:num)', 'Guru\Izin::update/$1');
    
    $routes->get('riwayat', 'Guru\Riwayat::index');
    $routes->post('riwayat/cari', 'Guru\Riwayat::cari');

    $routes->get('profil', 'Guru\Profil::index');
    $routes->post('profil', 'Guru\Profil::update');
    $routes->post('profil/changepassword', 'Guru\Profil::changepassword');
});




/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}