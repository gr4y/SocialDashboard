<?php
class Role extends Model {

    public static $_table = 'roles';

    public function users() {
      return $this->has_many('User');
    }

}
?>
