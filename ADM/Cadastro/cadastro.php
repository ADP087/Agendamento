<?php
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

    // Sanitizar os dados
    $nome = $conn->real_escape_string($_POST['nome_usuario']);
    $email = $conn->real_escape_string($_POST['email_usuario']);
    $senha = password_hash($_POST['senha_usuario'], PASSWORD_DEFAULT);

    // Inserir o usuário com tipo 'Professor' por padrão
    $sql = "INSERT INTO usuarios (nome_usuario, email_usuario, senha_usuario, tipo_usuario) VALUES ('$nome', '$email', '$senha', 'Professor')";

    if ($conn->query($sql) === TRUE) {
        echo "Usuário cadastrado com sucesso!";
        header("Location: ../pag_adm.php");
        exit();
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    // Fechar conexão
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro de Professor</title>
</head>
<body>
    <main>
        <section class="area-cadastro">
            <h2>Cadastro de Professor</h2>
            <form action="cadastro.php" method="POST">
                <label for="nome_usuario">Nome:</label>
                <input type="text" id="nome_usuario" name="nome_usuario" required>
                
                <label for="email_usuario">Email:</label>
                <input type="email" id="email_usuario" name="email_usuario" required>
                
                <label for="senha_usuario">Senha:</label>
                <input type="password" id="senha_usuario" name="senha_usuario" required>
                
                <input type="submit" value="Cadastrar">
            </form>
        </section>
    </main>
</body>
</html>
