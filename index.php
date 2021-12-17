<?php

namespace App;

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/vendor/autoload.php';

(new CustomErrorHandler())->registerHandler();

require __DIR__ . '/view.php';
