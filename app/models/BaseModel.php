<?php

namespace Models;

use ORM;

if (!defined('NAMESPACE_SEPARATOR')) {
  define('NAMESPACE_SEPARATOR', '\\');
}

/**
 * This is my Base Model class, which contains all methods my subclasses need
 */
abstract class BaseModel {

  private static function getClassName() {
    $className = get_called_class();
    $strippedClassName = substr($className, strripos($className, NAMESPACE_SEPARATOR), strlen($className));
  }

  public static function findAll() {
    $className = self::getClassName();
    ORM::for_table($className)->findMany();
  }


}
?>
