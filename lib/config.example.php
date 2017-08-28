<?php

namespace SocialDashboard;

class Config {

  public static $database = array(
    'host' => '127.0.0.1',
    'name' => 'dashboard',
    'username' => 'dashboard',
    'password' => '7xv1elEAZ6bkZeDh',
    'driver_options' => [\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']
  );

}

?>
