<form method="post" action="<?= $action; ?>" name="user" class="ui form">

  <h4 class="ui dividing header">Zugangsdaten:</h4>
  <div class="field">
    <label for="user[username]">Nutzername</label>
    <div class="ui input">
      <input type="text" name="user[username]"
        value="<?= ($action == 'update' ? $user->get('username') : ''); ?>" />
    </div>
  </div>

  <div class="fields">
    <div class="eight wide field">
      <label for="user[email]">E-Mail:</label>
      <div class="ui input">
        <input type="text" name="user[email]"
          value="<?= ($action == 'update' ? $user->get('email') : ''); ?>" />
      </div>
    </div>
    <div class="eight wide field">
      <label for="user[email_verification]">E-Mail wiederholen:</label>
      <div class="ui input">
        <input type="text" name="user[email_verification]" />
      </div>
    </div>
  </div>

  <div class="two fields">
    <div class="field">
      <label for="user[password]">Passwort: </label>
      <div class="ui input">
        <input type="text" name="user[password]"/>
      </div>
    </div>

    <div class="field">
      <label for="user[password_verification]">Passwort wiederholen: </label>
      <div class="ui input">
        <input type="text" name="user[password_verification]"/>
      </div>
    </div>
  </div>

  <?php if($action == 'update'): ?>
  <h4 class="ui dividing header">Statistic</h4>
  <div class="two fields">
    <div class="field">
      <label>Last Login: </label>
      <div class="ui text">
        <?= $user->get('lastLoginDate'); ?>
      </div>
    </div>
    <div class="field">
      <label>Registration Date: </label>
      <div class="ui text">
        <?= $user->get('registerDate'); ?>
      </div>
    </div>
  </div>

  <input type="hidden" name="user[id]" value="<?= $user->get('id'); ?>" />

  <?php endif; ?>

  <button type="submit" class="ui button">Registrieren</button>

</form>
