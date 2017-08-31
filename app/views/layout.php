<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/semantic-ui/semantic.min.css">
    <link rel="stylesheet" href="/master.css">

    <script src="/jquery-3.2.1.js" charset="utf-8"></script>
    <script src="/semantic-ui/semantic.min.js" charset="utf-8"></script>

    <title>Social Dashboard <?= (isset($title) ? $this->e("- " . $title): "") ?></title>
  </head>
  <body>

    <header class="ui inverted fixed menu">
      <div class="ui container">
        <div class="header item">
          <img src="/logo.png" class="logo"/>
          Social Dashboard
        </div>
        <a href="/" class="item">Home</a>
        <?php if(currentUser() == null): ?>
          <div class="item right">
            <div class="ui buttons">
              <a href="/sessions/new" class="ui button white">Log in</a>
              <a href="/users/new" class="ui button blue">Sign Up</a>
            </div>
          </div>
        <?php else: ?>
          <div class="ui simple dropdown item right">

            <img src="<?= gravatar_path(currentUser()->email); ?>" class="ui icon gravatar" />
            <?= currentUser()->username; ?>
            <i class="dropdown icon"></i>

            <div class="ui pointing menu">
              <div class="header">Account</div>
              <!-- Logout Form -->
              <form method="post" action="/sessions/delete" class="ui form hidden" id="logoutForm">
                <button type="submit" class="ui button">Logout</button>
              </form>
              <!-- /LogoutForm -->
              <a href="/users/edit?id=<?= currentUser()->id; ?>" class="item">Edit Account</a>
              <div class="divider"></div>
              <a href="javascript:void();" class="item" onclick="$('#logoutForm button').click();">Logout</a>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </header>

    <div class="ui main container">
      <?php if(isset($title)): ?>
      <h1 class="ui header"><?= $title; ?></h1>
      <?php endif; ?>
      <?= $this->section('content'); ?>
    </div>

    <footer class="ui inverted vertical segement">

    </header>
  </body>
</html>
