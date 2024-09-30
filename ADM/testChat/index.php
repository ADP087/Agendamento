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
            $dias_gerados = 0;
            
            while ($dias_gerados < 5) {
                // Verifica se o dia da semana é sábado (6) ou domingo (7)
                $dia_semana = $hoje->format('N');
            
                if ($dia_semana < 6) { // Se for um dia útil (segunda a sexta)
                    $data = $hoje->format('d/m');  // Formata a data
                    echo "<span class='date' data-date='$data'>$data</span>";
                    $dias_gerados++;  // Incrementa o contador de dias gerados
                }
            
                if ($dias_gerados < 5) {  // Apenas modifica a data se ainda não gerou os 5 dias
                    $hoje->modify('+1 day');  // Passa para o próximo dia
                }
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

