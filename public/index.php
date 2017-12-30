<?php

use \MiniMVC\Application as Application;

// get current working directory
$currentDir = dirname(__FILE__);

// change directory to application root
chdir($currentDir.'/..');

// require autoloader
$loader = require join(DIRECTORY_SEPARATOR, ['vendor', 'autoload.php']);

if(!defined('APP_PATH')) 
  define('APP_PATH', 'SocialDashboard');

$viewsPath = join(DIRECTORY_SEPARATOR, [$currentDir, '..', APP_PATH, 'Views']);

// initialize the application
$app = new Application($currentDir, $viewsPath);
// actually run the application
$app->run($loader);