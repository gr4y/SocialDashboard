<?php

$dbConf = SocialDashboard\Config::$database;

ORM::configure('mysql:host=' . $dbConf['host'] . ';dbname=' . $dbConf['name']);
ORM::configure('username', $dbConf['username']);
ORM::configure('password', $dbConf['password']);
ORM::configure('driver_options', $dbConf['driver_options']);

function view($template, $data=[]) {
  global $templates;
  return $templates->render($template, $data);
}

?>
