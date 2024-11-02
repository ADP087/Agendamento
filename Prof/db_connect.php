<?php
date_default_timezone_set('America/Sao_Paulo');

$conn = new mysqli("localhost", "root", "", "db_agendamento");
if ($conn->connect_error) {
    die(json_encode(['message' => 'Conexão falhou: ' . $conn->connect_error]));
}

// Verificar se é sábado
if (date('N') == 6) { // 6 representa sábado
    // Atualizar status e id_usuario na tabela sala_1
    $stmt = $conn->prepare("UPDATE sala_1 SET status = 0, id_usuario = NULL WHERE status = 1");
}
?>

