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

    /**
     * @return array
     */
    public function getCatalog(): array
    {
        $db = Db::getConnection();

        $catalog = [];
        $sql = 'SELECT * FROM product';
        $objectArray = $db->query($sql)->fetchAll(PDO::FETCH_CLASS, __CLASS__);
        var_dump($objectArray);
        foreach ($objectArray as $object) {
            $product = new self();
            $this->extracted($object, $product);
            $catalog[] = $product;
        }
        return $catalog;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function getProduct(int $id): ProductModel
    {
        if ($id) {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM product WHERE id =' . $id;
            $object = $db->query($sql)->fetchObject(__CLASS__);
            var_dump($object);

            $this->extracted($object, $this);
        }
        return $this;
    }

    /**
     * @param $object
     * @param ProductModel $product
     * @return void
     */
    private function extracted($object, ProductModel $product): void
    {
        $product->id = $object->id;
        $product->category = $object->category;
        $product->name = $object->name;
        $product->description = $object->description;
        $product->price = $object->price;
        $product->image = $object->image;
    }
}
