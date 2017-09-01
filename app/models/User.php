<?php
class User extends Model {

  public static $_table = 'users';

  public function role() {
    return $this->belongs_to('Role');
  }

  public function hasRole($role) {
    return $this->role()->role == $role;
  }

  public function save() {

    // Validate eMail and eMail Verification
    if((isset($this->email) && isset($this->email_verification)) &&
      $this->email != $this->email_verification) return false;

    // Validate password and password verification;
    if((isset($this->password) && isset($this->password_verification)) &&
      $this->password != $this->password_verification) {
      return false;
    }

    $this->password = hashPassword($this->password);
    $this->set_expr('registerDate', 'NOW()');

    unset($this->email_verification);
    unset($this->password_verification);

    return parent::save();
  }

}
?>
