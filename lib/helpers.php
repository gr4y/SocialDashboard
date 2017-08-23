<?php

$dbConf = SocialDashboard\Config::$database;

ORM::configure('mysql:host=' . $dbConf['host'] . ';dbname=' . $dbConf['name']);
ORM::configure('username', $dbConf['username']);
ORM::configure('password', $dbConf['password']);

?>
