<?php
// Inicia a sessão
session_start();

// Verifica se a variável de sessão 'logged_in' está definida e é verdadeira
// Se não estiver definida ou não for verdadeira, redireciona para a página de login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: loginAdmin.php");
    exit;
}
?>
