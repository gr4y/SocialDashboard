<?php
namespace Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Models;

/**
 * This controller handles everything related to registration and/or login.
 */
class UsersController extends ApplicationController {

  public function index(Request $request, Response $response) {
    $response->setContent(view('users/index', ['users' => \Models\User::findAll()]));
    return $response;
  }

  public function new(Request $request, Response $response) {
    $response->setContent(view('users/new', ['user' => new \Models\User]));
    return $response;
  }

  public function create(Request $request, Response $response) {
    $user = $request->get('user');
    if (!\Models\User::create($user)) {
      $response = RedirectResponse::create('index');
    } else {
      $response = RedirectResponse::create('new');
    }
    return $response;
  }

  public function edit(Request $request, Response $response) {
    $id = $request->get('id');
    if(isset($id)) {
      $user = \Models\User::findById($id);
      if(isset($user)) {
        $response->setContent(view('users/edit', ['user' => $user]));
      } else {
        $response = RedirectResponse::create('index');
      }
    }
    return $response;
  }

  public function update(Request $request, Response $response) {
    $data = $request->get('user');
    if(isset($data)) {
      \Models\User::update($data);
    }
    $response = RedirectResponse::create('index');
    return $response;
  }


  public function delete(Request $request, Response $response) {
    $id = $request->get('id');
    if(isset($id)) {
      \Models\User::delete($id);
    }
    $response = RedirectResponse::create('index');
    return $response;
  }

}

?>
