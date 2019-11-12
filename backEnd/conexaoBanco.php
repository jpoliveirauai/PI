<?php
    define("HOST", "localhost"); 
    define("USER", "root");
    define("PASSWORD", "123456"); 
    define("DATABASE", "ZIKA_IMOBILIARIA");

    function conectaMySQL(){
        $conexao = new mysqli(HOST, USER, PASSWORD, DATABASE);
        if($conexao->conect_error){
            throw new Exception('Falha na cominicação com o MySQL'.$conexao->connect_error);
        }
        return $conexao;
    }
?>