<?php
header('Content-Type: application/json');
$conn = new mysqli("localhost", "root", "", "db_agendamento");

if ($conn->connect_error) {
    die(json_encode(['message' => 'Conexão falhou: ' . $conn->connect_error]));
}

$sql = "UPDATE horarios SET status = 0";
if ($conn->query($sql) === TRUE) {
    echo json_encode(['message' => 'Todos os horários foram redefinidos para 0!']);
} else {
    echo json_encode(['message' => 'Erro ao redefinir horários: ' . $conn->error]);
}

$conn->close();
?>
