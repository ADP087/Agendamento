<?php
include 'testChat/php/db_connect.php'; // Certifique-se de que o caminho para a conexão com o banco de dados esteja correto

// Consulta para buscar todos os horários
$sql = "SELECT horario, status, agendado_por FROM horarios ORDER BY horario ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Horários Agendados</title>
    <style>
    .ocupado {
    background-color: red; /* Mantém o fundo vermelho para horários ocupados */
    color: white; /* Texto em branco para contraste */
    }
    </style>
</head>
<body>
    <header>
        <h1>Horários Agendados:</h1>
        <div class="dates">
            <?php
            // Exibir os dias da semana
            foreach ($dias_da_semana as $data) {
                echo "<span class='date' data-date='$data'>$data</span> ";
            }
            ?>
        </div>
    </header>
    <section>
        <div id="tabela_visul">
            <table>
                <?php
                // Verifica se há resultados
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Mostra o horário, com fundo vermelho se estiver ocupado
                        $classe = $row['status'] == 1 ? 'ocupado' : ''; // Aplique a classe somente se estiver ocupado
                        echo "<tr><td class='$classe'>{$row['horario']} " . ($row['status'] == 1 ? "(Agendado por {$row['agendado_por']})" : "") . "</td></tr>";
                    }
                } else {
                    echo "<tr><td>Nenhum horário encontrado</td></tr>";
                }
                ?>
            </table>
            <br>
            <a href="testChat/index.php"><button>Deseja marcar algum horário?</button></a>
            <a href="Cadastro/cadastro.php"><button>Deseja cadastrar algum professor?</button></a>

        </div>
    </section>

</body>
</html>

<?php
// Fechar a conexão com o banco de dados
$conn->close();
?>
