<?php
    $enderecoBD = "localhost" ;
    $banco      = "edo_project" ;
    $usuarioBD  = "root" ;
    $senhaBD    = "" ;

    $conexao = new PDO( "mysql:host=$enderecoBD;dbname=$banco" , $usuarioBD  , $senhaBD  ) ;

?>
