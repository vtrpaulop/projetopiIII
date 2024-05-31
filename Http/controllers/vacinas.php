<?php
use Core\Notification;

$db = new \Core\Database(require base_path('/config.php'));

$vacinas_infantil = $db->query("SELECT * FROM vacinas WHERE tipo_etario_fk = 1")->findAll();
$vacinas_adolescente = $db->query("SELECT * FROM vacinas WHERE tipo_etario_fk = 2")->findAll();

view('/vacinas', [
    'vacinas_infantil' => $vacinas_infantil,
    'vacinas_adolescente' => $vacinas_adolescente
]);