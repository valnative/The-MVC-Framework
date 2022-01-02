<?php

namespace App\Models;

use PDO;
use PDOException;
use Framework\Db;

class ProductModel
{
    public int $id;
    public string $name;
    public float $price;
    public string $photo;


    /**
     * @param  array  $catalog
     * @return array
     */
    public function getCatalog(): array
    {
        $db = Db::getConnection();

        $catalog = [];
        $sql = 'SELECT id, category, name, description, price, image FROM product';
        $result = $db->query($sql);
        $i = 0;
        foreach ($result as $row) {
            $catalog[$i]['id'] = $row['id'];
            $catalog[$i]['category'] = $row['category'];
            $catalog[$i]['name'] = $row['name'];
            $catalog[$i]['description'] = $row['description'];
            $catalog[$i]['price'] = $row['price'];
            $catalog[$i]['image'] = $row['image'];
            $i++;
        }

        return $catalog;
    }

    /**
     * @param  array  $catalog
     * @param  int  $productId
     * @return $this
     */

    public function getProduct(int $id)
    {
        if ($id) {
            $db = Db::getConnection();
            var_dump($db);

            $sql = 'SELECT * FROM product WHERE id =' . $id;
            return $db->query($sql)->fetch(PDO::FETCH_ASSOC);
        }

    }
}
