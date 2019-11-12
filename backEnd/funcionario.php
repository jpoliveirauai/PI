<?php

    
    class Funcionario{
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
        public $cargo;
        public $salario;
    }

    function getFuncionarios($conn){
        $arrayFuncionarios = [];
        
        $sql = "SELECT  F.CPF, F.NOME, E.CEP, E.LOGRADOURO, E.BAIRRO, E.CIDADE, F.TELEFONE,
                        F.EMAIL, F.SEXO, F.ESTADO_CIVIL, F.PROFISSAO, F.USUARIO, F.CARGO, F.SALARIO
                FROM FUNCIONARIO F 
                    INNER JOIN ENDERECO E ON F.ID_ENDERECO = E.ID ";

        
        // Prepara a consulta
        if (! $stmt = $conn->prepare($sql))
        throw new Exception("Falha na operacao prepare: " . $conn->error);
        // Executa a consulta
        if (! $stmt->execute())
        throw new Exception("Falha na operacao execute: " . $stmt->error);
        // Indica as variáveis PHP que receberão os resultados
        if (! $stmt->bind_result($cpf, $nome, $cep, $lougradoro, $bairro, $cidade, $telefone, $email, $sexo, $estado_civil, $profissao, $usuario, $cargo, $salario))
        throw new Exception("Falha na operacao bind_result: " . $stmt->error);   
        
        // Navega pelas linhas do resultado
        while ($stmt->fetch())
        {
            $funcionario = new Funcionario();
            
            $funcionario->cpf             = $cpf;
            $funcionario->nome            = $nome;
            $funcionario->cep             = $cep;
            $funcionario->lougradoro      = $lougradoro;
            $funcionario->bairro          = $bairro;
            $funcionario->cidade          = $cidade;
            $funcionario->telefone        = $telefone;
            $funcionario->email           = $email;
            $funcionario->sexo            = $sexo;
            $funcionario->estado_civil    = $estado_civil;
            $funcionario->profissao       = $profissao;
            $funcionario->usuario         = $usuario;
            $funcionario->cargo           = $cargo;
            $funcionario->salario         = $salario;
            
            $arrayFuncionarios[] = $funcionario;
        }            
        if ($conn != null){
            $conn->close();
        }
        return $arrayFuncionarios;
    }
    
?>
