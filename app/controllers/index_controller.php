<?php
namespace SocialDashboard\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/*
 * This is the Main Controller
 */
class IndexController extends ApplicationController {

  public function index(Request $request, Response $response) {
    $response->setContent(view('index', [
      'title' => 'Holy Fuck, this is awesome'
    ]));
    return $response;
  }

}

?>
