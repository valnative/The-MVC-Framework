<?php

namespace App\Controllers;

use App\Models\ProductModel;
use Framework\View;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
//        $this->model = new ProductModel();
    }


    public function actionIndex(): bool
    {
        echo "HomeController ==> actionIndex";
        return true;

        //        $data = $this->model->getCatalog();
//        View::render('shop.php', 'template.php', $data);
    }
}
