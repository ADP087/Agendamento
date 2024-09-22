<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_agendamento";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    $nome = $conn->real_escape_string($_POST['nome_usuario']);
    $email = $conn->real_escape_string($_POST['email_usuario']);
    $senha = password_hash($_POST['senha_usuario'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome_usuario, email_usuario, senha_usuario) VALUES ('$nome', '$email', '$senha')";

    if ($conn->query($sql) === TRUE) {
        echo "Usuário cadastrado com sucesso!";
        header("Location: ../pag_adm.html");
        exit();
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h2>Cadastro de Usuário</h2>
    <form action="cadastro.php" method="POST">
        <label for="nome_usuario">Nome:</label><br>
        <input type="text" id="nome_usuario" name="nome_usuario" required><br><br>
        
        <label for="email_usuario">Email:</label><br>
        <input type="email" id="email_usuario" name="email_usuario" required><br><br>
        
        <label for="senha_usuario">Senha:</label><br>
        <input type="password" id="senha_usuario" name="senha_usuario" required><br><br>
        
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>