<?php
chdir(dirname(__FILE__).'/..');
require 'vendor/autoload.php';

use FastRoute\RouteCollector as RouteCollector;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

// Pretty Exception Handling by Whoops
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

// Init Session
$session = new Session();
$session->start();

// Init Template Engine
$templates = new League\Plates\Engine(dirname(__FILE__).'/../app/views');

// Register Routes
$routeCallback = function(RouteCollector $r) {
  $r->get('/', 'Controllers\IndexController::index');
  $r->addGroup('/users', function(RouteCollector $rs){
    $rs->get('/index', 'Controllers\UsersController::index');
    $rs->get('/new', 'Controllers\UsersController::new');
    $rs->post('/create', 'Controllers\UsersController::create');
    $rs->get('/edit/{id:\d+}', 'Controllers\UsersController::edit');
    $rs->post('/update', 'Controllers\UsersController::update');
    $rs->post('/delete', 'Controllers\UsersController::delete');
  });
  $r->addGroup('/sessions', function(RouteCollector $rs){
    $rs->get('/new', 'Controllers\SessionsController::new');
    $rs->get('/create', 'Controllers\SessionsController::create');
    $rs->post('/delete', 'Controllers\SessionsController::delete');
  });
};

// Init Dispatcher
$dispatcher = FastRoute\simpleDispatcher($routeCallback);

// Init Request
$request = Request::createFromGlobals();

// A dispatcher does what a dispatcher does... Like the spiderpig.
$route = $dispatcher->dispatch($request->getMethod(), $request->getPathInfo());

// Init Response
$response = new Response();

// Handling of route
switch($route[0]){
  case FastRoute\Dispatcher::NOT_FOUND:
    $response->setStatusCode(Response::HTTP_NOT_FOUND);
    $response->setContent(
      view('msg/not_found')
    );
    break;
  case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
    $response->setStatusCode(Response::HTTP_METHOD_NOT_ALLOWED);
    $response->setContent(
      view('msg/method_not_allowed', ['allowed_methods' => $route[1]])
    );
    break;
  case FastRoute\Dispatcher::FOUND:
    // Replace Query Params in Request with Route Path Params
    $pathParams = $route[2];
    if(!empty($pathParams)) $request->query->replace($pathParams);
    $handler = $route[1];
    // Run the Handler
    $response = $handler($request, $response);
  break;
}

// Send Repsonse
$response->send();
