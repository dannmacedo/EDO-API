<?php
// Inclua o arquivo de conexão com o banco de dados
include "conexao.php";

// Consulta para selecionar os produtos em estoque
$sql = "SELECT * FROM produtos";
$stm = $conexao->prepare($sql);
$stm->execute();
$resultados = $stm->fetchAll(PDO::FETCH_ASSOC);

// Retornar os resultados como JSON para serem manipulados no JavaScript
echo json_encode($resultados);
?>
