<?php
// Conexão com o banco de dados (inclua seu arquivo de conexão aqui)
include "conexao.php";

// Receber os dados enviados via POST
$productId = $_POST["productId"];

try {
    // Excluir o produto do banco de dados
    $sql = "DELETE FROM produtos WHERE id = :productId";
    $stm = $conexao->prepare($sql);
    $stm->bindValue(':productId', $productId);
    $stm->execute();

    // Verificar se a exclusão foi bem-sucedida
    if ($stm->rowCount() > 0) {
        echo "Produto excluído com sucesso!";
    } else {
        echo "Nenhum produto foi excluído.";
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
