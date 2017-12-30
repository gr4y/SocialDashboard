<?php $this->layout('layout', ['title' => 'Nutzerliste']); ?>

<?php
if(!empty($users)) {
?>
<table class="ui table stackable">
  <thead>
    <th>ID</th>
    <th>Username</th>
    <th>E-Mail</th>
    <th>Registration Date</th>
    <th>Last Login</th>
    <th>Has Password?</th>
    <th>Actions</th>
  </thead>
  <tbody>
  <?php
  foreach($users as $user){
    $this->insert('users/user', ['user' => $user]);
  }
  ?>
  </tbody>
</table>
<?php
} else {
  $this->insert('users/no_data');
}
?>
