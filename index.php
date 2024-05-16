<?php

require_once './functions.php';

spl_autoload_register(function ($class) {
    $exact_path = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path($exact_path);
});

$db = new \Core\Database(require './config.php');

if (!$db::$SCHEMA_CRIADO) {
    $db->createSchema();
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => './index.html',
    '/sobre-nos' => './index.html',
    '/contato' => './index.html',
    '/cadastro' => './cadastro.php',
    'login' => './login.php'
];

routeUris($uri, $routes);