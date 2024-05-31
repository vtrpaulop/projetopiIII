<?php

$usuario = \Core\Session::getUser();

$db = new \Core\Database(require base_path('/config.php'));
$sql_vacinas_tomadas = "SELECT * FROM (vacinas JOIN vacinas_tomadas ON vacinas.id = vacinas_tomadas.vacina_fk) WHERE usuario_fk = :id ORDER BY data_vacina DESC";
$sql_vacinas_marcadas = "SELECT * FROM (vacinas JOIN vacinas_marcadas ON vacinas.id = vacinas_marcadas.vacina_fk) WHERE usuario_fk = :id ORDER BY data_vacina DESC";
$vacinas_tomadas = $db->query($sql_vacinas_tomadas, ['id' => $usuario['id']])->findAll() ?? null;
$vacinas_marcadas = $db->query($sql_vacinas_marcadas, ['id' => $usuario['id']])->findAll() ?? null;

view('/usuario-carteirinha', [
    'vacinas_tomadas' => $vacinas_tomadas,
    'vacinas_marcadas' => $vacinas_marcadas
]);