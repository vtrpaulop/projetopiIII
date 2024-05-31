<?php

use Core\Notification;

if (!($_GET['id'] ?? null) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    \Core\Routes::abort();
}

$db = new \Core\Database(require base_path('/config.php'));
$sql = "SELECT * FROM usuarios WHERE id = :id";
$registro = $db->query($sql, ['id' => $_GET['id']])->find();

$usuario = new \Models\Usuario(
    $registro['id'],
    $registro['nome'],
    $registro['sobreNome'],
    $registro['rg'],
    $registro['cpf'],
    $registro['data_nascimento'],
    $registro['telefone'],
    $registro['cartaoSus'],
    $registro['endereco'],
    $registro['bairro'],
    $registro['email']
);

view(
    '/usuario',
    [
        'usuario' => $usuario
    ]
);