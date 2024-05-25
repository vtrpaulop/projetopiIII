<?php

$usuario = \Core\Session::getUser();

$db = new \Core\Database(require './config.php');
$sql_vacinas_tomadas = "SELECT * FROM (vacinas JOIN vacinas_tomadas ON vacinas.id = vacinas_tomadas.vacina_fk) WHERE usuario_fk = :id ORDER BY data_vacina DESC";
$sql_vacinas_marcadas = "SELECT * FROM (vacinas JOIN vacinas_marcadas ON vacinas.id = vacinas_marcadas.vacina_fk) WHERE usuario_fk = :id ORDER BY data_vacina DESC";
$vacinas_tomadas = $db->query($sql_vacinas_tomadas, ['id' => $usuario['id']])->findAll() ?? null;
$vacinas_marcadas = $db->query($sql_vacinas_marcadas, ['id' => $usuario['id']])->findAll() ?? null;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/assets/css/default.css" />
    <link rel="stylesheet" href="/assets/css/components.css" />
    <link rel="stylesheet" href="/assets/css/dashboard.css" />
    <link rel="stylesheet" href="/assets/css/vacinas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard - Carteirinha</title>
</head>

<body>

    <?= require './dashboard-menu.php' ?>

    <section class="c-section">
        <div class="c-section__title">
        </div>

        <div class="c-blocos">
            <div class="c-bloco__large c-bloco__large__vacinas">
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

            <div class="c-bloco__large c-bloco__large__vacinas">
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
        </div>
    </section>
</body>

</html>