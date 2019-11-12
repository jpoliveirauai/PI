<html>
<header><title>This is title</title></header>
<body>
Hello world
<?php
    require "funcionario.php";
    require "conexaoBanco.php";
    require "cliente.php";
    require "imovel.php";
    require "imagens.php";
    $arrayFuncionarios = [];
    $msgErro = "";
    
    try{
        $conn = conectaMySQL();
        $arrayFuncionarios = getFuncionarios($conn);
        echo $arrayFuncionarios[0]->nome;

        $conn = conectaMySQL();
        $arrayClientes = getClientes($conn);
        echo $arrayClientes[0]->nome;

        $conn = conectaMySQL();
        $arrayImoveis = getImoveis($conn);
        echo $arrayImoveis[0]->valor;

        $conn = conectaMySQL();
        $arrayImagens = getImagens($conn, 1);
        
        echo $arrayImagens[0]->caminho;
        
    } catch ( Exception $e ) {
        $msgErro = $e->getMessage();
    }

    
?>
</body>
</html>
