<?php
$this->layout('layout', ['title' => 'Einloggen']);
$this->insert('sessions/_form', ['action' => 'create']);
?>
