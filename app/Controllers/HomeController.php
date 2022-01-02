<?php

namespace App\Controllers;

use Framework\View;

class HomeController extends Controller
{
    public function actionIndex(): void
    {
        View::render('template.php', 'home.php');
    }
}
