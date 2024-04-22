<?php
// Conexão com o banco de dados (inclua seu arquivo de conexão aqui)
include "conexao.php";

// Receber os dados enviados via POST
$productId = $_POST["productId"];
$nome = $_POST["nome"];
$description = $_POST["description"];
$amount = $_POST["amount"];
$price = $_POST["price"];

try {
    // Atualizar o produto no banco de dados
    $sql = "UPDATE produtos SET nome = :nome, description = :description, amount = :amount, price = :price WHERE id = :productId";
    $stm = $conexao->prepare($sql);
    $stm->bindValue(':nome', $nome);
    $stm->bindValue(':description', $description);
    $stm->bindValue(':amount', $amount);
    $stm->bindValue(':price', $price);
    $stm->bindValue(':productId', $productId);
    $stm->execute();

    // Verificar se a atualização foi bem-sucedida
    if ($stm->rowCount() > 0) {
        echo "Produto atualizado com sucesso!";
    } else {
        echo "Nenhum produto foi atualizado.";
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
