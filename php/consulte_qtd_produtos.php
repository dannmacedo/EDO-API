<?php
// Incluir o arquivo de conexão com o banco de dados
include "conexao.php";

// Consulta para obter a quantidade de produtos em estoque
$sql = "SELECT COUNT(*) AS qtd_produtos FROM produtos";
$stm = $conexao->prepare($sql);
$stm->execute();
$resultado = $stm->fetch(PDO::FETCH_ASSOC);

echo $resultado['qtd_produtos'];
?>
