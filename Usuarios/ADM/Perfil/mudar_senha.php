<?php
session_start();
include("../../db_connect.php"); // Inclua o arquivo de conexão com o banco de dados

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id_usuario'])) {
    header("Location: ../../../Modal/login.php"); // Redireciona para o login se não estiver logado
    exit();
}

$mensagem = ""; // Variável para armazenar mensagens de feedback

// Processa a mudança de senha quando o formulário é enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['senha_atual'], $_POST['nova_senha'], $_POST['confirmar_senha'])) {
        $senha_atual = $_POST['senha_atual'];
        $nova_senha = $_POST['nova_senha'];
        $confirmar_senha = $_POST['confirmar_senha'];

        $id_usuario = $_SESSION['usuario_id_usuario'];

        // Consulta a senha atual no banco
        $query = "SELECT senha_usuario FROM usuarios WHERE id_usuario = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $stmt->bind_result($senha_hash_atual);
        $stmt->fetch();
        $stmt->close();

        // Verifica se a senha atual está correta
        if (!password_verify($senha_atual, $senha_hash_atual)) {
            $mensagem = "<p class='erro'>A senha atual está incorreta.</p>";
        } elseif ($nova_senha !== $confirmar_senha) {
            $mensagem = "<p class='erro'>As novas senhas não coincidem.</p>";
        } else {
            // Hash da nova senha
            $senha_hash_nova = password_hash($nova_senha, PASSWORD_DEFAULT);

            // Atualiza a senha no banco de dados
            $query = "UPDATE usuarios SET senha_usuario = ? WHERE id_usuario = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("si", $senha_hash_nova, $id_usuario);

            if ($stmt->execute()) {
                $mensagem = "<p class='sucesso'>Senha alterada com sucesso! Redirecionando para o perfil...</p>";
                echo "<script>
                        setTimeout(() => {
                            window.location.href = 'perfil.php';
                        }, 2000); // Redireciona após 3 segundos
                      </script>";
            } else {
                $mensagem = "<p class='erro'>Erro ao atualizar a senha. Tente novamente.</p>";
            }

            $stmt->close();
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
        
    <!-- Exibe as mensagens -->
    <?php if (!empty($mensagem)) echo $mensagem; ?>

    <form action="mudar_senha.php" method="post">
        <div class="area_senha">
            <label for="senha_atual">Senha Atual:</label>
            <input type="password" name="senha_atual" id="senha_atual" required> <br>
            
            <label for="nova_senha">Nova Senha:</label>
            <input type="password" name="nova_senha" id="nova_senha" required> <br>
            
            <label for="confirmar_senha">Confirmar Nova Senha:</label>
            <input type="password" name="confirmar_senha" id="confirmar_senha" required>
        </div>
        
        <button type="submit">Atualizar Senha</button>
    </form>
    
    

    <a href="perfil.php"><button>Voltar</button></a>
</div>
</body>
</html>

