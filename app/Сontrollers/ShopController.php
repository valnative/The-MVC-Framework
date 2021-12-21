<?php

namespace App\Controllers;

use Framework\View;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->model = new ShopModel();
    }

    public function shopRender(): void
    {
        $data = $this->model->getCatalog();
        View::render('shop.php', 'template.php', $data);
    }
}
