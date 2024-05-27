<?php
$usuario = \Core\Session::getUser();
$nome_completo = "{$usuario['nome']} {$usuario['sobrenome']}";

$db = new \Core\Database(require './config.php');
$sql_vacinas_tomadas = "SELECT nome, data_vacina FROM (vacinas JOIN vacinas_tomadas ON vacinas.id = vacinas_tomadas.vacina_fk) WHERE usuario_fk = :id ORDER BY data_vacina DESC LIMIT 4";
$sql_vacinas_marcadas = "SELECT nome, data_vacina FROM (vacinas JOIN vacinas_marcadas ON vacinas.id = vacinas_marcadas.vacina_fk) WHERE usuario_fk = :id ORDER BY data_vacina DESC LIMIT 4";
$vacinas_tomadas = $db->query($sql_vacinas_tomadas, ['id' => $usuario['id']])->findAll() ?? null;
$ultima_vacina_tomada = $vacinas_tomadas['0'] ?? null;
$vacinas_marcadas = $db->query($sql_vacinas_marcadas, ['id' => $usuario['id']])->findAll() ?? null;
$ultima_vacina_marcada = $vacinas_marcadas['0'] ?? null;

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/assets/css/default.css">
  <link rel="stylesheet" href="/assets/css/components.css">
  <link rel="stylesheet" href="/assets/css/dashboard.css">
  <title>Dashboard</title>
</head>

<body>
  <?= require './dashboard-menu.php' ?>

  <section class="c-section">
    <div class="c-section__title">
      <h1>Seja bem-vindo, <?php echo $nome_completo ?>!</h1>
    </div>

    <div class="c-blocos">

      <div class="c-bloco">
        <h2 class="c-bloco__title">Proximas vacinas</h2>
        <?php if ($vacinas_marcadas): ?>
          <?php foreach ($vacinas_marcadas as $vacina): ?>
            <?php if ($vacina['nome'] === $ultima_vacina_marcada['nome']): ?>
              <div class="c-vacina c-vacina__first">
                <span class="c-vacina__status"></span>
                <p class="c-vacina__nome"><?= $vacina['nome'] ?></p>
                <p class="c-vacina__data"><?= $vacina['data_vacina'] ?></p>
              </div>
              <?php continue; ?>
            <?php endif; ?>
            <div class="c-vacina">
              <span class="c-vacina__status"></span>
              <p class="c-vacina__nome"><?= $vacina['nome'] ?></p>
              <p class="c-vacina__data"><?= $vacina['data_vacina'] ?></p>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p class="c-vacina__nome">Nenhuma vacina marcada.</p>
        <?php endif; ?>
        <a href="/carteirinha#vacinas-marcada"><button class="c-bloco__button">Ver meu calendário
            completo</button></a>
      </div>

      <div class="c-bloco">
        <h2 class="c-bloco__title">Últimas vacinas tomadas</h2>
        <?php if ($vacinas_tomadas): ?>
          <?php foreach ($vacinas_tomadas as $vacina): ?>
            <?php if ($vacina['nome'] === $ultima_vacina_tomada['nome']): ?>
              <div class="c-vacina c-vacina__first">
                <span class="c-vacina__status"></span>
                <p class="c-vacina__nome"><?= $vacina['nome'] ?></p>
                <p class="c-vacina__data"><?= $vacina['data_vacina'] ?></p>
              </div>
              <?php continue; ?>
            <?php endif; ?>

            <div class="c-vacina">
              <span class="c-vacina__status"></span>
              <p class="c-vacina__nome"><?= $vacina['nome'] ?></p>
              <p class="c-vacina__data"><?= $vacina['data_vacina'] ?></p>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p class="c-vacina__nome">Nenhuma vacina registrada por enquanto.</p>
        <?php endif; ?>
        <a href="/carteirinha#vacinas-tomadas"><button class="c-bloco__button">Ver carteirinha
            completa</button></a>
      </div>

    </div>
  </section>

</body>

</html>