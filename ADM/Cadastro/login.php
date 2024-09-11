<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_agendamento";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    $email = $_POST['email_usuario'];
    $senha = $_POST['senha_usuario'];

    $sql = "SELECT id_usuario, nome_usuario, senha_usuario FROM usuarios WHERE email_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        if (password_verify($senha, $user['senha_usuario'])) {
            $_SESSION['usuario_id_usuario'] = $user['id_usuario'];
            $_SESSION['usuario_nome_usuario'] = $user['nome_usuario'];
            header("Location: ../pag_adm.html");
            exit();
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .btn-cadastro {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn-cadastro:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Login</h2>
    <form action="loguin.php" method="POST">
        <label for="email_usuario">Email:</label><br>
        <input type="email" id="email_usuario" name="email_usuario" required><br><br>
        
        <label for="senha">Senha:</label><br>
        <input type="password" id="senha_usuario" name="senha_usuario" required><br><br>
        
        <input type="submit" value="Entrar">
    </form>
    <a href="cadastro.php" class="btn-cadastro">Cadastrar</a>
</body>
</html>