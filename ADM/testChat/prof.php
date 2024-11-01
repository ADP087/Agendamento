<?php
include 'php/db_connect.php'; // Certifique-se de que o caminho para a conexão com o banco de dados esteja correto
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Agendamento de Horários</title>
</head>
<body>
    <header>
        <h1>Escolha o dia e o horário que deseja agendar:</h1> <br>
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
        <div id="tabela">
            <table>
                <tr>
                    <td><input type="checkbox" value="19:15" onclick="marcaHorario(this)">19:15</td>
                </tr>
                <tr>
                    <td><input type="checkbox" value="20:00" onclick="marcaHorario(this)">20:00</td>
                </tr>
                <tr>
                    <td><input type="checkbox" value="21:00" onclick="marcaHorario(this)">21:00</td>
                </tr>
                <tr>
                    <td><input type="checkbox" value="21:45" onclick="marcaHorario(this)">21:45</td>
                </tr>
            </table>
            <br>
            <input type="button" value="Voltar" onclick="history.back();">
            
            <input type="submit" value="Confirmar" onclick="mostrarHorario()">
            <div id="horarioSelecionado"></div>
        </div>
    </section>

    <script src="js/script.js"></script>
</body>
</html>

