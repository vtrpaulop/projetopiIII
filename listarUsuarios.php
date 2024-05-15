<?php
// Incluir arquivo de autenticação
require_once 'autentica.php';

// Consulta SQL para recuperar todos os usuários
$sql = "SELECT id, CONCAT(nome, ' ', sobreNome) AS nomeCompleto, email, bairro FROM usuarios";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuários</title>
</head>
<body>
    <h1>Lista de Usuários</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome Completo</th>
            <th>Email</th>
            <th>Bairro</th>
            <th>Ações</th>
        </tr>
        <?php
        // Verifica se há usuários cadastrados
        if ($resultado->num_rows > 0) {
            // Exibe os dados de cada usuário
            while ($row = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nomeCompleto'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['bairro'] . "</td>";
                echo "<td>
                        <a href='editarUsuario.php?id=" . $row['id'] . "'>Editar</a> | 
                        <form action='excluirUsuario.php' method='post' style='display:inline;'>
                            <input type='hidden' name='id' value='" . $row['id'] . "'>
                            <input type='submit' value='Excluir' onclick=\"return confirm('Tem certeza que deseja excluir este usuário?');\">
                        </form>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Nenhum usuário cadastrado.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
