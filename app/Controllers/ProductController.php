<?php

namespace App\Controllers;

use App\Models\ProductModel;
use Framework\View;

class ProductController
{
    public function actionCatalog(): bool
    {
        echo 'ProductController => actionCatalog';
        return true;
    }

    public function actionProduct($arg1, $arg2, $arg3)
    {
        echo 'ProductController => actionProduct';
        echo '<br>First parameter: ' . $arg1;
        echo '<br>Second parameter: ' . $arg2;
        echo '<br>Third parameter: ' . $arg3;
        return true;
    }
}
