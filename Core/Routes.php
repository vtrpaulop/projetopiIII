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
                    \Core\Middleware\Middleware::resolve($route['middleware']);
                    Session::setMiddleware($route['middleware']);
                    return require $route['controller'];
                } catch (\Exception $ex) {
                    redirect("/");
                }
            }
        }
        static::abort();
    }

    public function add($uri, $controller, $roles = null)
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
        view("/{$code}");
        exit();
    }
}
