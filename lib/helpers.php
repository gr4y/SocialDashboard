<?php

$dbConf = SocialDashboard\Config::$database;

ORM::configure('mysql:host=' . $dbConf['host'] . ';dbname=' . $dbConf['name']);
ORM::configure('username', $dbConf['username']);
ORM::configure('password', $dbConf['password']);
ORM::configure('driver_options', $dbConf['driver_options']);
ORM::configure('logging', true);

function view($template, $data=[]) {
  global $templates;
  return $templates->render($template, $data);
}

function hashPassword($unhashed_password) {
  return password_hash($unhashed_password, PASSWORD_BCRYPT, [
   'cost' => 5,
   'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)
  ]);
}

function currentUser() {
  if($_SESSION == null || $_SESSION['current_user'] == null) return null;
  return $_SESSION['current_user'];
}

function gravatar_path($email) {
  $hash = md5(strtolower(trim($email)));
  return "http://www.gravatar.com/avatar/$hash?s=30";
}
?>
