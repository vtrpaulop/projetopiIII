<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/public/assets/css/default.css" />
    <link rel="stylesheet" href="/public/assets/css/components.css" />
    <link rel="stylesheet" href="/public/assets/css/dashboard.css" />
    <link rel="stylesheet" href="/public/assets/css/cadastro-vacina.css">
    <title>Dashboard - Editar Vacina</title>
</head>

<body>

    <?php partial('/dashboard-menu') ?>
    <?= partial('/notification') ?>

    <section class="c-section">
        <div class="c-section__title">
        </div>

        <div class="c-blocos">
            <div class="c-bloco__large">
                <h1 class="c-bloco__large__title">Editar Vacina</h1>

                <form action="/vacinas-editar" class="c-form" method="POST">
                    <input type="hidden" name="id" value="<?= $vacina['id'] ?? '' ?>">
                    <div class="c-input__group">
                    </div>
                    <div class="c-info__input">
                        <label for="nome">Nome<span class="c-input__required">*</span></label>
                        <input type="text" name="nome" id="nome" class="c-input"
                            placeholder="Meningocócica C (conjugada)" value="<?= $vacina['nome'] ?? '' ?>" required />
                    </div>

                    <div class="c-info__input">
                        <label for="protecao_contra">Tipo de proteção<span class="c-input__required">*</span></label>
                        <input type="text" name="protecao_contra" id="protecao_contra" class="c-input"
                            placeholder="Meningite meningocócica tipo C" value="<?= $vacina['protecao_contra'] ?? '' ?>"
                            required />
                    </div>

                    <div class="c-info__input">
                        <label for="composicao">Composição</label>
                        <input type="text" name="composicao" id="composicao" class="c-input"
                            placeholder="Polissacarídeos capsulares purificados da Neisseria meningitidis do sorogrupo C"
                            value="<?= $vacina['composicao'] ?? '' ?>" />
                    </div>
                    <div class="c-input__group">
                        <div class="c-info__input">
                            <label for="numero_doses">Numero de doses<span class="c-input__required">*</span></label>
                            <input type="text" name="numero_doses" id="numero_doses" class="c-input"
                                placeholder="2 doses" value="<?= $vacina['numero_doses'] ?? '' ?>" required />
                        </div>

                        <div class="c-info__input">
                            <label for="intervalo_doses">Intervalo entre as doses</label>
                            <input type="text" name="intervalo_doses" id="intervalo_doses" class="c-input"
                                value="<?= $vacina['intervalo_entre_doses'] ?? '' ?>"
                                placeholder="60 dias entre a 1ª dose e 2ª dose, 60 dias entre a 2ª dose e o reforço" />
                        </div>

                    </div>

                    <div class="c-input__group">
                        <div class="c-info__input">
                            <label for="idade_recomendada">
                                Idade recomendada<span class="c-input__required">*</span>
                            </label>
                            <input type="text" name="idade_recomendada" id="idade_recomendada" class="c-input"
                                value="<?= $vacina['idade_recomendada'] ?? '' ?>"
                                placeholder="1ª dose: 3 meses, 2ª dose: 5 meses, Reforço: 12 meses" required />
                        </div>

                        <div class="c-info__input">
                            <label for="reforco_recomendado">Reforço recomendado Minimo</label>

                            <input type="text" name="reforco_recomendado_minimo" id="reforco_recomendado"
                                class="c-input" value="<?= $vacina['reforco_recomendado_minimo'] ?? '' ?>"
                                placeholder="Reforço" />
                        </div>

                    </div>

                    <div class="c-info__input">
                        <label for="esquema_basico">Esquema básico</label>
                        <input type="text" name="esquema_basico" id="esquema_basico" class="c-input"
                            value="<?= $vacina['esquema_basico'] ?? '' ?>" placeholder="30 dias" />
                    </div>

                    <div class="c-info__input">
                        <label for="tipo_etario">Tipo etario<span class="c-input__required">*</span></label>
                        <select name="tipo_etario" id="tipo_etario" class="c-input c-input__select">
                            <option value="1" <?= $vacina['tipo_etario_fk'] === 1 ? 'selected' : '' ?>>Infantil</option>
                            <option value="2" <?= $vacina['tipo_etario_fk'] === 2 ? 'selected' : '' ?>>Adolescente</option>
                        </select>
                    </div>

                    <div class="c-buttons">
                        <input type="submit" name="button" value="Atualizar" class="c-button__primary" />
                        <input type="submit" name="button" value="Excluir" class="c-button__secondary" />
                    </div>
                </form>
    </section>
    <script src="./public/assets/js/main.js"></script>
</body>

</html>