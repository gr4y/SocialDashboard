<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="semantic-ui/semantic.min.css">

    <script src="jquery-3.2.1.js" charset="utf-8"></script>
    <script src="semantic-ui/semantic.min.js" charset="utf-8"></script>

    <title>Social Dashboard - <?= $this->e($title); ?></title>
  </head>
  <body>

    <div class="ui container">
      <div class="ui segment">
        <?= $this->section('content'); ?>
      </div>
    </div>

  </body>
</html>
