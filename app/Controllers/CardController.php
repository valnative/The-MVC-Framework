<?php

namespace App\Controllers;

use Framework\View;

class CardController extends Controller
{

    public function actionCard(): bool
    {
        echo "CardController => actionCard";
        return true;
//        View::render('account.php', 'template.php');
    }
//    public function cardAction(): void
//    {
//        View::render('account.php', 'template.php');
//    }
}