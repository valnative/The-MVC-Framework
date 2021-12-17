<?php

namespace App\Models;

require_once APP_ROOT . 'database/testdb.php';

class ProductModel
{
    public int $id;
    public string $name;
    public float $price;
    public string $photo;

    /**
     * @param array $catalog
     * @param int $productId
     * @return $this
     */

    public function getProduct(array $catalog, int $productId): ProductModel
    {
        foreach ($catalog as $item) {
            if ($item['id'] === $productId) {
                $this->id = $item['id'];
                $this->name = $item['name'];
                $this->price = $item['price'];
                $this->photo = $item['photo'];
                break;
            }
        }
        return $this;
    }
}
