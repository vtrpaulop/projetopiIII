<?php

if (!($_GET['id'] ?? null) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    \Core\Routes::abort();
}

$db = new \Core\Database(require base_path('/config.php'));

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
    view('/usuarios-atrelar-vacinas', [
        'id' => $id,
        'vacinas' => $vacinas
    ]);
}
