<?php
require_once 'autentica.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o ID do usuário foi passado
    if (isset($_POST['id']) && is_numeric($_POST['id'])) {
        $id = $_POST['id'];

        // Consulta SQL para excluir o usuário
        $sql = "DELETE FROM usuarios WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo "Usuário excluído com sucesso!";
        } else {
            echo "Erro ao excluir usuário: " . $conn->error;
        }
    } else {
        echo "ID de usuário inválido.";
    }

    $conn->close();
}

// Redireciona de volta para a página de listagem
header("Location: listarUsuarios.php");
exit;
?>
