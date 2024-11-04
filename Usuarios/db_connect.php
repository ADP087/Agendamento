<?php
date_default_timezone_set('America/Sao_Paulo');

$conn = new mysqli("localhost", "root", "", "db_agendamento");
if ($conn->connect_error) {
    die(json_encode(['message' => 'Conexão falhou: ' . $conn->connect_error]));
}
?>