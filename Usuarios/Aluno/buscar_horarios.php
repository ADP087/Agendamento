<?php
include '../db_connect.php';

if (!isset($_POST['id_dia']) || !isset($_POST['id_sala'])) {
    echo "<tr><td colspan='3'>Por favor, selecione uma sala e um dia para ver os horários.</td></tr>";
    exit;
}

$id_dia = $_POST['id_dia'];
$id_sala = $_POST['id_sala'];

// Consulta para buscar horários com status e nome do usuário, se ocupado
$stmt_horarios = $conn->prepare("
    SELECT a.horario, a.status, u.nome_usuario 
    FROM agendamentos a
    LEFT JOIN usuarios u ON a.id_usuario = u.id_usuario
    WHERE a.id_dia = ? AND a.id_sala = ?
    ORDER BY a.horario");
$stmt_horarios->bind_param('ii', $id_dia, $id_sala);
$stmt_horarios->execute();
$result_horarios = $stmt_horarios->get_result();

if ($result_horarios->num_rows > 0) {
    echo "<tr><th>Horário</th><th>Status</th><th>Usuário</th></tr>";
    while ($row = $result_horarios->fetch_assoc()) {
        $horario_formatado = substr($row['horario'], 0, 5);
        $status = $row['status'] == 0 ? "Disponível" : "Ocupado";
        $nome_usuario = $row['nome_usuario'] ?? "N/A";

        $classe = $row['status'] == 0 ? '' : 'class="ocupado"';
        echo "<tr $classe><td>$horario_formatado</td><td>$status</td><td>$nome_usuario</td></tr>";
    }
} else {
    echo "<tr><td colspan='3'>Escolha o dia da semana para verificar horários disponíveis</td></tr>";
}
?>
