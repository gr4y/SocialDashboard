<?php
namespace Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Models;

/*
 * This is the Main Controller
 */
class IndexController {

  public function index(Request $request, Response $response) {
    $response->setContent(view('index'));
    return $response;
  }

}

?>
