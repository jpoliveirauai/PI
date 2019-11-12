<?php
    class Cliente {
        public $cpf;
        public $nome;
        public $cep;
        public $lougradoro;
        public $bairro;
        public $cidade;
        public $telefone;
        public $email;
        public $sexo;
        public $estado_civil;
        public $profissao;
        public $usuario;
    }

    function getClientes($conn){
        $arrayCliente = [];

        $SQL = "SELECT  C.CPF, C.NOME, E.CEP, E.LOGRADOURO, E.BAIRRO, E.CIDADE, C.TELEFONE,
                        C.EMAIL, C.SEXO, C.ESTADO_CIVIL, C.PROFISSAO, C.USUARIO
                FROM CLIENTE C 
                    INNER JOIN ENDERECO E ON C.ID_ENDERECO = E.ID ";

        // Prepara a consulta
        if (! $stmt = $conn->prepare($SQL))
        throw new Exception("Falha na operacao prepare: " . $conn->error);

        // Executa a consulta
        if (! $stmt->execute())
        throw new Exception("Falha na operacao execute: " . $stmt->error);

        // Indica as variáveis PHP que receberão os resultados
        if (! $stmt->bind_result($cpf, $nome, $cep, $lougradoro, $bairro, $cidade, $telefone, $email, $sexo, $estado_civil, $profissao, $usuario))
        throw new Exception("Falha na operacao bind_result: " . $stmt->error);    

        // Navega pelas linhas do resultado
        while ($stmt->fetch()){
            $cliente = new Cliente();

            $cliente->cpf             = $cpf;
            $cliente->nome            = $nome;
            $cliente->cep             = $cep;
            $cliente->lougradoro      = $lougradoro;
            $cliente->bairro          = $bairro;
            $cliente->cidade          = $cidade;
            $cliente->telefone        = $telefone;
            $cliente->email           = $email;
            $cliente->sexo            = $sexo;
            $cliente->estado_civil    = $estado_civil;
            $cliente->profissao       = $profissao;
            $cliente->usuario         = $usuario;

            $arrayCliente[] = $cliente;
        }

        if ($conn != null){
            $conn->close();
        }
        return $arrayCliente;
    }
    
?>

