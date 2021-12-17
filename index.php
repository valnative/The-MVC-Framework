<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

spl_autoload_register(static function ($classname) {
    include_once __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . $classname . '.php';
});

$layout = new View();
$layout->generate('product_view.php', $products, 'template_view.php',);
