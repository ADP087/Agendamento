<?php
$conn = new mysqli("localhost", "root", "", "db_agendamento");
if ($conn->connect_error) {
    die(json_encode(['message' => 'Conexão falhou: ' . $conn->connect_error]));
}
?>
