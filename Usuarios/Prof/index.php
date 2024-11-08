<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Agendamento de Horários</title>
</head>
<body>
    <header>
        
        <div class="inicio">
            <a href="../../index.html"><p>Início</p></a>
            <a href="Perfil/perfil.php"><p>Perfil</p></a>
        </div>

        <h1>Veja os horários disponiveis:</h1>
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
            <table id="tabela_horarios">
                <!-- Tabela interativa aqui-->
            </table>
            <br>

            <a href="agendar/index.php"><button>Quer agendar algum horário?</button></a>
        </div>
    </section>

    <script>
        function selecionarData(elemento) {
            // Obter o id_dia e id_sala
            var id_dia = elemento.getAttribute('data-id_dia');
            var id_sala = document.getElementById("sala").value;

            // Enviar requisição AJAX para buscar horários de acordo com a sala e o dia selecionado
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "buscar_horarios.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Atualizar a tabela com os horários recebidos
                    document.querySelector("#tabela_horarios").innerHTML = xhr.responseText;
                }
            };
            xhr.send("id_dia=" + id_dia + "&id_sala=" + id_sala);
        }
    </script>
</body>
</html>