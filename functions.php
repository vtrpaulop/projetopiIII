<?php

function base_path($path)
{
    return __DIR__ . "/{$path}";
}

function view(string $url, array $variables = [])
{
    extract($variables);
    include ($url);
}

function dd($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    die();
}

function routeUris(string $uri, array $routes)
{
    if ($routes[$uri]) {
        require $routes[$uri];
        die();
    } else {
        // todo: Fazer página 404 e retornar ela.
    }
}

function redirect(string $url)
{
    header("Location: $url");
    exit();
}

function formatDate(string $date)
{
    $date = new DateTime(str_replace('/', '-', $date));
    return $date->format('d/m/Y');
}