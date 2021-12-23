<?php

namespace App\Controllers;

use Framework\View;
use Framework\Router;

class HomeController
{
    public function indexAction(): bool
    {
        echo "HomeController ==> indexAction";
        return true;
    }
}
