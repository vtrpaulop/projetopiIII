<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Lista de Vacinas para Adolescentes</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <h2>Lista de Vacinas para Adolescentes</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome da Vacina</th>
            <th>Proteção Contra</th>
            <th>Número de Doses</th>
            <th>Idade Recomendada</th>
            <th>Intervalo entre Doses</th>
            <th>Esquema Básico</th>
            <th>Reforço Recomendado Mínimo</th>
        </tr>

        <?php
        // Incluir arquivo de autenticação
        require_once 'autentica.php';

        // Consulta SQL
        $sql = "SELECT * FROM vacinas WHERE tipo_etario_fk = 2";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Exibir os dados
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nome"] . "</td>";
                echo "<td>" . $row["protecao_contra"] . "</td>";
                echo "<td>" . $row["numero_doses"] . "</td>";
                echo "<td>" . $row["idade_recomendada"] . "</td>";
                echo "<td>" . $row["intervalo_entre_doses"] . "</td>";
                echo "<td>" . $row["esquema_basico"] . "</td>";
                echo "<td>" . $row["reforco_recomendado_minimo"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "0 resultados";
        }
        $conn->close();
        ?>
    </table>

</body>

</html>