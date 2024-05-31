<?php

use Core\Notification;

if (!($_GET['id'] ?? null) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    \Core\Routes::abort();
}

$db = new \Core\Database(require base_path('/config.php'));

if (!empty($_POST) && $_POST['button'] === 'Atualizar') {

    $id = $_POST['id'];
    $intervalo_entre_doses = $_POST['intervalo_doses'];
    $tipo_etario_fk = $_POST['tipo_etario'];
    $chaves_excluidas = ['id', 'button', 'tipo_etario', 'intervalo_doses'];
    $valores = array_filter($_POST, fn($key) => array_search($key, $chaves_excluidas) === false, ARRAY_FILTER_USE_KEY);
    $valores = array_merge($valores, [
        'intervalo_entre_doses' => $intervalo_entre_doses,
        'tipo_etario_fk' => $tipo_etario_fk
    ]);

    $valores_formatado = "";

    foreach ($valores as $key => $value) {
        $valores_formatado = $valores_formatado . "{$key}='{$value}', ";
    }

    $valores_formatado = substr($valores_formatado, 0, strlen($valores_formatado) - 2);

    $sql = "UPDATE vacinas SET {$valores_formatado} WHERE id = :id";

    try {
        $db->query($sql, ['id' => $id]);
        Notification::set('success', 'A vacina foi alterada com sucesso.');
    } catch (\PDOException $ex) {
        Notification::set('error', 'Erro ao alterar a vacina, consulte o administrador.');
        dd($sql);
    }

    redirect('/vacinas');

} elseif (!empty($_POST) && $_POST['button'] === 'Excluir') {
    $sql = "DELETE FROM vacinas WHERE id = :id";
    $db->query($sql, ['id' => $_POST['id']]);
    Notification::set('success', 'Vacina deletada com sucesso.');
    redirect('/vacinas');
}

$vacina = $db->query("SELECT * FROM vacinas WHERE id = :id", ['id' => $_GET['id']])->find();

view('/vacinas-editar', [
    'vacina' => $vacina
]);
