<?php

namespace Core;

class Routes
{
    private array $routes = [];

    public function route($uri)
    {
        foreach ($this->routes as $route) {
            if ($uri === $route['uri']) {
                try {
                    Middleware::resolve($route['middleware']);
                    Session::setMiddleware($route['middleware']);

                    return require base_path($route['controller']);
                } catch (\Exception $ex) {
                    header("Location: /");
                }
            }
        }

        static::abort();
    }

    public function add($uri, $controller, array $roles = null)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'middleware' => $roles
        ];

        return $this;
    }

    public static function abort($code = 404)
    {
        http_response_code($code);
        require base_path("{$code}.php");
        exit();
    }
}