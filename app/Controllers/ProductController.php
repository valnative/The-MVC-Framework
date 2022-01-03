<?php

namespace App\Controllers;

use App\Models\ProductModel;
use Framework\View;

class ProductController extends Controller
{
    /**
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->model = new ProductModel();
    }

    /**
     * @return array
     */
    public function actionCatalog(): array
    {
        $catalog = $this->model->getCatalog();
        View::render('template.php', 'shop.php', $catalog);
        return $catalog;
    }

    /**
     * @param int $id
     * @return ProductModel
     */
    public function actionProduct(int $id): ProductModel
    {
        $oneProduct = $this->model->getProduct($id);
        echo "<pre>";
        print_r($oneProduct);
        echo "<pre>";
        return $oneProduct;
    }
}
