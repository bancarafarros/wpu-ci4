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
