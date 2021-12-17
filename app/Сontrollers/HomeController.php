<?php

namespace App\Controllers;

use Framework\View;

class HomeController extends Controller
{
    public function homeRender(): void
    {
        View::render('home.php', 'template.php');
    }
}
