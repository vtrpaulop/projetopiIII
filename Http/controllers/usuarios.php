<?php
$db = new \Core\Database(require base_path('/config.php'));
if ($_GET['cpf'] ?? null) {
    $sql = "SELECT id, nome, sobreNome, cpf, data_nascimento, telefone, bairro FROM usuarios WHERE cpf = :cpf";
    $usuarios = $db->query($sql, ['cpf' => $_GET['cpf']])->findAll();
} else {
    $sql = "SELECT id, nome, sobreNome, cpf, data_nascimento, telefone, bairro FROM usuarios ORDER BY (nome) LIMIT 10";
    $usuarios = $db->query($sql)->findAll();
}

view('/usuarios', [
    'usuarios' => $usuarios
]);