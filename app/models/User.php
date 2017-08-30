<?php
namespace Models;

use ORM;

class User extends BaseModel {

  private static function isValid($data) {
    // Verify E-Mail
    if($data['email'] != $data['email_verification']) {
      return false;
    }
    // Verify Password
    if($data['password'] != $data['password_verification']) {
      return false;
    }
    return true;
  }

  private static function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT, [
     'cost' => 5,
     'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)
    ]);
  }

  public static function create($data) {

    if(!static::isValid($data)) {
      return false;
    }

    // remove fields from data array cause the database doesn't have
    // these fields, so it will error with them.
    unset($data['email_verification']);
    unset($data['password_verification']);

    $user = ORM::for_table(self::getTableName())->create([
      'username'  =>  $data['username'],
      'email'     =>  $data['email'],
      'password'  =>  static::hashPassword($data['password']),
      'registerDate'  =>  date("Y-m-d H:i:s")
    ]);

    try {
      $user->save();
    } catch(\PDOException $e) {
      echo $e->getMessage();
      return false;
    }
    return true;
  }

  public static function update($data) {

    if(!static::isValid($data)) {
      return false;
    }

    // remove fields from data array cause the database doesn't have
    // these fields, so it will error with them.
    unset($data['email_verification']);
    unset($data['password_verification']);


    $user = ORM::for_table(self::getTableName())
      ->where_equal('id', $data['id'])->find_one();
    $user->set([
      'username' => $data['username'],
      'email' => $data['email'],
      'password' => static::hashPassword($data['password'])

    ]);

    try {
      $user->save();
    } catch(\PDOException $e) {
      echo $e->getMessage();
      return false;
    }
    return true;
  }

  public static function delete($id) {
    ORM::for_table(self::getTableName())
      ->where_equal('id', $id)->delete_many();
  }

}

?>
