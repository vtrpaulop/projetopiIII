<?php
$db = new \Core\Database(require './config.php');

$vacinas_infantil = $db->query("SELECT * FROM vacinas WHERE tipo_etario_fk = 1")->findAll();
$vacinas_adolescente = $db->query("SELECT * FROM vacinas WHERE tipo_etario_fk = 2")->findAll();


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
    <title>Dashboard - Tabela de vacinas</title>
</head>

<body>

    <?= require './dashboard-menu.php' ?>

    <section class="c-section">
        <div class="c-section__title">
        </div>

        <div class="c-blocos">
            <div class="c-bloco__large c-bloco__large__vacinas">
                <h1 class="c-bloco__large__title">Todas as vacinas para infantil</h1>
                <table>
                    <tr>
                        <th class="c-vacinas__table__th"> </th>
                        <th class="c-vacinas__table__th">Nome da Vacina</th>
                        <th class="c-vacinas__table__th">Proteção Contra</th>
                        <th class="c-vacinas__table__th">Número de Doses</th>
                        <th class="c-vacinas__table__th">Idade Recomendada</th>
                        <th class="c-vacinas__table__th">Intervalo entre Doses</th>
                        <th class="c-vacinas__table__th">Esquema Básico</th>
                        <th class="c-vacinas__table__th">Reforço Recomendado Mínimo</th>
                    </tr>

                    <?php foreach ($vacinas_infantil as $vacina): ?>
                        <tr>
                            <td class="c-vacinas__table__td">
                                <a href="/vacinas-editar?id=<?= $vacina['id'] ?>">
                                    <i class="fa-solid fa-pen-to-square c-vacinas__icon__edit"></i>
                                </a>
                            </td>
                            <td class="c-vacinas__table__td"><?= $vacina['nome'] ?></td>
                            <td class="c-vacinas__table__td"><?= $vacina['protecao_contra'] ?></td>
                            <td class="c-vacinas__table__td"><?= $vacina['numero_doses'] ?></td>
                            <td class="c-vacinas__table__td"><?= $vacina['idade_recomendada'] ?></td>
                            <td class="c-vacinas__table__td"><?= $vacina['intervalo_entre_doses'] ?></td>
                            <td class="c-vacinas__table__td"><?= $vacina['esquema_basico'] ?></td>
                            <td class="c-vacinas__table__td"><?= $vacina['reforco_recomendado_minimo'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="c-bloco__large c-bloco__large__vacinas">
                <h1 class="c-bloco__large__title">Todas as vacinas para adolescente</h1>
                <table>
                    <tr>
                        <th class="c-vacinas__table__th"> </th>
                        <th class="c-vacinas__table__th">Nome da Vacina</th>
                        <th class="c-vacinas__table__th">Proteção Contra</th>
                        <th class="c-vacinas__table__th">Número de Doses</th>
                        <th class="c-vacinas__table__th">Idade Recomendada</th>
                        <th class="c-vacinas__table__th">Intervalo entre Doses</th>
                        <th class="c-vacinas__table__th">Esquema Básico</th>
                        <th class="c-vacinas__table__th">Reforço Recomendado Mínimo</th>
                    </tr>

                    <?php foreach ($vacinas_adolescente as $vacina): ?>
                        <tr>
                            <td class="c-vacinas__table__td">
                                <a href="/vacinas-editar?id=<?= $vacina['id'] ?>">
                                    <i class="fa-solid fa-pen-to-square c-vacinas__icon__edit"></i>
                                </a>
                            </td>
                            <td class="c-vacinas__table__td"><?= $vacina['nome'] ?></td>
                            <td class="c-vacinas__table__td"><?= $vacina['protecao_contra'] ?></td>
                            <td class="c-vacinas__table__td"><?= $vacina['numero_doses'] ?></td>
                            <td class="c-vacinas__table__td"><?= $vacina['idade_recomendada'] ?></td>
                            <td class="c-vacinas__table__td"><?= $vacina['intervalo_entre_doses'] ?></td>
                            <td class="c-vacinas__table__td"><?= $vacina['esquema_basico'] ?></td>
                            <td class="c-vacinas__table__td"><?= $vacina['reforco_recomendado_minimo'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </section>
</body>

</html>