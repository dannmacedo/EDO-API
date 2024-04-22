<?php
// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $nome = $_POST["txtNome"];
    $cpf = $_POST["txtCpf"];
    $email = $_POST["txtEmail"];
    $telefone = $_POST["txtTelefone"];
    $senha = $_POST["txtSenha"];

    // Realiza a conexão com o banco de dados 
    $enderecoBD = "localhost" ;
    $banco      = "edo_project" ;
    $usuarioBD  = "root" ;
    $senhaBD    = "" ;

    
    try {
        $conn = new PDO( "mysql:host=$enderecoBD;dbname=$banco" , $usuarioBD  , $senhaBD  ) ;
        // Define o modo de erro do PDO para exceção
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Query SQL para inserir um novo usuário
        $sql = "INSERT INTO usuarios (nome, cpf, email, telefone, senha)
                VALUES (:nome, :cpf, :email, :telefone, :senha)";
        $stmt = $conn->prepare($sql);

        // Bind dos parâmetros da query
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':senha', $senha);

        // Executa a query
        $stmt->execute();

        echo "Usuário cadastrado com sucesso!";
    } catch(PDOException $e) {
        echo "Erro ao cadastrar o usuário: " . $e->getMessage();
    }

    $conn = null; // Fecha a conexão com o banco de dados
}
?>
