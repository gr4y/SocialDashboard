<!-- List of Users -->
<?php
if(isset($users)):
  foreach($users as $user): $this->insert('users/user', ['user' => $user]); endforeach;
else:
  $this->insert('users/no_data');
endif;
?>
