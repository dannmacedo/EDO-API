<?php
// Incluir o arquivo de conexão com o banco de dados
include "conexao.php";

// Consulta para obter a quantidade total de itens em estoque
$sql = "SELECT SUM(amount) AS qtd_itens FROM produtos";
$stm = $conexao->prepare($sql);
$stm->execute();
$resultado = $stm->fetch(PDO::FETCH_ASSOC);

echo $resultado['qtd_itens'];
?>
