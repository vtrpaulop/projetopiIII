<?php

use \core\Session;

if (!($_GET['id'] ?? null) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    \Core\Routes::abort();
}

$id_get = $_GET['id'] ?? null;

if (!empty($_POST) && $_POST['button'] === 'Atualizar') {

    $id = $_POST['id'];

    if ($_POST['senha'] != $_POST['senha-confirmar']) {
        Session::setTemp('senha', 'A senha não está igual');
        header("Location: /usuario-senha?id={$id}");
        exit();
    }

    $db = new \Core\Database(require './config.php');

    $senha_atual = $db->query("SELECT senha FROM usuarios WHERE id = :id", ['id' => $id])->find()['senha'];

    if (!password_verify($_POST['senha-atual'], $senha_atual)) {
        Session::setTemp('senha', 'A senha atual não corresponde com a sua senha');
        header("Location: /usuario-senha?id={$id}");
        exit();
    }

    if (password_verify($_POST['senha'], $senha_atual)) {
        Session::setTemp('senha', 'A senha é a mesma que a atual');
        header("Location: /usuario-senha?id={$id}");
        exit();
    }

    $senha_hash = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $sql = "UPDATE usuarios SET senha = :senha WHERE id = :id";

    try {
        $db->query($sql, ['id' => $id, 'senha' => $senha_hash]);
    } catch (\PDOException $ex) {
        dd($ex);
    }

    header("Location: /usuario?id={$id}");
    exit();
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
    <title>Dashboard - Editar Senha</title>
</head>

<body>

    <?= require './dashboard-menu.php' ?>

    <section class="c-section">
        <div class="c-section__title">
        </div>

        <div class="c-blocos">
            <div class="c-bloco__large">
                <h1 class="c-bloco__large__title">Editar Senha</h1>

                <form action="/usuario-senha" class="c-form" method="POST">
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
                        <p><?= Session::getTemp('senha') ?></p>
                    </div>

                    <div class="c-buttons">
                        <input type="submit" name="button" value="Atualizar" class="c-button__primary" />
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>