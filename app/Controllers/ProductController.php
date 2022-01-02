<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProductController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new ProductModel();
    }

    public function actionCatalog(): array
    {
        $catalog = $this->model->getCatalog();
        var_dump($catalog);
        echo "<pre>";
        print_r($catalog);
        echo "<pre>";
        return $catalog;
    }

    public function actionProduct(int $id): ProductModel
    {
        $oneProduct = $this->model->getProduct($id);
        echo "<pre>";
        print_r($oneProduct);
        echo "<pre>";
        return $oneProduct;
    }
}
