<?php
// Verifica se foi passado um ID de usuário válido na URL
require_once 'autentica.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta SQL para obter os dados do usuário pelo ID
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        // Recupera os dados do usuário
        $usuario = $resultado->fetch_assoc();
    } else {
        // Se o usuário não existir, redireciona de volta para a página de listagem
        header("Location: listarUsuarios.php");
        exit;
    }
} else {
    // Se nenhum ID de usuário válido foi fornecido, redireciona de volta para a página de listagem
    header("Location: listarUsuarios.php");
    exit;
}

// Processamento do formulário de edição
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $sobreNome = $_POST['sobrenome'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $dnascimento = $_POST['dnascimento'];
    $cpf = $_POST['cpf'];
    $cartaoSus = $_POST['cartaoSus'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Hash da senha se ela não estiver vazia
    if (!empty($senha)) {
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        $sql = "UPDATE usuarios SET 
                    nome = '$nome', 
                    sobreNome = '$sobreNome', 
                    rg = '$rg', 
                    cpf = '$cpf', 
                    dnascimento = '$dnascimento',
                    telefone = '$telefone',
                    cartaoSus = '$cartaoSus', 
                    endereco = '$endereco', 
                    bairro = '$bairro', 
                    email = '$email', 
                    senha = '$senha_hash' 
                WHERE id = $id";
    } else {
        // Se a senha estiver vazia, não a atualiza
        $sql = "UPDATE usuarios SET 
                    nome = '$nome', 
                    sobreNome = '$sobreNome', 
                    rg = '$rg', 
                    cpf = '$cpf',
                    dnascimento = '$dnascimento',
                    telefone = '$telefone', 
                    cartaoSus = '$cartaoSus', 
                    endereco = '$endereco', 
                    bairro = '$bairro', 
                    email = '$email'
                WHERE id = $id";
    }

    if ($conn->query($sql) === TRUE) {
        // Redireciona de volta para a página de listagem após a atualização
        header("Location: listarUsuarios.php");
        exit;
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    <h1>Editar Usuário</h1>
    <form action="editarUsuario.php?id=<?php echo $id; ?>" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo $usuario['nome']; ?>"><br>
        <label for="sobreNome">Sobrenome:</label>
        <input type="text" name="sobrenome" id="sobreNome" value="<?php echo $usuario['sobreNome']; ?>"><br>
        <label for="rg">RG:</label>
        <input type="text" name="rg" id="rg" value="<?php echo $usuario['rg']; ?>"><br>
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" value="<?php echo $usuario['cpf']; ?>"><br>
        <label for="dnascimento">Data nascimento:</label>
        <input type="date" name="dnascimento" id="dnascimento" value="<?php echo $usuario['dnascimento']; ?>"><br>
        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" id="telefone" value="<?php echo $usuario['telefone']; ?>"><br>
        <label for="cartaoSus">Cartão SUS:</label>
        <input type="text" name="cartaoSus" id="cartaoSus" value="<?php echo $usuario['cartaoSus']; ?>"><br>
        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" id="endereco" value="<?php echo $usuario['endereco']; ?>"><br>
        <label for="bairro">Bairro:</label>
        <input type="text" name="bairro" id="bairro" value="<?php echo $usuario['bairro']; ?>"><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $usuario['email']; ?>"><br>
        <label for="senha">Senha (deixe em branco para não alterar):</label>
        <input type="password" name="senha" id="senha" value=""><br>
        <input type="submit" value="Salvar">
    </form>
        <a href="listarUsuarios.php"><button>Voltar</button</a>
</body>
</html>
