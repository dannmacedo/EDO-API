<?php
// Recebe o CPF enviado via POST
$cpf = $_POST['cpf'];

// Realiza a conexão com o banco de dados 
$enderecoBD = "localhost";
$banco      = "edo_project";
$usuarioBD  = "root";
$senhaBD    = "";

// Conexão com o banco de dados
$conn = new PDO("mysql:host=$enderecoBD;dbname=$banco", $usuarioBD, $senhaBD);

try {
    // Query SQL para buscar o usuário pelo CPF
    $sql = "SELECT nome, email, telefone, senha FROM usuarios WHERE cpf = :cpf";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->execute();

    // Obtém o resultado da consulta
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Retorna os dados como JSON
    header('Content-Type: application/json');
    echo json_encode($result);
} catch (PDOException $e) {
    // Em caso de erro, retorna uma mensagem de erro como JSON
    header('Content-Type: application/json');
    echo json_encode(array("error" => "Erro na consulta de usuário: " . $e->getMessage()));
}

$conn = null; // Fecha a conexão com o banco de dados
?>
