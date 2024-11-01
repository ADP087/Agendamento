<?php
$servername = "localhost";
$username = "seu_usuario";
$password = "";
$dbname = "seu_banco_de_dados";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Recebe os dados enviados pelo frontend
$data = json_decode(file_get_contents("php://input"));
var_dump($data); // Depuração: Verificar dados recebidos

if(isset($data->horario)) {
    $horario = $data->horario;
    echo "Horário recebido: " . $horario . "<br>"; // Depuração: Verificar valor do horário

    $sql = "INSERT INTO horarios (horario) VALUES ('$horario')";

    if ($conn->query($sql) === TRUE) {
        echo "Horário selecionado armazenado no banco de dados";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Nenhum horário recebido";
}

$conn->close();
?>