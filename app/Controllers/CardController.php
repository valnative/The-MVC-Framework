<?php

namespace App\Controllers;

use Framework\View;

class CardController extends Controller
{
    public function actionCard(): bool
    {
        echo "CardController => actionCard";
        return true;
    }
}
