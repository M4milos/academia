<?php
class BancoDados{
    /* 
        * Classe baseada
        * @acess public
        * @return boolean
    */

    public static function Instancia(){ // Cria conexão com o banco de dados e instancia.
            require_once "conexao.class.php"; // Requerimento da conexão PDO.
        return Conexao::getInstance(); // Retornando uma instancia / conexão.
    }

    public static function Vincular($comando, $param=array()){ // Vincula os parametros e ajeita o BindValue dos dados.
            // Percorre o vetor e retorna as chaves e valores do vetor ja passado.    
            foreach($param as $chave => $valor){ 
                // Setando o BindValue.
                $comando->bindValue($chave, $valor); 
            }
            // Retornando a matriz de dados para a função.
        return $comando; 

    }

    public static function Execute($sql, $param=array()){ // Executa os códigos mysql da classe filha.
            // Criando isntancia e conexão.
            $conexao = self::Instancia(); 
            // Preparando os dados.
            $comando = $conexao->prepare($sql);
            // Vinculando os dados para o vetor.
            $comando = self::Vincular($comando,$param); 
            // Tentando executar os comandos. 
        try {
            // Retornando a execução do comando.
            return $comando->execute(); 
        } catch(Exception $e){ // Pegando os erros se tiver.
           // Retornando o erro.
           throw new Exception("Erro na execução ". $e->getMessage()); 
        } 
    }

    public static function Listar($sql, $param=array()){ // Lista os dados vindos por matriz do banco de dados.
            //var_dump($param);
            // Criando instancia e conexão.
            $conexao = self::Instancia();
            // Preparando o script do mysql. 
            $comando = $conexao->prepare($sql); 
            // Vinculandos os parametros para apresentação, gerando um vetor[].
            $comando = self::Vincular($comando,$param); 
            //var_dump($comando);
            // Executando os comandos, cadeia ou sozinhos.
            $comando->execute(); 
            //var_dump($comando);
        // Retornando uma matriz ou vetor multidimensional para apresentação de dados.
        return $comando->fetchAll(); 
    }

    public static function EfetuaLogin($sql, $param=array()){
        $pdo = Conexao::getInstance();
                $stmt = $pdo->prepare($sql);
                $stmt = self::Vincular($stmt,$param);
                $stmt->execute();
                $dado = $stmt->fetch();
            return $dado;
    }
}
?>