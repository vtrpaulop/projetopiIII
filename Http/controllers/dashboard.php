<?php
$usuario = \Core\Session::getUser();
$nome_completo = "{$usuario['nome']} {$usuario['sobrenome']}";

$db = new \Core\Database(require base_path('/config.php'));
$sql_vacinas_tomadas = "SELECT nome, data_vacina FROM (vacinas JOIN vacinas_tomadas ON vacinas.id = vacinas_tomadas.vacina_fk) WHERE usuario_fk = :id ORDER BY data_vacina DESC LIMIT 4";
$sql_vacinas_marcadas = "SELECT nome, data_vacina FROM (vacinas JOIN vacinas_marcadas ON vacinas.id = vacinas_marcadas.vacina_fk) WHERE usuario_fk = :id ORDER BY data_vacina DESC LIMIT 4";
$vacinas_tomadas = $db->query($sql_vacinas_tomadas, ['id' => $usuario['id']])->findAll() ?? null;
$ultima_vacina_tomada = $vacinas_tomadas['0'] ?? null;
$vacinas_marcadas = $db->query($sql_vacinas_marcadas, ['id' => $usuario['id']])->findAll() ?? null;
$ultima_vacina_marcada = $vacinas_marcadas['0'] ?? null;

view('/dashboard', [
    'nome_completo' => $nome_completo,
    'vacinas_tomadas' => $vacinas_tomadas,
    'ultima_vacina_tomada' => $ultima_vacina_tomada,
    'vacinas_marcadas' => $vacinas_marcadas,
    'ultima_vacina_marcada' => $ultima_vacina_marcada
]);