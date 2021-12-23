<?php

namespace App\Controllers;

use App\Models\ProductModel;
use Framework\View;

class ShopController extends Controller
{

    public function actionShop(): bool
    {
        echo "ShopController => actionShop";
        return true;
    }
}
