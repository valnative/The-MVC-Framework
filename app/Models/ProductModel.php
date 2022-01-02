<?php

namespace App\Models;

use PDO;
use Framework\Db;

class ProductModel
{
    public int $id;
    public string $category;
    public string $name;
    public string $description;
    public float $price;
    public string $image;

    public function getCatalog(): array
    {
        $db = Db::getConnection();

        $catalog = [];
        $sql = 'SELECT * FROM product';
        $result = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $product = new self();
            $this->extracted($row, $product);
            $catalog[] = $product;
        }
        return $catalog;
    }

    public function getProduct(int $id): ProductModel
    {
        if ($id) {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM product WHERE id =' . $id;
            $result = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
            $this->extracted($result, $this);
        }
        return $this;
    }

    /**
     * @param $row
     * @param ProductModel $product
     * @return void
     */
    private function extracted($row, ProductModel $product): void
    {
        $product->id = $row['id'];
        $product->category = $row['category'];
        $product->name = $row['name'];
        $product->description = $row['description'];
        $product->price = $row['price'];
        $product->image = $row['image'];
    }
}
