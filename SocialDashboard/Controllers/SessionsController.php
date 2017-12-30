<?php

namespace SocialDashboard\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Models;

/**
 * This controller handles everything related to registration and/or login.
 */
class SessionsController {

  static function registerRoutes(\FastRoute\RouteCollector $router) {
    $router->addGroup('/sessions', function(\FastRoute\RouteCollector $r){
      $r->addRoute('GET', '/new', join("::", [__CLASS__, "new"]));
      $r->addRoute('POST', '/create', join("::", [__CLASS__, "create"]));
      $r->addRoute('POST', '/delete', join("::", [__CLASS__, "delete"]));
    });
  }

  public function new(Request $request, Response $response) {
    $response->setContent(view('sessions/new'));
    return $response;
  }

  public function create(Request $request, Response $response) {
    $sessionData = $request->get('session');
    $user = \Model::factory('SocialDashboard\Models\User')
      ->where_equal('username', $sessionData['username'])->find_one();

    if (empty($user)) return RedirectResponse::create('/users/new');
    if (password_verify($sessionData['password'], $user->password)) {
      session()->set('userId', $user->id);
    }

    $response = RedirectResponse::create('/');
    return $response;
  }

  public function delete(Request $request, Response $response) {
    // remove current user from session
    session()->remove('userId');
    // set flash message
    flash()->set('success', view('sessions/msg/logged_out'));
    // redirect to /
    $response = RedirectResponse::create('/');
    return $response;
  }



}

?>
