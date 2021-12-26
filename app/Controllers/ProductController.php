<?php

namespace App\Controllers;

use App\Models\ProductModel;
use Framework\View;


class ProductController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new ProductModel();
    }

    public function actionShop(): void
    {
        echo "ShopController => actionShop";
//        $data = $this->model->getCatalog();
//        View::render('shop.php', 'template.php', $data);
    }

    public function actionProduct(): void
    {
        echo "ProductController => actionProduct";

//        echo '<br>'.$id;
//        echo '<br>'.$name;
//        echo '<br>'.$category;
//        echo '<br>'.$price;
//        $data = $this->model->getProduct() ();
//        View::render('product.php', 'template.php', $data);
    }
}