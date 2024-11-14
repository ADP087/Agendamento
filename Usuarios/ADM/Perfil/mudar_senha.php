<?php
session_start();
include("../../db_connect.php"); // Inclua o arquivo de conexão com o banco de dados

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id_usuario'])) {
    header("Location: ../../../Modal/login.php"); // Redireciona para o login se não estiver logado
    exit();
}

// Processa a mudança de senha quando o formulário é enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifique se os campos de senha foram preenchidos
    if (isset($_POST['nova_senha']) && isset($_POST['confirmar_senha'])) {
        $nova_senha = $_POST['nova_senha'];
        $confirmar_senha = $_POST['confirmar_senha'];

        // Verifica se as senhas coincidem
        if ($nova_senha === $confirmar_senha) {
            // Hash da nova senha
            $senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);

            // Atualiza a senha no banco de dados
            $id_usuario = $_SESSION['usuario_id_usuario'];
            $query = "UPDATE usuarios SET senha_usuario = ? WHERE id_usuario = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("si", $senha_hash, $id_usuario);

            if ($stmt->execute()) {
                header("Location: perfil.php");
                exit();
            } else {
                echo "Erro ao atualizar a senha. Tente novamente.";
            }

            $stmt->close();
        } else {
            echo "As senhas não coincidem. Tente novamente.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../../assets/icon.png">
    <link rel="stylesheet" href="../../style.css">
    <title>Mudar Senha</title>
</head>
<body>
    <header>
        <h2>Mudar Senha</h2>
    </header>

    <div id="container_senha">
        <form action="mudar_senha.php" method="post" >
            <div class="area_senha">
                <label for="nova_senha">Nova Senha:</label>
                <input type="password" name="nova_senha" id="nova_senha" required> <br>
                
                <label for="confirmar_senha">Confirmar Senha:</label>
                <input type="password" name="confirmar_senha" id="confirmar_senha" required>
            </div>
            
            <button type="submit">Atualizar Senha</button>
        </form>
    
        <a href="perfil.php"><button>Voltar</button></a>
</body>
</html>
