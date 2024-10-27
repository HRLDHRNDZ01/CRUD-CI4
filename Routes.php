<?php namespace Config;

use CodeIgniter\Config\BaseConfig;
use Config\Services;

$routes = Services::routes(true);

// Load the system's routing file first, so we can override it later if needed
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

// Set the default namespace, controller, and method
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true); // Change to true to use auto routing

// Define your routes here
$routes->get('/', 'Home::index'); // Home route

// Product routes
// Product routes
$routes->get('/product', 'Product::index', ['as' => 'product.index']); // List products
$routes->post('/product/save', 'Product::save', ['as' => 'product.save']); // Save new product
$routes->get('/product/edit/(:num)', 'Product::edit/$1', ['as' => 'product.edit']); // Show form to edit a product
$routes->post('/product/update', 'Product::update', ['as' => 'product.update']); // Update product
$routes->get('/product/delete/(:num)', 'Product::delete/$1', ['as' => 'product.delete']); // Delete product


// Load additional routing for the environment, if it exists
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
