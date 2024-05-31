<?php

use Core\Validator;

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "./autentica.php";
    // Processamento dos dados do formulário
    $nome = Validator::string($_POST['nome']);
    $sobreNome = Validator::string($_POST['sobreNome']);
    $rg = Validator::string($_POST['rg']);
    $cpf = Validator::string($_POST['cpf']);
    $dnascimento = Validator::string($_POST['dnascimento']);
    $telefone = Validator::string($_POST['telefone']);
    $cartaoSus = Validator::string($_POST['cartaoSus']);
    $endereco = Validator::string($_POST['endereco']);
    $bairro = Validator::string($_POST['bairro']);
    $email = Validator::email($_POST['email']);
    $senha = Validator::string($_POST['senha']);
    $senha_confirmar = Validator::string($_POST['senha__confirmar']);

    // Verifica se os campos obrigatórios estão preenchidos
    if (empty($nome) || empty($sobreNome) || empty($rg) || empty($cpf) || empty($dnascimento) || empty($telefone) || empty($cartaoSus) || empty($endereco) || empty($bairro) || empty($email) || empty($senha) || empty($senha_confirmar)) {
        die("Por favor, preencha todos os campos.");
    }

    // Verifica se a senha corresponde à confirmação de senha
    if ($senha !== $senha_confirmar) {
        die("As senhas não correspondem.");
    }

    // Verifica se o e-mail já existe no banco de dados
    $sql_check_email = "SELECT * FROM usuarios WHERE email = '$email'";
    $result_check_email = $conn->query($sql_check_email);

    if ($result_check_email->num_rows > 0) {
        // O e-mail já está em uso, exibe uma mensagem de erro
        die("O e-mail já está em uso. Por favor, escolha outro.");
    } else {
        // O e-mail é único, pode proceder com a inserção no banco de dados

        // Hash da senha
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        $resultado_query = $conn->query("SELECT * FROM usuarios");

        $funcao_fk = $resultado_query->num_rows === 0 ? 2 : 1;

        // Inserção dos dados no banco de dados
        $sql = "INSERT INTO usuarios (nome, sobreNome, rg, cpf, data_nascimento, telefone, cartaoSus, endereco, bairro, email, senha, funcao_fk) 
                VALUES ('$nome', '$sobreNome', '$rg', '$cpf', '$dnascimento', '$telefone', '$cartaoSus', '$endereco', '$bairro', '$email', '$senha_hash', {$funcao_fk})";

        if ($conn->query($sql) === TRUE) {
            echo "Cadastro realizado com sucesso!";
            \Core\Notification::set('success', 'Cadastro feito com sucesso!');
            header("Location: /login");
        } else {
            echo "Erro ao cadastrar: " . $conn->error;
        }
    }

    $conn->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    view('/cadastro');
}