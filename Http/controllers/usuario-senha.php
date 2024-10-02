<?php

use \Core\Session;
use Core\Notification;

if (!($_GET['id'] ?? null) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    \Core\Routes::abort();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    view('/usuario-senha');
}

$id_get = $_GET['id'] ?? null;

if (!empty($_POST) && $_POST['button'] === 'Atualizar') {

    $id = $_POST['id'];

    if ($_POST['senha'] != $_POST['senha-confirmar']) {
        Session::setTemp('senha', 'A senha não está igual');
        redirect("/usuario-senha?id={$id}");
        exit();
    }

    $db = new \Core\Database(require base_path('/config.php'));

    $senha_atual = $db->query("SELECT senha FROM usuarios WHERE id = :id", ['id' => $id])->find()['senha'];

    if (!password_verify($_POST['senha-atual'], $senha_atual)) {
        Session::setTemp('senha', 'A senha atual não corresponde com a sua senha');
        redirect("/usuario-senha?id={$id}");
        exit();
    }

    if (password_verify($_POST['senha'], $senha_atual)) {
        Session::setTemp('senha', 'A senha é a mesma que a atual');
        redirect("/usuario-senha?id={$id}");
        exit();
    }

    $senha_hash = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $sql = "UPDATE usuarios SET senha = :senha WHERE id = :id";

    try {
        $db->query($sql, ['id' => $id, 'senha' => $senha_hash]);

        Notification::set('success', 'Senha alterada com sucesso.');
    } catch (\PDOException $ex) {
        Notification::set('error', 'Houve um erro ao atualizar a senha, consulte um administrador');
    }

    redirect("/usuario?id={$id}");
}
