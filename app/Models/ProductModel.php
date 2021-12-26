<?php

namespace App\Models;

class ProductModel
{
    public int $id;
    public string $name;
    public float $price;
    public string $photo;

    /**
     * @param  array  $catalog
     * @param  int  $productId
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

    /**
     * @param  array  $catalog
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
