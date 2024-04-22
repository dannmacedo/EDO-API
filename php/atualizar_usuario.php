<?php
// Recebe os dados enviados via POST
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];
$cpf = $_POST['cpf'];

// Realiza a conexão com o banco de dados (substitua pelas suas credenciais)
$enderecoBD = "localhost";
$banco = "edo_project";
$usuarioBD = "root";
$senhaBD = "";

try {
    $conn = new PDO("mysql:host=$enderecoBD;dbname=$banco", $usuarioBD, $senhaBD);
    // Define o modo de erro do PDO para exceção
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query SQL para atualizar o usuário
    $sql = "UPDATE usuarios SET nome = :nome, email = :email, telefone = :telefone, senha = :senha WHERE cpf = :cpf";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->execute();

    echo "Usuário atualizado com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao atualizar usuário: " . $e->getMessage();
}

$conn = null; // Fecha a conexão com o banco de dados
?>
