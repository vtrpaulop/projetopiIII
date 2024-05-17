<?php
// Incluir arquivo de autenticação
require_once 'autentica.php';

// Consulta SQL para selecionar todas as vacinas da tabela vacinas
$sql = "SELECT nome, protecao_contra, composicao, numero_doses, idade_recomendada, intervalo_entre_doses, esquema_basico, reforco_recomendado_minimo, minimo FROM vacinas WHERE tipo_etario_fk = 1";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Vacinas Infantil</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Lista de Vacinas Infantil</h2>

    <table>
        <tr>
            <th>Vacina</th>
            <th>Proteção Contra</th>
            <th>Composição</th>
            <th>Número de Doses</th>
            <th>Idade Recomendada</th>
            <th>Intervalo entre as Doses</th>
            <th>Esquema Básico</th>
            <th>Reforço Recomendado</th>
            <th>Mínimo</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Exibição dos dados de cada vacina
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["nome"] . "</td>
                        <td>" . $row["protecao_contra"] . "</td>
                        <td>" . $row["composicao"] . "</td>
                        <td>" . $row["numero_doses"] . "</td>
                        <td>" . $row["idade_recomendada"] . "</td>
                        <td>" . $row["intervalo_entre_doses"] . "</td>
                        <td>" . $row["esquema_basico"] . "</td>
                        <td>" . $row["reforco_recomendado_minimo"] . "</td>
                        <td>" . $row["minimo"] . "</td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='9'>Nenhuma vacina encontrada</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>

</html>