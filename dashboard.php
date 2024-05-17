<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/assets/css/default.css">
  <link rel="stylesheet" href="/assets/css/components.css">
  <link rel="stylesheet" href="/assets/css/dashboard.css">
  <title>Dashboard</title>
</head>

<body>
  <nav class="c-menu">
    <div class="c-menu__user">
      <img class="c-menu__user__image" src="/assets/images/default__user.png" alt="">
      <p class="c-menu__user__name">Fulano da Silva</p>
    </div>
    <div class="c-menu__links">
      <a href="/"><button class="c-menu__link">Inicio</button></a>
      <a href="/carteirinha"><button class="c-menu__link">Carteirinha</button></a>
      <a href="/listarUsuarios.php"><button class="c-menu__link">Usuários</button></a>
      <a href="/vacinasAdolescente.php"><button class="c-menu__link">Vacinas Adolescentes</button></a>
      <a href="/vacinasInfantil.php"><button class="c-menu__link">Vacinas Infantil</button></a>

      <a href="/logout.php"><button class="c-menu__link">Sair</button></a>
    </div>
  </nav>

  <section class="c-section">
    <div class="c-section__title">
      <h1>Seja bem vindo, Fulano!</h1>
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