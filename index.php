<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

spl_autoload_register(static function ($classname) {
    include_once __DIR__ . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . $classname . '.php';
});

$session = new SessionManager();
$data = new CorrectData();
$session->start();
$session->clean();

if (isset($_POST['submit'])) {
    $session->write();

    if (!empty($_POST['username'] && $_POST['password'])) {
        $data->dataIsCorrect(true);
    } else {
        $data->dataIsCorrect(false);
    }
}

?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h1>Login</h1>
  <form class="form-login" method="post">
    <label>
      <input type="text" class="form-username" name="username" placeholder="Username">
    </label>
    <label>
      <input type="password" class="form-password" name="password" placeholder="Password">
    </label>
    <button class="btn" type="submit" name="submit">Sign in</button>
  </form>
</div>
</body>
</html>