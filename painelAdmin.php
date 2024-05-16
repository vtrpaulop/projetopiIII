<?php
// Verifica se o usuário está logado. Você precisa implementar essa função.
// Se o usuário não estiver logado, redireciona para a página de login.
// Caso contrário, o usuário terá acesso ao painel de controle.
require_once 'verificar_loginAdmin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle</title>
</head>
<body>
    <h1>Painel de Controle</h1>
    <div>
        <h2>Opções:</h2>
        <ul>
            <li><a href="listarUsuarios.php">Lista Usuários</a></li>
            <li><a href="vacinasInfantil.php">Listar Vacinas Infatins</a></li>
            <li><a href="vacinasAdolescente.php">Listar Vacinas Adolescente</a></li>
            <li><a href="vacinasAdulto.php">Listar vacinas Adultos</a></li>
            <li><a href="vacinasGestante.php">Listar Vacinas Gestantes</a></li>
        </ul>
    </div>
    <div>
        <!-- Outras opções de administração podem ser adicionadas aqui -->
    </div>
    <div>
        <a href="logout.php">Sair</a>
    </div>
</body>
</html>
