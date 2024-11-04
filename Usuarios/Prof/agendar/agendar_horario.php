<?php
include '../../db_connect.php';
session_start(); // Para acessar o id do usuário logado

if (isset($_POST['id_horario'])) {
    $id_horario = $_POST['id_horario'];
    $id_usuario = $_SESSION['usuario_id_usuario']; 

    // Atualizar o status do horário na tabela `agendamentos` com o id do usuário
    $stmt = $conn->prepare("UPDATE agendamentos SET status = 1, id_usuario = ? WHERE id = ?");
    $stmt->bind_param('ii', $id_usuario, $id_horario);
    if ($stmt->execute()) {
        echo "Horário agendado com sucesso!";
    } else {
        echo "Erro ao agendar o horário.";
    }
}
?>
