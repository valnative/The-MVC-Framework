<?php

namespace App\Controllers;

use App\Models\ProductModel;
use Framework\View;

class ProductController extends Controller
{

    public function actionProduct(): bool
    {
        echo "ProductController => actionProduct";
        return true;
    }
}