<?php

namespace SocialDashboard\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use \MiniMVC\Controller as Controller;

/*
 * This is the Main Controller
 */
class IndexController {

  /** 
   * Register all Routes inline the class
   */
  static function registerRoutes(\FastRoute\RouteCollector $router) {
    $router->addRoute('GET', '/', join("::", [__CLASS__, "index"]));
  }

  /**
   * Index Action
   */
  public function index(Request $request, Response $response) {
    $response->setContent(view('index'));
    return $response;
  }

}

?>
