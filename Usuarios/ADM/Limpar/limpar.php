<?php
header('Content-Type: application/json');
include '../../db_connect.php';

// Atualiza apenas os horários que não possuem os IDs especificados
$sql = "UPDATE agendamentos 
        SET status = 0, id_usuario = NULL
        WHERE id NOT IN (145, 146, 157, 158)";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['message' => 'Os horários foram reiniciados!']);
} else {
    echo json_encode(['message' => 'Erro ao redefinir horários: ' . $conn->error]);
}

$conn->close();
?>

