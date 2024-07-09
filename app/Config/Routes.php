<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// biar bisa akses controller langsung
$routes->setAutoRoute(true);

// ci akan membuat jalur yang metode requestnya get dengan url / akan diarahkan ke controlle Home function index
// $routes->get('/', 'Home::index');
// $routes->get('/', 'Home::coba');

// akses controller tanpa method
// $routes->get('/Coba/yeyey', function () {
//     echo "Hello World!";
// });
$routes->get('/coba', 'Coba::index'); // routes dengan request method GET yang mengakses url /coba dan diarahkan ke Controller Coba function index
$routes->get('/coba/index', 'Coba::index'); // routes dengan request method GET yang mengakses url /coba/index dan diarahkan ke Controller Coba function index
$routes->get('/coba/about', 'Coba::about'); // routes dengan request method GET yang mengakses url /coba/about dan diarahkan ke Controller Coba function about
$routes->get('/coba/(:any)/(:num)', 'Coba::about/$1/$2'); // mengambil segment url menjadi value

$routes->get('/users', 'Admin\Users::index'); // akses url /users dan arahkan ke folder Admin controller Users dan method index

// routes untuk controller Pages
$routes->get('/', 'Pages::index'); // routes dengan request method GET yang mengakses url / dan diarahkan ke Controller Pages function index
$routes->get('pages/home', 'Pages::index');
$routes->get('pages/about', 'Pages::about');
$routes->get('pages/contact', 'Pages::contact');

// url /comic/slug controller Comics method detail
$routes->get('/comics/(:segment)', 'Comics::detail/$1');
