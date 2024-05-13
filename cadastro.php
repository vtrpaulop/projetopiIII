<?php
require_once 'autentica.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Processamento dos dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senha_confirmar = $_POST['senha__confirmar'];

    // Verifica se os campos obrigatórios estão preenchidos
    if(empty($nome) || empty($email) || empty($senha) || empty($senha_confirmar)) {
        die("Por favor, preencha todos os campos.");
    }

    // Verifica se a senha corresponde à confirmação de senha
    if($senha !== $senha_confirmar) {
        die("As senhas não correspondem.");
    }

    // Verifica se o e-mail já existe no banco de dados
    $sql_check_email = "SELECT * FROM Usuarios WHERE email = '$email'";
    $result_check_email = $conn->query($sql_check_email);

    if ($result_check_email->num_rows > 0) {
        // O e-mail já está em uso, exibe uma mensagem de erro
        die("O e-mail já está em uso. Por favor, escolha outro.");
    } else {
        // O e-mail é único, pode proceder com a inserção no banco de dados

        // Hash da senha
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        // Inserção dos dados no banco de dados
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha_hash')";

        if ($conn->query($sql) === TRUE) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro ao cadastrar: " . $conn->error;
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/assets/css/default.css" />
    <link rel="stylesheet" href="/assets/css/components.css" />
    <link rel="stylesheet" href="/assets/css/cadastro.css" />
    <title>Cadastro</title>
</head>
<body>
<section class="c-login">
    <div class="c-screen-width">
        <div class="c-login__section">
            <div class="c-login__left"></div>
            <div class="c-login__right">
                <h1 class="c-login__title">Criar uma conta</h1>
                <form action="cadastro.php" method="post" class="c-login__form">
                    <div class="c-login__input">
                        <label for="nome">Nome</label>
                        <input
                                type="text"
                                name="nome"
                                id="nome"
                                placeholder="Nome"
                                class="c-input"
                        />
                    </div>
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
                                type="text"
                                name="senha"
                                id="senha"
                                placeholder="Senha"
                                class="c-input"
                        />
                    </div>
                    <div class="c-login__input">
                        <label for="senha">Confirmar a senha</label>
                        <input
                                type="text"
                                name="senha__confirmar"
                                id="senha__confirmar"
                                placeholder="Confimar a senha"
                                class="c-input"
                        />
                    </div>
                    <input
                            type="submit"
                            value="Cadastrar"
                            class="c-button__primary"
                    />                                    

                    
                </form>
                <a href="index.html"> <input
                            type="submit"
                            value="Voltar"
                            class="c-button__primary"
                    />  </a>

            </div>
        </div>
    </div>
</section>
</body>
</html>
