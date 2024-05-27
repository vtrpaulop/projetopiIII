<?php

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inclui o arquivo de configuração do banco de dados
    require_once 'autentica.php';

    // Verifica o login
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    // Consulta o banco de dados para verificar as credenciais
    // Usando prepared statements para evitar SQL injection
    $sql = $conn->prepare("SELECT id, nome, sobreNome, senha, funcao_fk FROM usuarios WHERE cpf = ?");
    $sql->bind_param("s", $cpf);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows == 1) {
        // Usuário encontrado, verifica a senha
        $row = $result->fetch_assoc();
        if (password_verify($senha, $row['senha'])) {
            // Login bem-sucedido, define as variáveis de sessão e redireciona para o painel de controle
            $sql_funcao = $conn->prepare("SELECT nome FROM funcoes WHERE id = ?");
            $sql_funcao->bind_param("i", $row['funcao_fk']);
            $sql_funcao->execute();
            $user_funcao = $sql_funcao->get_result()->fetch_assoc();
            \Core\Session::setUser($row['id'], $row['nome'], $row['sobreNome'], $user_funcao['nome']);
            $_SESSION['logged_in'] = true;
            $_SESSION['usuario_id'] = $row['id'];
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['sobrenome'] = $row['sobreNome'];
            header("Location: /dashboard");
            exit;
        } else {
            // Senha incorreta, define mensagem de erro
            $mensagem_erro = "Credenciais inválidas. Por favor, tente novamente.";
        }
    } else {
        // Usuário não encontrado, define mensagem de erro
        $mensagem_erro = "Credenciais inválidas. Por favor, tente novamente.";
    }
    // Fechar a conexão após o uso
    $conn->close();
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
                    <form action="/login" method="post" class="c-form">
                        <div class="c-info__input">
                            <label for="cpf">Cpf</label>
                            <input type="text" name="cpf" id="cpf" placeholder="000.000.000-00" class="c-input"
                                required />
                        </div>
                        <div class="c-info__input">
                            <label for="senha">Senha</label>
                            <input type="password" name="senha" id="senha" placeholder="********" class="c-input"
                                required />
                            <a href="/reset-senha" class="c-link c-login__senha">Esqueci a senha</a>
                        </div>
                        <div class="c-buttons">
                            <input type="submit" value="Entrar" class="c-button__primary" />
                            <a href="/">
                                <div class="c-button__secondary">Voltar</div>
                            </a>
                        </div>
                    </form>
                    <?php if (isset($mensagem_erro)): ?>
                        <div class="c-login__erro">
                            <?php echo $mensagem_erro; ?>
                        </div>
                    <?php endif; ?>
                    <div class="c-login__cadastro">
                        <p>
                            Ainda não tem uma conta?
                            <a href="\cadastro" class="c-link">Cadastre-se</a>!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>