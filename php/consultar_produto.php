<?php
// Conexão com o banco de dados (inclua seu arquivo de conexão aqui)
include "conexao.php";

$code = $_POST["code"];

try {
    $sql = "SELECT * FROM produtos WHERE code = :code";
    $stm = $conexao->prepare($sql);
    $stm->bindValue(':code', $code);
    $stm->execute();

    $produto = $stm->fetch(PDO::FETCH_ASSOC);

    if ($produto) {
        echo json_encode($produto);
    } else {
        echo json_encode(array());
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>