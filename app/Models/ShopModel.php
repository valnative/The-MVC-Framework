<?php

namespace App\Models;

require_once APP_ROOT . 'database/testdb.php';

class ShopModel
{
    public int $id;
    public string $name;
    public float $price;
    public string $photo;

    /**
     * @param array $catalog
     * @return array
     */
    public function getCatalog(array $catalog): array
    {
        $products = [];
        foreach ($catalog as $item) {
            $product = new self();
            $product->id = $item['id'];
            $product->name = $item['name'];
            $product->price = $item['price'];
            $product->photo = $item['photo'];
            $products[] = $product;
        }
        return $products;
    }
}
