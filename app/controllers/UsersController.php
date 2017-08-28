<?php
namespace Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Models;

/**
 * This controller handles everything related to registration and/or login.
 */
class UsersController extends ApplicationController {

  public function index(Request $request, Response $response) {
    $response->setContent(view('users/index', ['users' => Users::findAll()]));
    return $response;
  }

  public function new(Request $request, Response $response) {
    $response->setContent(view('users/new'));
    return $response;
  }

  public function create(Request $request, Response $response) {
    var_dump($request);
    return $response;
  }

}

?>
