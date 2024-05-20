<?php
$usuario = \Core\Session::getUser();
$nome_completo = "{$usuario['nome']} {$usuario['sobrenome']}";
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
        <div class="c-vacina c-vacina__first">
          <span class="c-vacina__status"></span>
          <p class="c-vacina__nome">Rubéula v4</p>
          <p class="c-vacina__data">23/02/2026</p>
        </div>
        <div class="c-vacina">
          <span class="c-vacina__status"></span>
          <p class="c-vacina__nome">Rubéula v4</p>
          <p class="c-vacina__data">23/02/2026</p>
        </div>
        <div class="c-vacina">
          <span class="c-vacina__status"></span>
          <p class="c-vacina__nome">Rubéula v4</p>
          <p class="c-vacina__data">23/02/2026</p>
        </div>
        <div class="c-vacina">
          <span class="c-vacina__status"></span>
          <p class="c-vacina__nome">Rubéula v4</p>
          <p class="c-vacina__data">23/02/2026</p>
        </div>
        <a href="/proximas-vacinas"><button class="c-bloco__button">Ver meu calendário completo</button></a>
      </div>

      <div class="c-bloco">
        <h2 class="c-bloco__title">Últimas vacinas tomadas</h2>
        <div class="c-vacina c-vacina__first">
          <span class="c-vacina__status"></span>
          <p class="c-vacina__nome">Rubéula v4</p>
          <p class="c-vacina__data">23/02/2026</p>
        </div>
        <div class="c-vacina">
          <span class="c-vacina__status"></span>
          <p class="c-vacina__nome">Rubéula v4</p>
          <p class="c-vacina__data">23/02/2026</p>
        </div>
        <div class="c-vacina">
          <span class="c-vacina__status"></span>
          <p class="c-vacina__nome">Rubéula v4</p>
          <p class="c-vacina__data">23/02/2026</p>
        </div>
        <div class="c-vacina">
          <span class="c-vacina__status"></span>
          <p class="c-vacina__nome">Rubéula v4</p>
          <p class="c-vacina__data">23/02/2026</p>
        </div>
        <a href="/proximas-vacinas"><button class="c-bloco__button">Ver carteirinha completa</button></a>
      </div>

    </div>
  </section>

</body>

</html>