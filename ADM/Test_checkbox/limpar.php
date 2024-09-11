<?php
// Define o cabeçalho para retornar a resposta como JSON
header('Content-Type: application/json');

// Conectar ao banco de dados (substitua com suas credenciais)
$conn = new mysqli("localhost", "root", "", "db_agendamento");

// Verificar conexão
if ($conn->connect_error) {
    die(json_encode(['message' => 'Conexão falhou: ' . $conn->connect_error]));
}

// Atualizar todos os horários para 0
$sql = "UPDATE horarios SET status = 0";
if ($conn->query($sql) === TRUE) {
    echo json_encode(['message' => 'Todos os horários foram redefinidos para 0!']);
} else {
    echo json_encode(['message' => 'Erro ao redefinir horários: ' . $conn->error]);
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
