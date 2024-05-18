<?php
$config = require './config.php';
$dsn = $config['database'] . ':' . 'host=' . $config['host'] . ';port=' . $config['porta'] . ';dbname=' . $config['nome_db'];
$pdo = new PDO($dsn, $config['usuario'], $config['senha']);

$sql_file = file_get_contents('./vacinas.sql');
$sqls_file = trim($sql_file, "\t");
$sqls = explode(';', $sql_file);
$sqls = array_filter($sqls, fn($v) => !empty ($v));

foreach ($sqls as $sql) {
    $pdo->query($sql);
}

echo '<pre>';
var_dump($sqls);
echo '</pre>';