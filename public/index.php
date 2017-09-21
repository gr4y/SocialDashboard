<?php
// get current working directory
$currentDir = dirname(__FILE__);

// change directory to application root
chdir($currentDir.'/..');

// require autoloader
require 'vendor/autoload.php';

// initialize the application
$app = new \Application($currentDir);
// add routes
$app->declareRoutes(function(\FastRoute\RouteCollector $r) {
  $r->get('/', 'Controllers\IndexController::index');
  $r->addGroup('/users', function(\FastRoute\RouteCollector $rs){
    $rs->get('/index', 'Controllers\UsersController::index');
    $rs->get('/new', 'Controllers\UsersController::new');
    $rs->post('/create', 'Controllers\UsersController::create');
    $rs->get('/edit/{id:\d+}', 'Controllers\UsersController::edit');
    $rs->post('/update', 'Controllers\UsersController::update');
    $rs->post('/delete', 'Controllers\UsersController::delete');
  });
  $r->addGroup('/sessions', function(\FastRoute\RouteCollector $rs){
    $rs->get('/new', 'Controllers\SessionsController::new');
    $rs->post('/create', 'Controllers\SessionsController::create');
    $rs->post('/delete', 'Controllers\SessionsController::delete');
  });
});
// actually run the application
$app->run();
