<?php

const BASE_PATH = __DIR__ . "\\..\\";

session_start();

require_once BASE_PATH . "utils/functions.php";

spl_autoload_register(function ($class) {
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    require base_path("/{$class}.php");
});

$db = new \Core\Database(require base_path('/config.php'));

if (!$db::$SCHEMA_CRIADO) {
    $db->createSchema();
}

\Core\Session::getUser() ?? \Core\Session::setUser('none', 'none', 'none', 'guest', false);

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$route = new \Core\Routes();
require_once base_path('/Http/routes.php');
$route->route($uri);

\Core\Session::flushTemp();