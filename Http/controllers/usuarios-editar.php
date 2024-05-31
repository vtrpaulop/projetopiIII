<?php

use Core\Middleware;
use Core\Validator;

if (!($_GET['id'] ?? null) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    \Core\Routes::abort();
}

$db = new \Core\Database(require base_path('/config.php'));

if (!empty($_POST) && $_POST['button'] === 'Atualizar') {

    $id = $_POST['id'];
    $chaves_excluidas = ['id', 'button', 'funcao'];
    $valores = array_filter($_POST, fn($key) => array_search($key, $chaves_excluidas) === false, ARRAY_FILTER_USE_KEY);

    unset($valores['senha-confirmar']);
    $valores = array_merge($valores, ['funcao_fk' => $_POST['funcao']]);

    foreach ($valores as $key => $value) {
        if ($key === 'email') {
            $valores[$key] = Validator::email($value);
        } else {
            $valores[$key] = Validator::string($value);
        }
    }

    if (empty($_POST['senha'])) {
        unset($valores['senha']);
    } else {
        if ($_POST['senha'] != $_POST['$senha_confirmar']) {
            redirect("/usuarios-editar?id={$id}");
        }

        $senha_hash = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $valores['senha'] = $senha_hash;
    }

    $valores_formatado = "";

    foreach ($valores as $key => $value) {
        $valores_formatado = $valores_formatado . "{$key}='{$value}', ";
    }

    $valores_formatado = substr($valores_formatado, 0, strlen($valores_formatado) - 2);

    $sql = "UPDATE usuarios SET {$valores_formatado} WHERE id = :id";

    try {
        $db->query($sql, ['id' => $id]);
        \Core\Notification::set('success', 'Usuário alterado com sucesso.');
    } catch (\PDOException $ex) {
        dd($ex);
    }

    if ($id === \Core\Session::getUser()['id']) {
        $sql_funcao = "SELECT nome FROM funcoes WHERE id = :id";
        $funcao = $db->query($sql_funcao, ['id' => $_POST['funcao']])->find();
        \Core\Session::setUser($id, $_POST['nome'], $_POST['sobreNome'], $funcao['nome']);
    }

    redirect('/usuarios');

} elseif (!empty($_POST) && $_POST['button'] === 'Excluir') {
    $sql = "DELETE FROM usuarios WHERE id = :id";
    $db->query($sql, ['id' => $_POST['id']]);

    \Core\Notification::set('success', 'Usuário deletado com sucesso.');

    redirect('/usuarios');
}

$usuario = $db->query("SELECT * FROM usuarios WHERE id = :id", ['id' => $_GET['id']])->find();

view('/usuarios-editar', [
    'usuario' => $usuario
]);