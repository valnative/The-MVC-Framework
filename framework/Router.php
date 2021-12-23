<?php

namespace Framework;

use App\Controllers\AccountController;
use App\Controllers\CardController;
use App\Controllers\HomeController;
use App\Controllers\ProductController;
use App\Controllers\ShopController;


class Router
{
    /**
     * @return void
     */
    public static function run(): void
    {
        $uri = self::getUri();
        $map = self::getRoutes();
        self::getController($map, $uri);
    }

    /**
     * @return array
     */
    private static function getRoutes(): array
    {
        return array(
            '' => [HomeController::class, 'indexAction'],
            'shop' => [ShopController::class, 'actionShop'],
            'account' => [AccountController::class, 'actionAccount'],
            'card' => [CardController::class, 'actionCard'],
            'product/([a-z0-9-]+)' => [ProductController::class, 'actionProduct/$1'],
        );
    }

    /**
     * @return string|null
     */
    private static function getUri(): ?string
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
        return null;
    }

    /**
     * @param  array  $map
     * @param  string|null  $uri
     * @return void
     */
    private static function getController(array $map, ?string $uri): void
    {
        foreach ($map as $route => $controllers) {
            if (preg_match("~^$route$~", $uri)) {
                $controllerName = array_shift($controllers);
                $controllerAction = array_pop($controllers);
                $controller = new $controllerName();
                $controller->$controllerAction();
            }
        }
    }
}
