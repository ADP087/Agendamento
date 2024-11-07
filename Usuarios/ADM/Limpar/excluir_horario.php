<?php
include '../../db_connect.php';

if (isset($_POST['id_horario'])) {
    $id_horario = $_POST['id_horario'];

    // Atualiza o status para 1, indicando que o horário foi excluído
    $stmt = $conn->prepare("UPDATE agendamentos SET status = 0, id_usuario = NULL WHERE id = ? AND status = 1");
    $stmt->bind_param('i', $id_horario);

    if ($stmt->execute()) {
        echo "Horário excluído com sucesso.";
    } else {
        echo "Erro ao excluir o horário.";
    }

    $stmt->close();
} else {
    echo "Erro: ID do horário não foi enviado.";
}

$conn->close();
?>
