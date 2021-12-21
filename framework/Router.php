<?php

namespace Framework;

use App\Controllers\HomeController;
use App\Controllers\ShopController;

class Router
{
    public static function run(): array
    {
        $routes = array(
            '/' => [HomeController::class, 'index'],
            '/shop' => [ShopController::class, 'shop'],
            '/product' => [ShopController::class, 'product'],
        );

        $uri = explode('/', $_SERVER['REQUEST_URI']);

        foreach ($routes as $route => $action) {
            if ($uri[1] === $route) {
                return new $action[1]();
            }
        }
        self::throw404();
    }

    private static function throw404(): void
    {
        header("HTTP/1.1 404 Not Found");
        header("Status: 404 Not Found");
        header("Location:http://" . $_SERVER['HTTP_HOST'] . "/404");
    }
}
