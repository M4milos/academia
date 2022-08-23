<?php
    require_once('../../conf/conf.inc.php');

class BancoDados{
    /* 
        ** Classe baseada
        ** @acess public
        ** @return boolean
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

    // public static function Listagem(){

    //     $sql = "SELECT * FROM usuario";

    //     $param = array();

    //     $consulta = self::Listar($sql,$param);  

    //    foreach($consulta as $key){
    //         while (current($key)){
    //             $valor = key($key).'<br/>';
    //             next($key);
    //         }
    //     }

       

        

        // while ($fruit_name = current($array)) {
        //         echo key($array).'<br />';
        //     next($array);
        // }
        

        // foreach ($consulta as $key => $value) {
        //    echo $key;
        // }


        // var_dump($consulta);

        // $array = array();

        // foreach($fieldinfo as $valor){
        //     $valor = $valor->name;
            
        //     array_push($array,$valor);
        // }
        // for ($i=0; $i < count($array); $i++) { 
        //     echo "
        //     <td>".$array[$i]."\n</td>
        //     <td>".$consulta['nome']."\n</td>
        // ";
        // }
        


    // }
        
    // public static function teste(){
    // $con = mysqli_connect("localhost","root","","tcc");

    // if (mysqli_connect_errno()) {
    //   echo "Failed to connect to MySQL: " . mysqli_connect_error();
    //   exit();
    // }
    
    // $sql = "SELECT * FROM usuario";
    
    // if ($result = mysqli_query($con , $sql)) {
    
    //   // Get field information for all fields
    //   $fieldinfo = mysqli_fetch_fields($result);
    
    //   foreach ($fieldinfo as $val) {

    //     printf("Nome: %s\n", $val->name);
    //     printf("Tabela: %s\n", $val->table);
    //     printf("Tamanho máximo: %d\n", $val->max_length);
    //     printf("\n");
    //   }
    //   mysqli_free_result($result);
    // }
    
    // mysqli_close($con);

    // }
}
?>