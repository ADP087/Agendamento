<?php
// Define o cabeçalho para retornar a resposta como JSON
header('Content-Type: application/json');

// Conectar ao banco de dados (substitua com suas credenciais)
$conn = new mysqli("localhost", "root", "", "db_agendamento");

// Verificar conexão
if ($conn->connect_error) {
    // Retorna uma resposta em caso de falha de conexão
    die(json_encode(['message' => 'Conexão falhou: ' . $conn->connect_error]));
}

// Receber os dados enviados pelo JavaScript
$data = json_decode(file_get_contents("php://input"), true);
$horarios = $data['horarios'];

// Verifica se os horários foram recebidos corretamente
if (!empty($horarios)) {
    // Itera sobre cada horário selecionado para atualizar o banco de dados
    foreach ($horarios as $horario) {
        // Proteção contra injeção de SQL usando prepared statements
        $stmt = $conn->prepare("UPDATE horarios SET status = 1 WHERE horario = ?");
        $stmt->bind_param("s", $horario);

        // Executa a consulta e verifica se ocorreu algum erro
        if (!$stmt->execute()) {
            echo json_encode(['message' => 'Erro ao atualizar: ' . $stmt->error]);
            $stmt->close();
            $conn->close();
            exit();
        }

        // Fecha o statement após cada execução
        $stmt->close();
    }

    // Se tudo ocorreu bem, retorna uma mensagem de sucesso
    echo json_encode(['message' => 'Horários atualizados com sucesso!']);
} else {
    // Se nenhum horário foi recebido, retorna uma mensagem de erro
    echo json_encode(['message' => 'Nenhum horário foi selecionado.']);
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
