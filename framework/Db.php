<?php

namespace Framework;

use PDO;
use PDOException;

class Db
{
    public static function getConnection()
    {
        try {
            $conn = new PDO(DB_DSN, DB_USER, DB_PASS);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: ".$e->getMessage();
        }
    }
}
