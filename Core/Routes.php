<?php

namespace Core;

class Routes
{
    private array $routes = [];

    public function route($uri)
    {
        foreach ($this->routes as $route) {
            if ($uri === $route['uri']) {
                require base_path($route['controller']);
            }
        }

        $this->abort();
    }

    public function add($uri, $controller, $role = 'user')
    {
        $this->routes = [
            'uri' => $uri,
            'controller' => $controller,
            'middleware' => $role
        ];

        return $this;
    }

    public function abort($code = 404)
    {
        require base_path("{$code}.php");
    }
}