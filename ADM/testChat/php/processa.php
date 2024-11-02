<?php
session_start();
header('Content-Type: application/json');
include 'db_connect.php';

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario_nome_usuario'])) {
    echo json_encode(['message' => 'Usuário não está logado.']);
    exit();
}

$nome_usuario = $_SESSION['usuario_nome_usuario'];
$data = json_decode(file_get_contents("php://input"), true);
$horarios = $data['horarios'];

if (!empty($horarios)) {
    foreach ($horarios as $horario) {
        $stmt = $conn->prepare("UPDATE horarios SET status = 1, agendado_por = ? WHERE horario = ?");
        $stmt->bind_param("ss", $nome_usuario, $horario);

        if (!$stmt->execute()) {
            echo json_encode(['message' => 'Erro ao atualizar: ' . $stmt->error]);
            $stmt->close();
            $conn->close();
            exit();
        }

        $stmt->close();
    }

    echo json_encode(['message' => 'Horários atualizados com sucesso!']);
} else {
    echo json_encode(['message' => 'Nenhum horário foi selecionado.']);
}

$conn->close();
?>
