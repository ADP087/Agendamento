<?php
date_default_timezone_set('America/Sao_Paulo');

$conn = new mysqli("localhost", "root", "", "db_agendamento");
if ($conn->connect_error) {
    die(json_encode(['message' => 'Conexão falhou: ' . $conn->connect_error]));
}

            $hoje = new DateTime();
            $dias_da_semana = []; // Array para armazenar os dias da semana

            // Calcular o dia da semana atual (1 = segunda-feira, 7 = domingo)
            $dia_atual = $hoje->format('N');

            // Preencher o array com os dias da semana
            for ($i = 1; $i <= 5; $i++) {
                // Clona a data atual
                $dia = clone $hoje;
                // Adiciona o número de dias necessários para chegar ao dia da semana correspondente
                $dia->modify("+".($i - $dia_atual)." days");
                // Armazena a data formatada (por exemplo, 'd/m')
                $dias_da_semana[] = $dia->format('d/m');
            }
?>
