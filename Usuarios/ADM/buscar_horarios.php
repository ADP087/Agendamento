<?php
include '../db_connect.php';

if (!isset($_POST['id_dia']) || !isset($_POST['id_sala'])) {
    echo "Erro: id_dia ou id_sala não foram enviados.";
    exit;
}


if (isset($_POST['id_dia']) && isset($_POST['id_sala'])) {
    $id_dia = $_POST['id_dia'];
    $id_sala = $_POST['id_sala'];

    // Consulta para buscar horários considerando a sala e o dia
    $stmt_horarios = $conn->prepare("
        SELECT a.id, a.horario, a.status, u.nome_usuario 
        FROM agendamentos a
        LEFT JOIN usuarios u ON a.id_usuario = u.id_usuario
        WHERE a.id_dia = ? AND a.id_sala = ?");
    $stmt_horarios->bind_param('ii', $id_dia, $id_sala);
    $stmt_horarios->execute();
    $result_horarios = $stmt_horarios->get_result();

    if ($result_horarios->num_rows > 0) {
        echo "<tr><th>Horário</th><th>Status</th><th>Usuário</th><th>Ações</th></tr>";
        while ($row_horario = $result_horarios->fetch_assoc()) {
            $id_horario = $row_horario['id'];
            $horario_formatado = substr($row_horario['horario'], 0, 5);
            $status = $row_horario['status'] == 0 ? "Disponível" : "Ocupado";
            $nome_usuario = isset($row_horario['nome_usuario']) ? $row_horario['nome_usuario'] : "N/A";
    
            $classe = $row_horario['status'] == 0 ? '' : 'class="ocupado"';
    
            echo "<tr $classe>";
            echo "<td>$horario_formatado</td>";
            echo "<td>$status</td>";
            echo "<td>$nome_usuario</td>";
    
            // Adiciona o botão "Excluir" apenas para horários disponíveis
            if ($row_horario['status'] == 1) {
                echo "<td><div class='excluir' onclick='excluirHorario($id_horario)'>Excluir</div></td>";
            } else {
                echo "<td></td>"; // Deixa vazio se o horário estiver ocupado
            }
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Escolha o dia da semana para verificar horários disponíveis</td></tr>";
    }
}
?>