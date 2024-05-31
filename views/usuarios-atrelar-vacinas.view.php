<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/public/assets/css/default.css" />
    <link rel="stylesheet" href="/public/assets/css/components.css" />
    <link rel="stylesheet" href="/public/assets/css/dashboard.css" />
    <link rel="stylesheet" href="/public/assets/css/cadastro-vacina.css">
    <title>Dashboard - Atrelar Vacina</title>
</head>

<body>

    <?php partial('/dashboard-menu') ?>

    <section class="c-section">
        <div class="c-section__title">
        </div>

        <div class="c-blocos">
            <div class="c-bloco__large">
                <h1 class="c-bloco__large__title">Atrelar Vacina</h1>

                <form action="/usuarios-atrelar-vacina" class="c-form" method="POST">
                    <input type="hidden" name="id" value="<?= $id ?>">

                    <div class="c-input__group">
                        <div class="c-info__input">
                            <label for="data_vacina">Data da vacina<span class="c-input__required">*</span></label>
                            <input type="date" name="data_vacina" id="data_vacina" class="c-input" required />
                        </div>
                        <div class="c-info__input">
                            <label for="funcao">Tipo<span class="c-input__required">*</span></label>
                            <select name="funcao" id="funcao" class="c-input c-input__select" required>
                                <option value="" selected> </option>
                                <option value="pendente">Pendente</option>
                                <option value="concluida">Concluída</option>
                            </select>
                        </div>
                    </div>

                    <div class="c-info__input">
                        <label for="vacina">Vacina<span class="c-input__required">*</span></label>
                        <select name="vacina" id="vacina" class="c-input c-input__select" required>
                            <option value="" selected> </option>
                            <?php foreach ($vacinas as $vacina): ?>
                                <option value="<?= $vacina['id'] ?>"><?= $vacina['nome'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <?= \Core\Session::getTemp('vacina') ?? '' ?>
                    </div>

                    <div class="c-buttons">
                        <input type="submit" name="button" value="Atrelar" class="c-button__primary" />
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>