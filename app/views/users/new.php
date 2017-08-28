<?php $this->layout('layout', ['title' => 'Nutzer registrieren']); ?>

<form method="post" action="create" name="user" class="ui form">

  <div class="field">
    <label for="username">Nutzername</label>
    <div class="ui input">
      <input type="text" name="username"/>
    </div>
  </div>

  <div class="field">
    <label for="email">E-Mail:</label>
    <div class="ui input">
      <input type="text" name="email"/>
    </div>
  </div>

  <div class="field">
    <label for="email_verification">E-Mail wiederholen:</label>
    <div class="ui input">
      <input type="text" name="email_verification"/>
    </div>
  </div>

  <div class="field">
    <label for="password">Passwort: </label>
    <div class="ui input">
      <input type="text" name="password"/>
    </div>
  </div>

  <div class="field">
    <label for="password_verification">Passwort wiederholen: </label>
    <div class="ui input">
      <input type="text" name="password_verification"/>
    </div>
  </div>

  <button type="submit" class="ui button">Registrieren</button>

</form>
