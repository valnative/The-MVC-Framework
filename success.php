<?php

spl_autoload_register(static function ($classname) {
    include_once __DIR__ . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . $classname . '.php';
});
$session = new SessionManager();
$session->start();
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Success</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h1>Welcome <?php
      $session->read() ?> to V-Shop</h1>
  <form action="index.php" class="form-login" method="post">
    <button class="btn" type="submit" name="login">Log out</button>
  </form>
</div>
</body>
</html>