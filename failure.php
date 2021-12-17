<?php

spl_autoload_register(function ($classname) {
    include_once __DIR__ . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . $classname . '.php';
});

$session = new SessionManager();
$session->start();
$session->clean();

?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Wrong</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h1>Please, enter correct login data</h1>
  <form action="index.php" class="form-login" method="post">
    <button class="btn" type="submit" name="login">Back to login</button>
  </form>
</div>
</body>
</html>