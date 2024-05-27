<?php

use Core\Middleware;

if (!($_GET['id'] ?? null) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    \Core\Routes::abort();
}

$db = new \Core\Database(require './config.php');

if (!empty($_POST) && $_POST['button'] === 'Atualizar') {

    $id = $_POST['id'];
    $chaves_excluidas = ['id', 'button', 'funcao'];
    $valores = array_filter($_POST, fn($key) => array_search($key, $chaves_excluidas) === false, ARRAY_FILTER_USE_KEY);
    unset($valores['senha-confirmar']);
    $valores = array_merge($valores, ['funcao_fk' => $_POST['funcao']]);

    if (empty($_POST['senha'])) {
        unset($valores['senha']);
    } else {
        if ($_POST['senha'] != $_POST['$senha_confirmar']) {
            header("Location: /usuarios-editar?id={$id}");
            exit();
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
    } catch (\PDOException $ex) {
        dd($ex);
    }

    if ($id === \Core\Session::getUser()['id']) {
        $sql_funcao = "SELECT nome FROM funcoes WHERE id = :id";
        $funcao = $db->query($sql_funcao, ['id' => $_POST['funcao']])->find();
        \Core\Session::setUser($id, $_POST['nome'], $_POST['sobreNome'], $funcao['nome']);
    }

    header("Location: /usuarios");
    exit();

} elseif (!empty($_POST) && $_POST['button'] === 'Excluir') {
    $sql = "DELETE FROM usuarios WHERE id = :id";
    $db->query($sql, ['id' => $_POST['id']]);
    header("Location: /usuarios");
    exit();
}

$usuario = $db->query("SELECT * FROM usuarios WHERE id = :id", ['id' => $_GET['id']])->find();
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
    <title>Dashboard - Editar Usuário</title>
</head>

<body>

    <?= require './dashboard-menu.php' ?>

    <section class="c-section">
        <div class="c-section__title">
        </div>

        <div class="c-blocos">
            <div class="c-bloco__large">
                <h1 class="c-bloco__large__title">Editar Usuário</h1>

                <form action="/usuarios-editar" class="c-form" method="POST">
                    <input type="hidden" name="id" value="<?= $usuario['id'] ?? '' ?>">

                    <div class="c-input__group">
                        <div class="c-info__input">
                            <label for="nome">Nome<span class="c-input__required">*</span></label>
                            <input type="text" name="nome" id="nome" class="c-input" placeholder="João da Silva"
                                value="<?= $usuario['nome'] ?? '' ?>" required />
                        </div>
                        <div class="c-info__input">
                            <label for="sobreNome">Sobrenome<span class="c-input__required">*</span></label>
                            <input type="text" name="sobreNome" id="sobreNome" class="c-input" placeholder="Ribeiro"
                                value="<?= $usuario['sobreNome'] ?? '' ?>" required />
                        </div>
                    </div>

                    <div class="c-input__group">
                        <div class="c-info__input">
                            <label for="cpf">CPF<span class="c-input__required">*</span></label>
                            <input type="text" name="cpf" id="cpf" class="c-input"
                                placeholder="Polissacarídeos capsulares purificados da Neisseria meningitidis do sorogrupo C"
                                value="<?= $usuario['cpf'] ?? '' ?>" />
                        </div>
 
                        <div class="c-info__input">
                            <label for="rg">RG<span class="c-input__required">*</span></label>
                            <input type="text" name="rg" id="rg" class="c-input"
                                placeholder="Meningite meningocócica tipo C"
                                value="<?= $usuario['rg'] ?? '' ?>" required />
                        </div>
                   </div>

                        <div class="c-info__input">
                            <label for="cartaoSus">Cartão SUS<span class="c-input__required">*</span></label>
                            <input type="text" name="cartaoSus" id="cartaoSus" class="c-input"
                                placeholder="2 doses" value="<?= $usuario['cartaoSus'] ?? '' ?>" required />
                        </div>

                        <div class="c-info__input">
                            <label for="data_nascimento">Data de nascimento<span class="c-input__required">*</span></label>
                            <input type="date" name="data_nascimento" id="data_nascimento" class="c-input"
                                value="<?= $usuario['data_nascimento'] ?? '' ?>"
                                placeholder="60 dias entre a 1ª dose e 2ª dose, 60 dias entre a 2ª dose e o reforço" />
                        </div>

                    <div class="c-input__group">
                        <div class="c-info__input">
                            <label for="endereco">
                                Endereço<span class="c-input__required">*</span>
                            </label>
                            <input type="text" name="endereco" id="endereco" class="c-input"
                                value="<?= $usuario['endereco'] ?? '' ?>"
                                placeholder="1ª dose: 3 meses, 2ª dose: 5 meses, Reforço: 12 meses" required />
                        </div>

                        <div class="c-info__input">
                            <label for="bairro">Bairro<span class="c-input__required">*</span></label>
                            <input type="text" name="bairro" id="bairro"
                                class="c-input" value="<?= $usuario['bairro'] ?? '' ?>"
                                placeholder="Centro" />
                        </div>
                    </div>

                    <div class="c-info__input">
                        <label for="email">Email<span class="c-input__required">*</span></label>
                        <input type="text" name="email" id="email" class="c-input"
                            value="<?= $usuario['email'] ?? '' ?>" placeholder="30 dias" />
                    </div>

                    <?php if (Middleware::authorized(\Core\Supervisor::class)): ?>
                    <div class="c-input__group">
                    <div class="c-info__input">
                        <label for="senha">Senha</label>
                        <input type="text" name="senha" id="senha" class="c-input"
                             placeholder="********" />
                    </div>

                    <div class="c-info__input">
                        <label for="senha-confirmar">Confirmar senha</label>
                        <input type="text" name="senha-confirmar" id="senha-confirmar" class="c-input"
                             placeholder="********" />
                    </div>
                    </div>
                    <?php endif; ?>

                    <div class="c-info__input">
                        <label for="funcao">Função<span class="c-input__required">*</span></label>
                        <select name="funcao" id="funcao" class="c-input c-input__select">
                            <option value="1" <?= $usuario['funcao_fk'] === 1 ? 'selected' : '' ?>>Usuário</option>
                            <?php if (Middleware::authorized(\Core\Administrador::class)): ?>
                            <option value="2" <?= $usuario['funcao_fk'] === 2 ? 'selected' : '' ?>>Administrador
                            </option>
                            <option value="3" <?= $usuario['funcao_fk'] === 3 ? 'selected' : '' ?>>Supervisor</option>
                            <?php endif; ?>
                            <?php if (Middleware::authorized(\Core\Supervisor::class)): ?>
                            <option value="4" <?= $usuario['funcao_fk'] === 4 ? 'selected' : '' ?>>Colaborador</option>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div class="c-buttons">
                        <input type="submit" name="button" value="Atualizar" class="c-button__primary" />
                        <?php if (Middleware::authorized(\Core\Supervisor::class)): ?>
                        <input type="submit" name="button" value="Excluir" class="c-button__secondary" />
                        <?php endif; ?>
                    </div>
                </form>
                </div>
                </div>
    </section>
</body>
