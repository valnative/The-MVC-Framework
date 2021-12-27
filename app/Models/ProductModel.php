<?php

namespace App\Models;

class ProductModel
{
    public int $id;
    public string $name;
    public float $price;
    public string $photo;

    public function getCatalog()
    {
    }

    public function getProductById(int $id)
    {
    }
}
