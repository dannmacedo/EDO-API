<?php
// Incluir o arquivo de conexão com o banco de dados
include "conexao.php";

// Consulta para obter o valor total em estoque
$sql = "SELECT SUM(amount * price) AS valor_estoque FROM produtos";
$stm = $conexao->prepare($sql);
$stm->execute();
$resultado = $stm->fetch(PDO::FETCH_ASSOC);

echo $resultado['valor_estoque'];
?>