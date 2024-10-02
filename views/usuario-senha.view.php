<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= assets("/css/default.css") ?>" />
    <link rel="stylesheet" href="<?= assets("/css/components.css") ?>" />
    <link rel="stylesheet" href="<?= assets("/css/dashboard.css") ?>" />
    <link rel="stylesheet" href="<?= assets("/css/cadastro-vacina.css") ?>">
    <title>Dashboard - Editar Senha</title>
</head>

<body>

    <?php partial('/dashboard-menu') ?>

    <section class="c-section">
        <div class="c-section__title">
        </div>

        <div class="c-blocos">
            <div class="c-bloco__large">
                <h1 class="c-bloco__large__title">Editar Senha</h1>

                <form action="usuario-senha" class="c-form" method="POST">
                    <input type="hidden" name="id" value="<?= $id_get ?? '' ?>">

                    <div class="c-info__input">
                        <label for="senha-atual">Senha atual<span class="c-input__required">*</span></label>
                        <input type="password" name="senha-atual" id="senha-atual" class="c-input"
                            placeholder="********" required />
                    </div>

                    <div class="c-input__group">
                        <div class="c-info__input">
                            <label for="senha">Nova senha<span class="c-input__required">*</span></label>
                            <input type="password" name="senha" id="senha" class="c-input" placeholder="********"
                                required />
                        </div>
                        <div class="c-info__input">
                            <label for="senha-confirmar">Confirmar nova senha<span
                                    class="c-input__required">*</span></label>
                            <input type="password" name="senha-confirmar" id="senha-confirmar" class="c-input"
                                placeholder="********" required />
                        </div>
                    </div>
                    <div>
                        <p><?= \Core\Session::getTemp('senha') ?></p>
                    </div>

                    <div class="c-buttons">
                        <input type="submit" name="button" value="Atualizar" class="c-button__primary" />
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>