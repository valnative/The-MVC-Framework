<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

spl_autoload_register(function ($classname) {
    include_once __DIR__ . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . $classname . '.php';
});

(new CustomErrorHandler())->registerHandler();

require __DIR__ . '/check_error.php';
