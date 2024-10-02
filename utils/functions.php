<?php

function base_path($path)
{
    return __DIR__ . '/..' . "{$path}";
}


function view(string $uri, array $params = [])
{
    extract($params);

    require base_path("/views{$uri}.view.php");
}

function partial(string $uri, array $params = [])
{
    extract($params);

    require base_path("/views/partials$uri.php");
}

function controller(string $path)
{
    return base_path("/Http/controllers{$path}");
}

function dd($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    die();
}

function redirect(string $url)
{
    require base_path('/config.php');
    $subpath = $config['subdiretorio'];
    header("Location: {$subpath}{$url}");
    exit();
}

function formatDate(string $date)
{
    $date = new DateTime(str_replace('/', '-', $date));
    return $date->format('d/m/Y');
}

function assets(string $path)
{

    require base_path('/config.php');
    $subpath = $config['subdiretorio'];

    return "{$subpath}/public/assets{$path}";
}
