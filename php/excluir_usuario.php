<?php
// Recebe o CPF enviado via POST
$cpf = $_POST['cpf'];

// Realiza a conexão com o banco de dados 
$enderecoBD = "localhost";
$banco = "edo_project";
$usuarioBD = "root";
$senhaBD = "";

try {
    $conn = new PDO("mysql:host=$enderecoBD;dbname=$banco", $usuarioBD, $senhaBD);
    // Define o modo de erro do PDO para exceção
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query SQL para excluir o usuário
    $sql = "DELETE FROM usuarios WHERE cpf = :cpf";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->execute();

    echo "Usuário excluído com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao excluir usuário: " . $e->getMessage();
}

$conn = null; // Fecha a conexão com o banco de dados
?>
