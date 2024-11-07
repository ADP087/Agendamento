<?php
header('Content-Type: application/json');
include '../../db_connect.php';

$sql = "UPDATE agendamentos SET status = 0, id_usuario = NULL";
if ($conn->query($sql) === TRUE) {
    echo json_encode(['message' => 'Os horários foram reiniciados']);
} else {
    echo json_encode(['message' => 'Erro ao redefinir horários: ' . $conn->error]);
}

$conn->close();
?>
