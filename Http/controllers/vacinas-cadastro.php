<?php

use Core\Notification;

if ($_POST) {
  $db = new \Core\Database(require base_path('/config.php'));
  $sql = "INSERT INTO vacinas (nome, protecao_contra, composicao, numero_doses, idade_recomendada, intervalo_entre_doses, esquema_basico, reforco_recomendado_minimo, tipo_etario_fk)
  VALUES (:nome, :protecao_contra, :composicao, :numero_doses, :idade_recomendada, :intervalo_doses, :esquema_basico, :reforco_recomendado, :tipo_etario)
  ";

  $values = [];

  foreach ($_POST as $key => $value) {
    $values[$key] = \Core\Validator::string($value);
  }

  $db->query($sql, $values);


  Notification::set('success', 'Vacina cadastrada com sucesso.');

  redirect('/vacinas-cadastro');
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  view('/vacinas-cadastro');
}