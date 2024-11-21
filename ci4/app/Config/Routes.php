<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LoginController::index');
$routes->post('dashboard', 'DashboardController::index');
$routes->get('logout', 'LoginController::logout');

//Filter Login
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'DashboardController::dashboard2');

    // routes setting
    $routes->get('datapegawai', 'DashboardController::datapegawai');
    $routes->get('dataunit', 'SettingController::dataunit');
    $routes->get('datarutinitas', 'DashboardController::datarutinitas');
    $routes->get('datacustomer', 'CustomerController::ViewData');
    $routes->get('categorycust', 'CustCatController::ViewData');
    $routes->get('naturalAcc', 'DashboardController::naturalAcc');
    $routes->get('confidence', 'DashboardController::confidence');
    $routes->get('proyeksi', 'DashboardController::proyeksi');
    $routes->get('estimasiPenyerapan', 'DashboardController::estimasiPenyerapan');
    $routes->get('segmenBisnis', 'DashboardController::segmenBisnis');
    $routes->get('subSegmenBisnis', 'DashboardController::subSegmenBisnis');
    $routes->get('pajakRKAP', 'DashboardController::pajakRKAP');
    $routes->get('dataKategori', 'DashboardController::dataKategori');
    $routes->get('jenisAnggaran', 'DashboardController::jenisAnggaran');
    $routes->get('dataDept', 'DashboardController::dataDept');
    $routes->get('pajakITrack', 'DashboardController::pajakITrack');
    $routes->get('pusatBiaya', 'DashboardController::pusatBiaya');
    $routes->get('kursITrack', 'DashboardController::kursITrack');
    $routes->get('mitraVendor', 'DashboardController::mitraVendor');
    $routes->get('masterRole', 'DashboardController::masterRole');
});


//routes postman data unit

$routes->group('api', ['filter' => 'token_auth'], function ($routes) {
    $routes->get('dataunit/dataApi/dataUnit', 'DataUnitController::dataunit');
    $routes->post('dataunit/dataApi/addData', 'DataUnitController::create');
});
$routes->put('dataunit/dataApi/UpdateData/(:num)', 'DataUnitController::update/$1');
$routes->delete('dataunit/dataApi/deleteData/(:num)', 'DataUnitController::delete/$1');
$routes->get('dataunit/dataApi/GenerateToken', 'DataUnitController::GenerateToken');

//postman custcat
$routes->group('api', ['filter' => 'token_auth'], function ($routes) {});
$routes->get('categorycust/dataApi/dataCustCat', 'CustCatController::dataCustCat');
$routes->post('categorycust/dataApi/addData', 'CustCatController::create');
$routes->put('categorycust/dataApi/update/(:num)', 'CustCatController::update/$1');
$routes->delete('categorycust/dataApi/delete/(:num)', 'CustCatController::delete/$1');
$routes->get('categorycust/dataApi/GenerateToken', 'CustCatController::GenerateToken');

//postman customer
$routes->group('api', ['filter' => 'token_auth'], function ($routes) {});
$routes->get('customer/dataApi/dataCustomer', 'CustomerController::dataCustomer');
$routes->post('customer/dataApi/addData', 'CustomerController::create');
$routes->put('customer/dataApi/update/(:num)', 'CustomerController::update/$1');
$routes->delete('customer/dataApi/delete/(:num)', 'CustomerController::delete/$1');
$routes->get('customer/dataApi/GenerateToken', 'CustomerController::GenerateToken');

//routes db
$routes->post('dataunit/dataApi/addData', 'SettingController::addData');
$routes->delete('dataunit/dataApi/delete/(:num)', 'SettingController::DeleteData/$1');
$routes->put('dataunit/dataApi/update/(:num)', 'SettingController::update/$1');

// create routes add data api
$routes->post('dataunit/addUnit', 'ApiController::addUnit');
$routes->put('dataunit/edit', 'ApiController::edit');
$routes->delete('dataunit/delete/(:num)', 'ApiController::delete/$1');

$routes->get('debug-routes', function () {
    $routes = service('routes')->getRoutes();
    echo "<pre>";
    print_r($routes);
    echo "</pre>";
});
