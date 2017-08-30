<?php
namespace Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Models;

/**
 * This controller handles everything related to registration and/or login.
 */
class SessionsController extends ApplicationController {

  public function new(Request $request, Response $response) {
    $response->setContent(view('sessions/new'));
    return $response;
  }

  public function create(Request $request, Response $response) {
    $session = $request->get('session');
    \ORM::for_table(pluralize('user'))
      ->where_equal('username', $session['username']);

    var_dump(\ORM::get_query_log());
#    $out = password_verify($user->get('password'), $session['password']);

    // var_dump($out);

    return $response;
  }

  public function delete(Request $request, Response $response) {
    return $response;
  }

}

?>
