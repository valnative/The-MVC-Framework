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
            'product/(\w+)(((?!//).)*)' => [ProductController::class, 'actionProduct/$0'],
            'shop' => [ProductController::class, 'actionShop'],
            '' => [HomeController::class, 'indexAction'],
            'card' => [CardController::class, 'actionCard'],
            'account(((?!//).)*)' => [AccountController::class, 'actionAccount/$0'],
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
                var_dump($match);
                $controllerName = $controllers[0];
                var_dump($uri);
                var_dump($pattern);
                var_dump($controllers[1]);



                $internalRoute = preg_replace($pattern, $controllers[1], $uri);

                var_dump($internalRoute);
                $segments = explode('/', $internalRoute);
                var_dump($segments);
                $controllerAction = array_shift($segments);
                var_dump($controllerAction);
                $parameters = $segments;
                var_dump($parameters);

                $controller = new $controllerName();
//                $result = $controller->$controllerAction($parameters);
                $result = call_user_func_array([$controller, $controllerAction], $parameters);
            }
        }
    }
}
