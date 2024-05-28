<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Routes publiques
$routes->get('/', 'Acceuil::main');
$routes->get('/Produit', 'Produit::add_product');
$routes->get('/Users', 'Users::users');
$routes->get('/Article', 'Article::article');
$routes->get('/Boutique', 'Boutique::boutique');
$routes->get('/Home', 'Home::index');
$routes->post('/ajout_produit', 'Produit::ajout_produit');
$routes->post('user_create', 'Users::user_create');
$routes->post('user_connect', 'Users::user_connect');
$routes->get('logout', 'Users::logout');
$routes->get('modifier_produit/(:num)', 'Produit::modifier_produit/$1');
$routes->post('ProduitController/update_produit', 'Produit::update_produit');
$routes->get('modifier_user/(:num)', 'Users::modifier_user/$1');
$routes->post('Users/update_user', 'Users::update_user');
$routes->post('admin_connect', 'AdminController::admin_connect');
$routes->post('register', 'AdminController::register');
$routes->get('panier_view', 'PanierController::panier_view');
$routes->post('vider_panier', 'PanierController::vider_panier');
$routes->get('vider_panier', 'PanierController::vider_panier');
$routes->post('ajouter_au_panier', 'PanierController::ajouter_au_panier');
$routes->post('PanierController/proceder_au_paiement', 'PanierController::proceder_au_paiement');
$routes->get('/Dashboard_view_controlleur', 'Dashboard_view_controlleur::dashboard_view');
$routes->get('/ErrorController', 'ErrorController::error_404');
$routes->get('/UserDash', 'UserDash::users_dash');
$routes->get('/Pan', 'Pan::panier_dashboard');
$routes->get('panier_view', 'PanierController::panier_view');
$routes->post('ajouter_au_panier', 'PanierController::ajouter_au_panier');
$routes->post('modifier_quantite', 'PanierController::modifier_quantite');
$routes->post('supprimer_du_panier', 'PanierController::supprimer_du_panier');
$routes->get('valider_panier', 'PanierController::valider_panier');
$routes->post('PanierController/modifier_quantite', 'PanierController::modifier_quantite');
$routes->post('PanierController/supprimer_du_panier', 'PanierController::supprimer_du_panier');
$routes->get('PanierController/valider_panier', 'PanierController::valider_panier');
$routes->post('PanierController/proceder_au_paiement', 'PanierController::proceder_au_paiement');
$routes->get('proceder_au_paiement', 'PanierController::proceder_au_paiement');
$routes->get('panier', 'PanierController::afficher_panier');
$routes->post('panier/update_quantity', 'PanierController::update_quantity');
$routes->post('panier/remove_article', 'PanierController::remove_article');
$routes->get('panier/afficher', 'PanierController::afficher_panier');




// Routes nécessitant une authentification (client et admin)
$routes->group('', ['filter' => 'auth'], function($routes) {
    
});

// Routes nécessitant une authentification admin uniquement
$routes->group('', ['filter' => 'auth:admin'], function($routes) {
    $routes->get('/Dashboard', 'Dashboard::dashboard');
   
});
