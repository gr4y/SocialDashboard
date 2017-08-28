<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="http://localhost/gezeugs/SocialDashboard/public/semantic-ui/semantic.min.css">

    <script src="http://localhost/gezeugs/SocialDashboard/public/jquery-3.2.1.js" charset="utf-8"></script>
    <script src="http://localhost/gezeugs/SocialDashboard/public/semantic-ui/semantic.min.js" charset="utf-8"></script>

    <title>Social Dashboard <?= (isset($title) ? $this->e("- " . $title): "") ?></title>
  </head>
  <body>

    <div class="ui container">

      <div class="ui segment">

        <?php if(isset($title)): ?>
        <h2 class="page-title"><?= $title; ?></h2>
        <?php endif; ?>

        <?= $this->section('content'); ?>

      </div>

    </div>

  </body>
</html>
