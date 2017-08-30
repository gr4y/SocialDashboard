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

  /**
   * Get's the className and strips away the Namespace and returns it.
   * This will be used as the tablename in the database, if the field $tableName
   * is not specified
   *
   * @return string
   */
  protected static function getTableName() {
    // otherwhise fetch the name of the class
    $calledClass = get_called_class();
    // and remove everything related to namespaces and pluralize it
    return pluralize(substr($calledClass, strripos($calledClass, NAMESPACE_SEPARATOR) + 1, strlen($calledClass)));
  }

  /**
   * Find all Entries
   */
  public static function findAll() {
    return ORM::for_table(self::getTableName())->findMany();
  }

  /**
   * Find Entry by ID;
   */
  public static function findById($id){
    if (!isset($id)) return;
    return ORM::for_table(self::getTableName())->where_equal('id', $id)->find_one();
  }

  /**
   * Find Entry by ID;
   */
  public static function findByEmailAndPassword($email, $password){
    if (!isset($email) && !isset($password)) return;
    return ORM::for_table(self::getTableName())->where_equal('email', $email, 'password', $password)->find_one();
  }

  /**
   * Create a user, with passed data array
   */
   public static function create($data) {
     if(isset($data)) {
       $entry = ORM::for_table(self::getTableName())->create($data);
       $entry->save();
     }
   }

}
?>
