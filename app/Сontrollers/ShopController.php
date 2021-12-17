<?php

namespace App\Controllers;

use Framework\View;
use App\Models\ShopModel;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->model = new ShopModel();
        $this->view = new View();
    }

    public function shopRender(): void
    {
        $data = $this->model->getCatalog();
        View::render('shop.php', 'template.php', $data);
    }
}
