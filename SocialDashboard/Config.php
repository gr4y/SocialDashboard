<?php

namespace SocialDashboard;

class Config { // extends \miniMVC\Config {

  public static $database = array(
    'host' => '127.0.0.1',
    'name' => 'dashboard',
    'username' => 'dashboard',
    'password' => 'p455w0rd',
    'driver_options' => [\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']
  );

}

?>
