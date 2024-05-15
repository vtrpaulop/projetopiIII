<?php

require_once './functions.php';
require_once './Database.php';

$db = new Database(require './config.php');

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