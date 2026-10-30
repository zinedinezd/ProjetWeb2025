<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home/details', 'Home::details');
$routes->post('/home/inscription', 'Home::inscription');
$routes->post('/home/login','Home::login');
$routes->get('/home/deconnexion','Home::deconnexion');
$routes->get('iphone15/occasion', 'ProductController::iphone15Occasion');
$routes->get('iphone14/occasion', 'ProductController::iphone14Occasion');
$routes->get('ipadair/occasion', 'ProductController::ipadAirOccasion');
$routes->get('watchultra/occasion', 'ProductController::appleWatchultraOccasion');
$routes->post('upload', 'ProductController::upload');
$routes->get('moncompte', 'Home::moncompte'); // Page Mon compte
$routes->get('/ajouter-produit', 'Home::ajouterProduit');
$routes->post('upload', 'ProductController::upload');  // Cette route doit correspondre à l'action de votre formulaire
$routes->match(['get', 'post'], 'welcome_message', 'Home::welcomeMessage');
$routes->get('product/getModels/(:any)', 'ProductController::getModels/$1');

