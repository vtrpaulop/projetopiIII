<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= assets("/css/default.css") ?>" />
    <link rel="stylesheet" href="<?= assets("/css/components.css") ?>" />
    <link rel="stylesheet" href="<?= assets("/css/dashboard.css") ?>" />
    <link rel="stylesheet" href="<?= assets("/css/usuarios-info.css") ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard - Informações Usuários</title>
</head>

<body>

    <?php partial('/dashboard-menu') ?>
    <?php partial('/notification') ?>

    <section class="c-section">
        <div class="c-blocos">
            <div class="c-bloco__large">
                <h1 class="c-bloco__large__title">Informações Usuário</h1>

                <div class="c-info">
                    <h2 class="c-info__title">Nome completo</h2>
                    <p class="c-info__description"><?= "{$usuario['nome']} {$usuario['sobreNome']}" ?></p>
                </div>

                <div class="c-info">
                    <h2 class="c-info__title">CPF</h2>
                    <p class="c-info__description"><?= $usuario['cpf'] ?></p>
                </div>

                <div class="c-info">
                    <h2 class="c-info__title">RG</h2>
                    <p class="c-info__description"><?= $usuario['rg'] ?></p>
                </div>

                <div class="c-info">
                    <h2 class="c-info__title">Cartão SUS</h2>
                    <p class="c-info__description"><?= $usuario['cartaoSus'] ?></p>
                </div>

                <div class="c-info">
                    <h2 class="c-info__title">Data de nascimento</h2>
                    <p class="c-info__description"><?= $usuario['data_nascimento'] ?></p>
                </div>

                <div class="c-info">
                    <h2 class="c-info__title">Telefone</h2>
                    <p class="c-info__description"><?= $usuario['telefone'] ?></p>
                </div>

                <div class="c-info">
                    <h2 class="c-info__title">Endereço</h2>
                    <p class="c-info__description"><?= "{$usuario['endereco']} - {$usuario['bairro']}" ?></p>
                </div>

                <div class="c-info">
                    <h2 class="c-info__title">Email</h2>
                    <p class="c-info__description"><?= $usuario['email'] ?></p>
                </div>

                <div class="c-buttons">
                    <a href="usuarios-atrelar-vacina?id=<?= $usuario['id'] ?>"><button
                            class="c-button__primary">Atrelar
                            Vacina</button></a>
                    <a href="usuarios-editar?id=<?= $usuario['id'] ?>"><button class="c-button__secondary">Editar
                            Usuário</button></a>
                </div>
            </div>

            <div class="c-bloco__large">
                <h2 class="c-bloco__large__title" id="vacinas-marcada">Vacinas Pendentes</h2>
                <?php if ($vacinas_marcadas): ?>
                    <table class="c-table">
                        <tr>
                            <th class="c-table__th">Nome da Vacina</th>
                            <th class="c-table__th">Proteção</th>
                            <th class="c-table__th">Número de Doses</th>
                            <th class="c-table__th">Idade Recomendada</th>
                            <th class="c-table__th">Intervalo entre Doses</th>
                            <th class="c-table__th">Esquema Básico</th>
                            <th class="c-table__th">Reforço Recomendado Mínimo</th>
                        </tr>

                        <?php foreach ($vacinas_marcadas as $vacina): ?>
                            <tr>
                                <td class="c-table__td"><?= $vacina['nome'] ?></td>
                                <td class="c-table__td"><?= $vacina['protecao_contra'] ?></td>
                                <td class="c-table__td"><?= $vacina['numero_doses'] ?></td>
                                <td class="c-table__td"><?= $vacina['idade_recomendada'] ?></td>
                                <td class="c-table__td"><?= $vacina['intervalo_entre_doses'] ?></td>
                                <td class="c-table__td"><?= $vacina['esquema_basico'] ?></td>
                                <td class="c-table__td"><?= $vacina['reforco_recomendado_minimo'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php else: ?>
                    <p>Nenhuma vacina marcada por enquanto.</p>
                <?php endif; ?>
            </div>

            <div class="c-bloco__large">
                <h2 class="c-bloco__large__title" id="vacinas-tomadas">Vacinas já tomadas</h2>

                <?php if ($vacinas_tomadas): ?>
                    <table>
                        <tr>
                            <th class="c-table__th">Nome da Vacina</th>
                            <th class="c-table__th">Proteção</th>
                            <th class="c-table__th">Número de Doses</th>
                            <th class="c-table__th">Idade Recomendada</th>
                            <th class="c-table__th">Intervalo entre Doses</th>
                            <th class="c-table__th">Esquema Básico</th>
                            <th class="c-table__th">Reforço Recomendado Mínimo</th>
                        </tr>

                        <?php foreach ($vacinas_tomadas as $vacina): ?>
                            <tr>
                                <td class="c-table__td"><?= $vacina['nome'] ?></td>
                                <td class="c-table__td"><?= $vacina['protecao_contra'] ?></td>
                                <td class="c-table__td"><?= $vacina['numero_doses'] ?></td>
                                <td class="c-table__td"><?= $vacina['idade_recomendada'] ?></td>
                                <td class="c-table__td"><?= $vacina['intervalo_entre_doses'] ?></td>
                                <td class="c-table__td"><?= $vacina['esquema_basico'] ?></td>
                                <td class="c-table__td"><?= $vacina['reforco_recomendado_minimo'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php else: ?>
                    <p>Nenhuma vacina tomada até agora.</p>
                <?php endif; ?>

            </div>
    </section>
    <script src="<?= assets("/js/main.js") ?>"></script>
</body>

</html>