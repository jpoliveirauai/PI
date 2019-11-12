<?php
    class Imovel{
        public $cod;
        public $dono_cpf;
        public $proposito;
        public $id_endereco;
        public $tipo;
        public $valor;
        public $n_quartos;
        public $n_suites;
        public $descricao;
        public $area_tereno;
        public $tem_piscina;
        public $num_ap;
        public $andar;
        public $valor_condominio;
        public $cep;
        public $logradouro;
        public $bairro;
        public $cidade ;
    }

    function getImoveis($conn){
        $arrayImoveis = [];
        
        $sql = "SELECT  COD, DONO_CPF, PROPOSITO, ID_ENDERECO, TIPO, VALOR, N_QUARTOS, N_SUITES,
                    DESCRICAO, AREA_TERENO, TEM_PISCINA, NUM_AP, ANDAR, VALOR_CONDOMINIO, 
                    E.CEP, E.LOGRADOURO, E.BAIRRO, E.CIDADE 
                FROM IMOVEL I 
                    INNER JOIN ENDERECO E ON I.ID_ENDERECO = E.ID ";


        
        // Prepara a consulta
        if (! $stmt = $conn->prepare($sql))
            throw new Exception("Falha na operacao prepare: " . $conn->error);
            
        // Executa a consulta
        if (! $stmt->execute())
            throw new Exception("Falha na operacao execute: " . $stmt->error);
        // Indica as variáveis PHP que receberão os resultados
        if (! $stmt->bind_result( $cod, $dono_cpf, $proposito, $id_endereco, $tipo, $valor, $n_quartos, $n_suites, $descricao, $area_tereno, $tem_piscina, $num_ap, $andar, $valor_condominio, $cep, $logradouro, $bairro, $cidade ))
            throw new Exception("Falha na operacao bind_result: " . $stmt->error);   
        
        // Navega pelas linhas do resultado
        while ($stmt->fetch())
        {
            $imovel = new Imovel();
            
            $imovel->cod                = $cod;
            $imovel->dono_cpf           = $dono_cpf;
            $imovel->proposito          = $proposito;
            $imovel->id_endereco        = $id_endereco;
            $imovel->tipo               = $tipo;
            $imovel->valor              = $valor;
            $imovel->n_quartos          = $n_quartos;
            $imovel->n_suites           = $n_suites;
            $imovel->descricao          = $descricao;
            $imovel->area_tereno        = $area_tereno;
            $imovel->tem_piscina        = $tem_piscina;
            $imovel->num_ap             = $num_ap;
            $imovel->andar              = $andar;
            $imovel->valor_condominio   = $valor_condominio;
            $imovel->cep                = $cep;
            $imovel->logradouro         = $logradouro;
            $imovel->bairro             = $bairro;
            $imovel->cidade             = $cidade ;
            
            $arrayImoveis[] = $imovel;
        }   
                 
        if ($conn != null){
            $conn->close();
        }
        return $arrayImoveis;
    }
    
?>
