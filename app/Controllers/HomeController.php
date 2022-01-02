<?php

namespace App\Controllers;

use Framework\View;
use Framework\Router;

class HomeController
{
    public function actionIndex(): bool
    {
        echo "HomeController ==> actionIndex";
        return true;
    }
}
