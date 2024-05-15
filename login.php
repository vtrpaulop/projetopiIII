<?php
session_start();

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inclui o arquivo de configuração do banco de dados
    require_once 'autentica.php';

    // Verifica o login
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Consulta o banco de dados para verificar as credenciais
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Usuário encontrado, verifica a senha
        $row = $result->fetch_assoc();
        if (password_verify($senha, $row['senha'])) {
            // Login bem-sucedido, define a variável de sessão e redireciona para o painel de controle
            $_SESSION['logged_in'] = true;
            header("Location: painel.php");
            exit;
        } else {
            // Senha incorreta, define mensagem de erro
            $mensagem_erro = "Credenciais inválidas. Por favor, tente novamente.";
        }
    } else {
        // Usuário não encontrado, define mensagem de erro
        $mensagem_erro = "Credenciais inválidas. Por favor, tente novamente.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/default.css">
    <link rel="stylesheet" href="/assets/css/components.css">
    <link rel="stylesheet" href="/assets/css/login.css">
    <title>Login</title>
</head>
<body>
<section class="c-login">
    <div class="c-screen-width">
        <div class="c-login__section">
            <div class="c-login__left"></div>
            <div class="c-login__right">
                <h1 class="c-login__title">Entrar na conta</h1>
                <form action="login.php" method="post" class="c-login__form">
                    <div class="c-login__input">
                        <label for="email">Email</label>
                        <input
                                type="text"
                                name="email"
                                id="email"
                                placeholder="E-mail"
                                class="c-input"
                        />
                    </div>
                    <div class="c-login__input">
                        <label for="senha">Senha</label>
                        <input
                                type="password"
                                name="senha"
                                id="senha"
                                placeholder="Senha"
                                class="c-input"
                        />
                        <a href="/reset-senha" class="c-link c-login__senha">Esqueci a senha</a>
                    </div>
                    <input type="submit" value="Entrar" class="c-button__primary" />
                </form>
                <a href="./index.html"><input type="submit" value="Voltar" class="c-button__primary" /></a>
                <?php if(isset($mensagem_erro)): ?>
                <div class="c-login__erro">
                    <?php echo $mensagem_erro; ?>
                </div>
                <?php endif; ?>
                <div class="c-login__cadastro">
                    <p>
                        Ainda não tem uma conta?
                        <a href=".\cadastro.php" class="c-link">Cadastre-se</a>!
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
