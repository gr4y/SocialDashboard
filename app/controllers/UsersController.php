<?php
namespace Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * This controller handles everything related to registration and/or login.
 */
class UsersController {

  public function index(Request $request, Response $response) {
    if(currentUser() != null && currentUser()->hasRole('admin')) {
      $users = \Model::factory('User')->find_many();
      $response->setContent(view('users/index', ['users' => $users]));
    } else {
      session()->getFlashBag()->set('info', view('msg/not_allowed'));
      $response = RedirectResponse::create('/');
    }
    return $response;
  }

  public function new(Request $request, Response $response) {
    $response->setContent(view('users/new', ['user' => null]));
    return $response;
  }

  public function create(Request $request, Response $response) {
    $reqUser = $request->get('user');
    $user = \Model::factory('User')->create($reqUser);
    try {
      if($user->save()) {
        $response = RedirectResponse::create('index');
      } else {
        $response = RedirectResponse::create('new');
      }
    } catch(PDOException $e) {

    }
    return $response;
  }

  public function edit(Request $request, Response $response) {
    if(!empty(currentUser())) {
      $response->setContent(view('users/edit', ['user' => currentUser()]));
    }
    return $response;
  }

  public function update(Request $request, Response $response) {
    $data = $request->get('user');
    if(empty($data['id'])) {
      \Model::factory('User')->find_one($data['id'])->set($data)->save();
    }
    $response = RedirectResponse::create('index');
    return $response;
  }


  public function delete(Request $request, Response $response) {
    $id = $request->get('id');
    if(isset($id)) {
      $user = \Model::factory('User')->find_one($id);
      $user->delete();
    }
    $response = RedirectResponse::create('index');
    return $response;
  }

}

?>
