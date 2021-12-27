<?php

namespace Framework;

use App\Controllers\AccountController;
use App\Controllers\CardController;
use App\Controllers\HomeController;
use App\Controllers\ProductController;


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
            'product/(\w+)(((?!//).)*)' => [ProductController::class, 'actionProduct/$1$2'],
            'shop' => [ProductController::class, 'actionCatalog'],
            '' => [HomeController::class, 'indexAction'],
            'card' => [CardController::class, 'actionCard'],
            'account' => [AccountController::class, 'actionAccount'],
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
            $pattern = "~^$route$~";

            if (preg_match($pattern, $uri, $match)) {
                $controllerName = $controllers[0];
                $internalRoute = preg_replace($pattern, $controllers[1], $uri);
                $segments = explode('/', $internalRoute);
                $controllerAction = array_shift($segments);
                $parameters = $segments;
                $controller = new $controllerName();
                $result = call_user_func_array([$controller, $controllerAction], $parameters);
                if ($result !== null) {
                    break;
                }
            }
        }
    }
}
