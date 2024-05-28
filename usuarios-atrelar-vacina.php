<?php

if (!($_GET['id'] ?? null) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    \Core\Routes::abort();
}

$db = new \Core\Database(require './config.php');

if (!empty($_POST)) {
    $id_usuario = $_POST['id'];
    $id_vacina = $_POST['vacina'];
    $data_vacina = $_POST['data_vacina'];

    $tipo = "";

    if ($_POST['funcao'] === 'pendente') {
        $tipo = "vacinas_marcadas";
    } elseif ($_POST['funcao'] === 'concluida') {
        $tipo = "vacinas_tomadas";
    }

    $sql = "INSERT INTO {$tipo} (usuario_fk, vacina_fk, data_vacina) VALUES (:usuario, :vacina, :data_vacina);";

    try {
        $db->query($sql, [
            'usuario' => $id_usuario,
            'vacina' => $id_vacina,
            'data_vacina' => $data_vacina
        ]);

        \Core\Notification::set('success', 'Vacina atrelada com sucesso.');
        redirect("/usuarios-info?id={$id_usuario}");
    } catch (\PDOException $ex) {
        dd($ex);
        \Core\Session::setTemp('vacina', 'Essa vacina já está atrelada ao usuário');
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    $vacinas = $db->query("SELECT * FROM vacinas")->findAll();
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
    <title>Dashboard - Atrelar Vacina</title>
</head>

<body>

    <?= require './dashboard-menu.php' ?>

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