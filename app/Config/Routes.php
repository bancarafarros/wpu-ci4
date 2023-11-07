<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
// $routes->get('/', 'Home::coba');
// $routes->get('/Coba', 'Coba::index');
$routes->get('/Coba/index', 'Coba::index');
$routes->get('/Coba', 'Coba::about');
$routes->get('/Coba/about', 'Coba::about');
// $routes->get('/Coba/about', 'Coba::about');
// $routes->get('/Coba', function () { //panggil fungsi langsung di routes
//     echo "Hello World!";
// });
$routes->get('/Coba/about/(:any)/(:any)', 'Coba::about/$1/$2'); // mengambil input dari url
$routes->get('/Coba/produk/(:num)', 'Coba::produk/$1'); // mengambil input dari url
$routes->get('/Coba/(:num)', 'Coba::produk/$1'); // mengambil input dari url

$routes->get('/Users', 'admin\Users::index'); // akses controller di dalam folder
$routes->get('/Users/about/(:any)/(:any)', 'admin\Users::about/$1/$2'); // akses controller di dalam folder
$routes->get('/Users/produk/(:any)', 'admin\Users::produk/$1'); // akses controller di dalam folder

$routes->get('/', 'Pages::index');
$routes->get('/Pages', 'Pages::index');
$routes->get('/Pages/about', 'Pages::about');
$routes->get('/Pages/contact', 'Pages::contact');

// daftar komik
$routes->get('/Komik/index', 'Komik::index');
$routes->get('/Komik', 'Komik::index');

// create data komik
$routes->get('/Komik/create', 'Komik::create');
$routes->post('/Komik/save', 'Komik::save');

// delete data komik
$routes->delete('/Komik/(:num)', 'Komik::delete/$1');

// edit data komik
$routes->get('/Komik/edit/(:segment)', 'Komik::edit/$1');
$routes->post('/Komik/update/(:segment)', 'Komik::update/$1');

// detail komik
$routes->get('/Komik/(:any)', 'Komik::detail/$1');

// daftar orang
$routes->get('/Orang/index', 'Orang::index');
$routes->get('/Orang', 'Orang::index');

// cari orang
$routes->post('/Orang/index/(:any)', 'Orang::index/$1');
$routes->post('/Orang', 'Orang::index');
