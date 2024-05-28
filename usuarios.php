<?php
$db = new \Core\Database(require './config.php');
if ($_GET['cpf'] ?? null) {
    $sql = "SELECT id, nome, sobreNome, cpf, data_nascimento, telefone, bairro FROM usuarios WHERE cpf = :cpf";
    $usuarios = $db->query($sql, ['cpf' => $_GET['cpf']])->findAll();
} else {
    $sql = "SELECT id, nome, sobreNome, cpf, data_nascimento, telefone, bairro FROM usuarios ORDER BY (nome) LIMIT 10";
    $usuarios = $db->query($sql)->findAll();
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
    <link rel="stylesheet" href="/assets/css/usuarios.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard - Listar</title>
</head>

<body>

    <?= require './dashboard-menu.php' ?>
    <?= require './notification.php' ?>

    <section class="c-section">
        <div class="c-blocos">
            <div class="c-bloco__large">
                <h1 class="c-bloco__large__title">Listar usuários</h1>

                <form action="/usuarios" method="GET">
                    <div class="c-input__group c-procurar">
                        <input type="text" class="c-input" name="cpf" id="cpf" placeholder="CPF">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>

                <table class="c-table">
                    <tr>
                        <?php if (\Core\Middleware::authorized(\Core\Supervisor::class)): ?>
                            <th class="c-table__th"> </th>
                        <?php endif; ?>
                        <?php if (\Core\Middleware::authorized(\Core\Colaborador::class)): ?>
                            <th class="c-table__th"> </th>
                        <?php endif; ?>
                        <th class="c-table__th">Nome</th>
                        <th class="c-table__th">Sobrenome</th>
                        <th class="c-table__th">CPF</th>
                        <th class="c-table__th">Data de Nascimento</th>
                        <th class="c-table__th">Telefone</th>
                        <th class="c-table__th">Bairro</th>
                    </tr>

                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <?php if (\Core\Middleware::authorized(\Core\Supervisor::class)): ?>
                                <td class="c-table__td">
                                    <a href="/usuarios-editar?id=<?= $usuario['id'] ?>">
                                        <i class="fa-solid fa-pen-to-square c-table__icon__edit"></i>
                                    </a>
                                </td>
                            <?php endif; ?>
                            <?php if (\Core\Middleware::authorized(\Core\Colaborador::class)): ?>
                                <td class="c-table__td">
                                    <a href="/usuarios-info?id=<?= $usuario['id'] ?>">
                                        <i class="fa-solid fa-eye c-table__icon__edit"></i>
                                    </a>
                                </td>
                            <?php endif; ?>
                            <td class="c-table__td"><?= $usuario['nome'] ?></td>
                            <td class="c-table__td"><?= $usuario['sobreNome'] ?></td>
                            <td class="c-table__td"><?= $usuario['cpf'] ?></td>
                            <td class="c-table__td"><?= $usuario['data_nascimento'] ?></td>
                            <td class="c-table__td"><?= $usuario['telefone'] ?></td>
                            <td class="c-table__td"><?= $usuario['bairro'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </section>
    <script src="./assets/js/main.js"></script>
</body>

</html>