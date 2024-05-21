<?php
if ($_POST) {
  $db = new \Core\Database(require './config.php');
  $sql = "INSERT INTO vacinas (nome, protecao_contra, composicao, numero_doses, idade_recomendada, intervalo_entre_doses, esquema_basico, reforco_recomendado_minimo, tipo_etario_fk)
  VALUES (:nome, :protecao_contra, :composicao, :numero_doses, :idade_recomendada, :intervalo_doses, :esquema_basico, :reforco_recomendado, :tipo_etario)
  ";

  $db->query($sql, $_POST);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/assets/css/default.css" />
  <link rel="stylesheet" href="/assets/css/components.css" />
  <link rel="stylesheet" href="/assets/css/dashboard.css" />
  <link rel="stylesheet" href="/assets/css/cadastro-vacina.css">
  <title>Dashboard - Cadastrar Vacinas</title>
</head>

<body>

  <?= require './dashboard-menu.php' ?>

  <section class="c-section">
    <div class="c-section__title">
    </div>

    <div class="c-blocos">
      <div class="c-bloco__large">
        <h1 class="c-bloco__large__title">Cadastro de Vacina</h1>

        <form action="/vacinas-cadastro" class="c-form" method="POST">
          <div class="c-input__group">

          </div>
          <div class="c-info__input">
            <label for="nome">Nome<span class="c-input__required">*</span></label>
            <input type="text" name="nome" id="nome" class="c-input" placeholder="Meningocócica C (conjugada)"
              required />
          </div>

          <div class="c-info__input">
            <label for="protecao_contra">Tipo de proteção<span class="c-input__required">*</span></label>
            <input type="text" name="protecao_contra" id="protecao_contra" class="c-input"
              placeholder="Meningite meningocócica tipo C" required />
          </div>

          <div class="c-info__input">
            <label for="composicao">Composição</label>
            <input type="text" name="composicao" id="composicao" class="c-input"
              placeholder="Polissacarídeos capsulares purificados da Neisseria meningitidis do sorogrupo C" />
          </div>
          <div class="c-input__group">
            <div class="c-info__input">
              <label for="numero_doses">Numero de doses<span class="c-input__required">*</span></label>
              <input type="text" name="numero_doses" id="numero_doses" class="c-input" placeholder="2 doses" required />
            </div>

            <div class="c-info__input">
              <label for="intervalo_doses">Intervalo entre as doses</label>
              <input type="text" name="intervalo_doses" id="intervalo_doses" class="c-input"
                placeholder="60 dias entre a 1ª dose e 2ª dose, 60 dias entre a 2ª dose e o reforço" />
            </div>

          </div>

          <div class="c-input__group">
            <div class="c-info__input">
              <label for="idade_recomendada">Idade recomendada<span class="c-input__required">*</span></label>
              <input type="text" name="idade_recomendada" id="idade_recomendada" class="c-input"
                placeholder="1ª dose: 3 meses, 2ª dose: 5 meses, Reforço: 12 meses" required />
            </div>

            <div class="c-info__input">
              <label for="reforco_recomendado">Reforço recomendado Minimo</label>
              <input type="text" name="reforco_recomendado" id="reforco_recomendado" class="c-input"
                placeholder="Reforço" />
            </div>

          </div>
          <div class="c-info__input">
            <label for="esquema_basico">Esquema básico</label>
            <input type="text" name="esquema_basico" id="esquema_basico" class="c-input" placeholder="30 dias" />
          </div>
          <div class="c-info__input">
            <label for="tipo_etario">Tipo etario<span class="c-input__required">*</span></label>
            <select name="tipo_etario" id="tipo_etario" class="c-input c-input__select">
              <option value="1">Infantil</option>
              <option value="2">Adolescente</option>
            </select>
          </div>

          <div class="c-buttons">
            <input type="submit" value="Cadastrar" class="c-button__primary" />
          </div>
        </form>
  </section>
</body>

</html>