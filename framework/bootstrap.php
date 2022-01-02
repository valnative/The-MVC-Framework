<?php

use Framework\Router;

require_once __DIR__ . '/config.php';

[$controllerObject, $actionName, $param] = Router::run();
$result = call_user_func_array([$controllerObject, $actionName], $param);
