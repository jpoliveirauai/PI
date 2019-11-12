<?php
    class Imagem {
        public $caminho;
        public $imovelCod;
    }
    
    function getImagens($conn, $imovelId){
        $arrayImagem = [];

        $SQL = "SELECT  CAMINHO_IMG
                FROM IMAGENS I 
                WHERE I.IMOVEL_COD = ? ";

        // Prepara a consulta
        if (! $stmt = $conn->prepare($SQL))
        throw new Exception("Falha na operacao prepare: " . $conn->error);

        if (! $stmt->bind_param("i", $imovelId))
        throw new Exception("Falha na operacao bind_param: " . $stmt->error);

        // Executa a consulta
        if (! $stmt->execute())
        throw new Exception("Falha na operacao execute: " . $stmt->error);

        // Indica as variáveis PHP que receberão os resultados
        if (! $stmt->bind_result($caminho))
        throw new Exception("Falha na operacao bind_result: " . $stmt->error);    
        // Navega pelas linhas do resultado
        while ($stmt->fetch()){
            $imagem = new Imagem();

            $imagem->caminho  = $caminho;
            
            $arrayImagem[] = $imagem;
        }

        if ($conn != null){
            $conn->close();
        }
        return $arrayImagem;
    }
    
?>

