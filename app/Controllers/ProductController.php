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

    public function actionCatalog(): array
    {
//        return $this->model->getCatalog();

        $catalog = $this->model->getCatalog();
        var_dump($catalog);
        echo "<pre>";
        print_r($catalog);
        echo "<pre>";
        return $catalog;

//        $data = $this->model->getCatalog();
//        View::render('shop.php', 'template.php', $data);
    }


    public function actionProduct(int $id): ProductModel
    {
//        return $this->model->getProduct($id);

//
        $oneProduct = $this->model->getProduct($id);
//        var_dump($oneProduct);
        echo "<pre>";
        print_r($oneProduct);
        echo "<pre>";
        return $oneProduct;
//        View::render('product.php', 'template.php', $data);
    }

}
