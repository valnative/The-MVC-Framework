<?php

class Product
{

    public function getProduct(): array
    {
        return array(
            "beanie" => array(
                "name" => "Beanie",
                "price" => "10.00",
                "photo" => "assets/img/beanie-324x324.jpg"
            ),

            "belt" => array(
                "name" => "Belt",
                "price" => "20.00",
                "photo" => "assets/img/belt-324x324.jpg"
            ),

            "cap" => array(
                "name" => "Cap",
                "price" => "25.00",
                "photo" => "assets/img/cap-324x324.jpg"
            ),

            "hoodie" => array(
                "name" => "Hoodie",
                "price" => "40.00",
                "photo" => "assets/img/hoodie-324x324.jpg"
            ),
        );
    }
}

