<?php

if (!($_GET['id'] ?? null) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    \Core\Routes::abort();
}

$db = new \Core\Database(require base_path('/config.php'));
$sql = "SELECT * FROM usuarios WHERE id = :id";
$usuario = $db->query($sql, ['id' => $_GET['id']])->find();

$sql_vacinas_tomadas = "SELECT * FROM (vacinas JOIN vacinas_tomadas ON vacinas.id = vacinas_tomadas.vacina_fk) WHERE usuario_fk = :id ORDER BY data_vacina DESC";
$sql_vacinas_marcadas = "SELECT * FROM (vacinas JOIN vacinas_marcadas ON vacinas.id = vacinas_marcadas.vacina_fk) WHERE usuario_fk = :id ORDER BY data_vacina DESC";
$vacinas_tomadas = $db->query($sql_vacinas_tomadas, ['id' => $usuario['id']])->findAll() ?? null;
$vacinas_marcadas = $db->query($sql_vacinas_marcadas, ['id' => $usuario['id']])->findAll() ?? null;

view('/usuarios-info', [
    'usuario' => $usuario,
    'vacinas_tomadas' => $vacinas_tomadas,
    'vacinas_marcadas' => $vacinas_marcadas
]);