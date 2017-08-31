<form method="post" action="<?= $action; ?>" class="ui form">

  <div class="field">
    <label for="session[username]">Username: </label>
    <input type="text" name="session[username]" />
  </div>

  <div class="field">
    <label for="session[password]">Password: </label>
    <input type="password" name="session[password]" />
  </div>

  <div class="field">
    <?php if($action == 'create'): ?>
      Keinen Account? Dann <a href="/users/new">registriere dich</a>.
    <?php endif; ?>
  </div>

  <button type="submit" class="ui button">Login</button>

</form>
