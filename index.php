<?php

require_once './functions.php';

spl_autoload_register(function ($class) {
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    require base_path($class . '.php');
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