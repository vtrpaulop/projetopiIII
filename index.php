<?php

session_start();

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

$route = new \Core\Routes();
require_once './routes.php';
$route->route($uri);