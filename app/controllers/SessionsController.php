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
    $sessionData = $request->get('session');
    $user = \Model::factory('User')
      ->where_equal('username', $sessionData['username'])->find_one();

    if(empty($user)) return RedirectResponse::create('/users/new');

    if (password_verify($sessionData['password'], $user->password)) {
      session()->set('current_user', $user);
    }

    $response = RedirectResponse::create('/');

    return $response;
  }

  public function delete(Request $request, Response $response) {
    // remove current user from session
    session()->remove('current_user');
    // set flash message
    flash()->set('success', view('sessions/logged_out'));
    // redirect to /
    $response = RedirectResponse::create('/');
    return $response;
  }



}

?>
