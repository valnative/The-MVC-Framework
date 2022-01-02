<?php

namespace Framework;

use App\Controllers\AccountController;
use App\Controllers\CardController;
use App\Controllers\HomeController;
use App\Controllers\ProductController;

/**
 *
 */
class Router
{
    /**
     * @return array|null
     */
    public static function run(): ?array
    {
        $uri = self::getUri();
        $map = self::getRoutes();
        return self::getController($map, $uri);
    }

    /**
     * @return \string[][]
     */
    private static function getRoutes(): array
    {
        return array(
            'product/(\w+)(((?!//).)*)' => [ProductController::class, 'product/$1$2'],
            'shop' => [ProductController::class, 'catalog'],
            '' => [HomeController::class, 'index'],
            'card' => [CardController::class, 'card'],
            'account' => [AccountController::class, 'account'],
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
     * @param array $map
     * @param string|null $uri
     * @return array|null
     */
    private static function getController(array $map, ?string $uri): ?array
    {
        foreach ($map as $route => $controller) {
            $uriPattern = "~^$route$~";
            if (preg_match($uriPattern, $uri)) {
                [$controllerName, $action] = $controller;
                $internalRoute = preg_replace($uriPattern, $action, $uri);
                $segments = explode('/', $internalRoute);
                $actionName = 'action' . ucfirst(array_shift($segments));
                $parameters = $segments;
                return [new $controllerName(), $actionName, $parameters];
            }
        }
        return null;
    }
}
