<?php
chdir(dirname(__FILE__).'/..');
require 'vendor/autoload.php';

echo "<pre>";
var_dump(get_declared_classes());
echo "</pre>";

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// Pretty Exception Handling by Whoops
// $whoops = new \Whoops\Run;
// $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
// $whoops->register();

// initialize router
$router = new League\Route\RouteCollection();

// initialize template engine
$templates = new League\Plates\Engine(dirname(__FILE__).'/../app/views');

// add routes
$router->addRoute('GET', '/', 'Controllers\IndexController::index');

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
