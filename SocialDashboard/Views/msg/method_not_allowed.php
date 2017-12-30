<?php
$this->layout('layout', ['title' => 'Method not allowed!']);
?>

<p>The used HTTP Method is not allowed, please try one of these:</p>
<ul>
<?php foreach($allowed_methods as $method): ?>
  <li><?= $method; ?></li>
<?php endforeach; ?>
</ul>
