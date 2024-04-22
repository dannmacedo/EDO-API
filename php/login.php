<?php


$enderecoBD = "localhost";
$banco = "edo_project";
$usuarioBD = "root";
$senhaBD = "";

// Conectar ao banco de dados
$conn = new mysqli($enderecoBD, $usuarioBD, $senhaBD, $banco);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Obter dados do formulário de login
$email = $_POST['user'];
$senha = $_POST['senha'];

// Consulta SQL para verificar se as credenciais existem no banco de dados
$sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // As credenciais estão corretas, login bem-sucedido
    // Redirecionar para index.html
    header('Location: ../index.html');
    exit();
} else {
    // Credenciais inválidas, login falhou
    echo "Credenciais inválidas. Tente novamente.";
}

$conn->close();
?>
