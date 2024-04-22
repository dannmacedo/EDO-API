<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

// Recebendo os dados do formulário
$nome = $_POST["nome"];
$code = $_POST["code"];
$description = $_POST["description"];
$amount = $_POST["amount"];
$price = $_POST["price"];

// Verificar se os campos obrigatórios estão preenchidos
if ($nome && $code && $description && $amount && $price) {
    // Aqui você pode fazer a conexão com o banco de dados
    include "conexao.php"; // Inclua o arquivo de conexão com o banco de dados
    
    try {
        // Preparar a query de inserção
        $sql = "INSERT INTO produtos (nome, code, description, amount, price) VALUES (:nome, :code, :description, :amount, :price)";
        
        // Preparar e executar a query
        $stm = $conexao->prepare($sql);
        $stm->bindValue(':nome', $nome);
        $stm->bindValue(':code', $code);
        $stm->bindValue(':description', $description);
        $stm->bindValue(':amount', $amount);
        $stm->bindValue(':price', $price);
        
        $resultado = $stm->execute();
        
        if ($resultado) {
            // Em caso de sucesso
            echo "Produto cadastrado com sucesso!";
        } else {
            // Em caso de falha ao inserir no banco de dados
            echo "Erro ao cadastrar o produto.";
        }
    } catch (PDOException $e) {
        // Em caso de erro na conexão ou na execução da query
        echo "Erro: " . $e->getMessage();
    }
} else {
    // Em caso de campos obrigatórios não preenchidos
    echo "Erro ao cadastrar o produto. Por favor, preencha todos os campos.";
}
?>
