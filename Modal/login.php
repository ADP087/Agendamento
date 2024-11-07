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

    // Verificar se o usuário existe no banco de dados
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verificar se a senha está correta
        if (password_verify($senha, $user['senha_usuario'])) {
            // Armazenar os dados do usuário na sessão
            $_SESSION['usuario_id_usuario'] = $user['id_usuario'];
            $_SESSION['usuario_nome_usuario'] = $user['nome_usuario'];
            $_SESSION['tipo_usuario'] = $user['tipo_usuario'];
            
            // Redirecionar o usuário para a página correta com base no tipo
            if ($user['tipo_usuario'] == 'ADM') {
                header("Location: ../Usuarios/ADM/index.php");
            } else if ($user['tipo_usuario'] == 'Professor') {
                header("Location: ../Usuarios/Prof/index.php");
            } else {
                // Redirecionar para uma página padrão se o tipo não for reconhecido
                header("Location: ../index.html");
            }

            exit();
        } else {
            // Caso a senha esteja incorreta
            echo "Usuário ou senha incorreto";
        }
    } else {
        // Caso o usuário não seja encontrado no banco de dados
        echo "Usuário ou senha incorreto";
    }

    // Fechar a conexão e o statement
    $stmt->close();
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <form action="login.php" method="POST" class="form-login">
            <div class="area_login">
                <h2>Login</h2>
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



