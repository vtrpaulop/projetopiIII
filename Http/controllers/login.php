<?php

use Core\Validator;

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inclui o arquivo de configuração do banco de dados
    require_once 'autentica.php';

    // Verifica o login
    $cpf = Validator::string($_POST['cpf']);
    $senha = Validator::string($_POST['senha']);

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

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    view('/login');
}