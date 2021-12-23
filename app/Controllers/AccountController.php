<?php

namespace App\Controllers;

use Framework\View;

class AccountController extends Controller
{
    public function actionAccount(): bool
    {
        echo "AccountController ==> actionAccount";
        return true;
    }
}