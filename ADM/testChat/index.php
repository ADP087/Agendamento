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
            $hoje = new DateTime();
            for ($i = 0; $i < 5; $i++) {
                $data = $hoje->modify('+1 day')->format('d/m');
                echo "<span class='date' data-date='$data'>$data</span>";
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
                    <td class="intervalo">INTERVALO</td>
                </tr>
                <tr>
                    <td><input type="checkbox" value="21:00" onclick="marcaHorario(this)">21:00</td>
                </tr>
                <tr>
                    <td><input type="checkbox" value="21:45" onclick="marcaHorario(this)">21:45</td>
                </tr>
            </table>
            <br>
            <input type="button" value="Limpar" onclick="limparSelecao()">
            <input type="submit" value="Confirmar" onclick="mostrarHorario()">
            <div id="horarioSelecionado"></div>
        </div>
    </section>

    <script src="js/script.js"></script>
</body>
</html>

