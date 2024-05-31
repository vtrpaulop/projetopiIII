<?php

$config = require base_path('/config.php');
$conn = new mysqli($config['host'], $config['usuario'], $config['senha'], $config['nome_db']);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}