<?php
chdir(dirname(__FILE__).'/..');
require 'vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

session_start();

// Pretty Exception Handling by Whoops
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

// initialize template engine
$templates = new League\Plates\Engine(dirname(__FILE__).'/../app/views');

// initialize router
$router = new League\Route\RouteCollection;

$router->addRoute('GET', '/', 'Controllers\IndexController::index');

// RouteGroup: User Controller
$router->get('/users/index', 'Controllers\UsersController::index');
$router->get('/users/new', 'Controllers\UsersController::new');
$router->post('/users/create', 'Controllers\UsersController::create');
$router->get('/users/edit', 'Controllers\UsersController::edit');
$router->post('/users/update', 'Controllers\UsersController::update');
$router->post('/users/delete', 'Controllers\UsersController::delete');

$router->get('/sessions/new', 'Controllers\SessionsController::new');
$router->post('/sessions/create', 'Controllers\SessionsController::create');
$router->post('/sessions/delete', 'Controllers\SessionsController::delete');


// get dispatcher from router
$dispatcher = $router->getDispatcher();

// create request
$request = Request::createFromGlobals();

try {
  $response = $dispatcher->dispatch($request->getMethod(), $request->getPathInfo());
  $response->send();
} catch(League\Route\Http\Exception\NotFoundException $e) {
  $response = new Response;
  $response->setStatusCode(404);
  $response->setContent("Not Found\n");
  $response->send();
} catch(League\Route\Http\Exception\MethodNotAllowedException $e) {
  $response = new Response;
  $response->setStatusCode(405);
  $response->setContent("Method not allowed\n");
  $response->send();
}


?>
