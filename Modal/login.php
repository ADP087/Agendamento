<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_agendamento";

    // Conectar ao banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Receber e sanitizar os dados enviados pelo formulário de login
    $email = $_POST['email_usuario'];
    $senha = $_POST['senha_usuario'];

    // Consulta para buscar o usuário pelo email
    $sql = "SELECT id_usuario, nome_usuario, senha_usuario, tipo_usuario FROM usuarios WHERE email_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($senha, $user['senha_usuario'])) {
            $_SESSION['usuario_id_usuario'] = $user['id_usuario'];
            $_SESSION['usuario_nome_usuario'] = $user['nome_usuario'];
            $_SESSION['tipo_usuario'] = $user['tipo_usuario'];

            if ($user['tipo_usuario'] == 'ADM') {
                header("Location: ../Usuarios/ADM/index.php");
            } else if ($user['tipo_usuario'] == 'Professor') {
                header("Location: ../Usuarios/Prof/index.php");
            } else {
                header("Location: ../index.html");
            }
            exit();
        } else {
            $_SESSION['error_message'] = "Usuário ou senha incorretos.";
        }
    } else {
        $_SESSION['error_message'] = "Usuário ou senha incorretos.";
    }

    $stmt->close();
    $conn->close();
}

// Mensagem de erro para exibir no HTML
if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    unset($_SESSION['error_message']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/icon.png">
    <link rel="stylesheet" href="estilo.css">
    <title>Login</title>

    <style>
        /* Mensagem de erro */
        .error-message {
            color: #D8000C;
            background-color: #FFBABA;
            border: 1px solid #D8000C;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: center;
            animation: shake 0.3s ease-in-out;
        }

        /* Animação para um efeito de shake */
        @keyframes shake {
            0% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            50% { transform: translateX(5px); }
            75% { transform: translateX(-5px); }
            100% { transform: translateX(0); }
        }
    </style>
    
</head>
<body>
    <div class="container">
        <form action="login.php" method="POST" class="form-login">
            <div class="area_login">
                <h2>Login</h2>
                
                <?php if (!empty($error_message)): ?>
                    <div class="error-message">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>
                
                <label for="email_usuario" class="label">Email:</label>
                <input type="email" id="email_usuario" name="email_usuario" required><br><br>
                
                <label for="senha_usuario" class="label">Senha:</label>
                <input type="password" id="senha_usuario" name="senha_usuario" required><br><br>
                
                <input type="submit" value="Entrar" class="btn-submit">
            </div>
        </form>
    </div>
</body>
</html>




