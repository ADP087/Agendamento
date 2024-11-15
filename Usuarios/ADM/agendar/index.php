<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../../assets/icon.png">
    <link rel="stylesheet" href="../../style.css">
    <title>Agendamento de Horários</title>
</head>
<body>
    <header>
        <h1>Escolha a sala, o dia e o horário que deseja agendar:</h1>
        <form id="form_sala">
            <label for="sala">Sala:</label>
            <select id="sala" name="sala" onclick='selecionarData(this)'>
                <?php
                for ($i = 1; $i <= 9; $i++) {
                    echo "<option value='$i'>Laboratório $i</option>";
                }
                ?>  
            </select>
        </form>

        <div class="dates">
        <?php
            $dias_da_semana = [
                1 => 'Segunda',
                2 => 'Terça',
                3 => 'Quarta',
                4 => 'Quinta',
                5 => 'Sexta'
            ];

            foreach ($dias_da_semana as $id_dia => $nome_dia) {
                echo "<span class='date' data-id_dia='$id_dia' onclick='selecionarData(this)'>$nome_dia</span> ";
            }
        ?>
        </div>
    </header>
    <section id="sempre_novo">

        <div id="tabela">
            <table id="tabela_horarios"></table>
            <br>

            <a href="../index.php"><button>Voltar</button></a>
            <input type="submit" value="Agendar" onclick="agendarHorario()">
        </div>
    </section>

    <script src="script.js"></script>
</body>
</html>
