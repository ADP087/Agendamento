<?php
include '../../db_connect.php';

// Atualiza todos os status para 0
$sql = "UPDATE agendamentos SET status = 0";
if ($conn->query($sql) === TRUE) {
    echo json_encode(['message' => 'Tabela reiniciada com sucesso.']);
} else {
    echo json_encode(['message' => 'Erro ao reiniciar a tabela: ' . $conn->error]);
}

$conn->close();
?>
