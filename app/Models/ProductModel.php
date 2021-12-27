<?php

namespace App\Models;

use PDO;
use PDOException;

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
    public function getCatalog()
    {
        $servername = "localhost";
        $username = "nix_user";
        $password = "123";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=nix_db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: ".$e->getMessage();
        }

        $catalog = [];
        $sql = 'SELECT id, category, name, description, price, image FROM product';
        $result = $conn->query($sql);
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

    public function getProductById(int $id)
    {
    }


}
