<?php
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
