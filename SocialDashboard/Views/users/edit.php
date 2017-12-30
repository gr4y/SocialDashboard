<?php
$this->layout('layout', ['title' => 'Nutzer bearbeiten']);
$this->insert('users/_form', ['user' => $user, 'action' => 'update' ]);
?>
