<?php
$this->layout('layout', ['title' => 'Nutzer registrieren']);
$this->insert('users/_form', ['user' => $user, 'action' => 'create' ]);
?>
