<?php
session_start();
include("../../db_connect.php"); // Conexão com o banco de dados

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id_usuario'])) {
    header("Location: ../../Modal/login.php"); // Redireciona para o login se não estiver logado
    exit();
}

// Consulta as informações do professor logado
$id_usuario = $_SESSION['usuario_id_usuario'];
$query = "SELECT nome_usuario, email_usuario FROM usuarios WHERE id_usuario = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$stmt->bind_result($nome_usuario, $email_usuario);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <title>Perfil do ADM</title>
</head>
<body>
    <section id="sempre_novo">
        <h2>Perfil do ADM</h2>
        
        <p><strong>Nome:</strong> <?php echo htmlspecialchars($nome_usuario); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($email_usuario); ?></p>

        <form action="mudar_senha.php" method="post">
            <button type="submit">Mudar Senha</button>
        </form>

        <a href="../index.php"><button>Voltar</button></a>
    </section>
</body>
</html>

<?php $conn->close(); ?>
