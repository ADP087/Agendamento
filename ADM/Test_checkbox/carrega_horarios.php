<?php
// Define o cabeçalho para retornar a resposta como JSON
header('Content-Type: application/json');

// Conectar ao banco de dados (substitua com suas credenciais)
$conn = new mysqli("localhost", "root", "", "db_agendamento");

// Verificar conexão
if ($conn->connect_error) {
    die(json_encode(['message' => 'Conexão falhou: ' . $conn->connect_error]));
}

// Consultar os horários e seus status
$sql = "SELECT horario, status FROM horarios";
$result = $conn->query($sql);

// Array para armazenar os resultados
$horarios = [];

if ($result->num_rows > 0) {
    // Preencher o array com os resultados da consulta
    while($row = $result->fetch_assoc()) {
        $horarios[$row['horario']] = $row['status'];
    }
}

// Retorna os horários e seus status como JSON
echo json_encode($horarios);

// Fecha a conexão com o banco de dados
$conn->close();
?>
