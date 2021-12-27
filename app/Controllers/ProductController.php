<?php

namespace App\Controllers;

use App\Models\ProductModel;
use Framework\View;


class ProductController extends Controller
{
    public array $catalog = [];

    public function __construct()
    {
        parent::__construct();
        $this->model = new ProductModel();
    }

    public function actionCatalog(): bool
    {
        $catalog = $this->model->getCatalog();
        echo "<pre>";
        print_r($catalog);
        echo "<pre>";
        echo "ЭТО КОНТРОЛЛЕР - ProductController.  Вызывается ЭКШН -  actionCatalog"."<br>";
        echo "All products";
        return true;
    }

    public function actionProduct($name, $id): bool
    {
        echo "ЭТО КОНТРОЛЛЕР - ProductController.  Вызывается ЭКШН -  actionProduct"."<br>";
        echo "One product";
        echo '<br>'.$id;
        echo '<br>'.$name;
        return true;
    }
}