<?php
header('Content-Type: application/json');
$conn = new mysqli("localhost", "root", "", "db_agendamento");

if ($conn->connect_error) {
    die(json_encode(['message' => 'Conexão falhou: ' . $conn->connect_error]));
}

$sql = "SELECT horario, status, agendado_por FROM horarios";
$result = $conn->query($sql);

$horarios = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $horarios[$row['horario']] = [
            'status' => $row['status'],
            'agendado_por' => $row['agendado_por']
        ];
    }
}

echo json_encode($horarios);

$conn->close();
?>

