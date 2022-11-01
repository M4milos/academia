<?php
    include_once('autoload.class.php');
    class Treino extends BancoDados{
        
        private $id;
        private $rep;
        private $tip;
        private $usu;
        
        public function __construct($id,$rep,$tip,$usu){
            $this->setId($id);
            $this->setRep($rep);
            $this->setTip($tip);
            $this->setIdUsu($usu);    
        }

        public function setId($id){if($id > 0){$this->id = $id;}}
        public function getId(){return $this->id;}

        public function setRep($rep){if($rep != ""){$this->rep = $rep;}}
        public function getRep(){return $this->rep;}

        public function setTip($tip){if($tip != ""){$this->tip = $tip;}}
        public function getTip(){return $this->tip;}

        public function setIdUsu($usu){if($usu > 0){$this->usu = $usu;}}
        public function getIdUsu(){return $this->usu;}

        public function Salvar(){
            try{
                $sql = "INSERT INTO `TCC`.`treino` (`treino_repeticao`, `treino_tipo`, `id_usuario`) 
                VALUES (:rep,:tip,:usu)";

                $param = array( ":rep" => $this->getRep(),
                                ":tip" => $this->getTip(),
                                ":usu" => $this->getIdUsu());
                $teste = parent::Execute($sql,$param);
                return $teste;
            }catch(Exception $e){
                echo "Erro ao salvar: ('{$e->getMessage()}')\n{$e}\n";
            }
        }

        public static function Listar($tipo = 0, $info = ""){
            try{
                $sql = "SELECT * FROM TCC.treino";
                if($tipo > 0)
                    switch ($tipo) {
                        case '1': $sql .= " WHERE id_treino = :info"; break;
                    }
                    $param = array();
                        if($tipo > 0)
                            $param = array(":info" => $info);   
                return parent::Listar($sql,$param);
            }catch(Exception $e){
                echo "Erro ao listar: ('{$e->getMessage()}')\n{$e}\n";
            }
        }

        public function Editar(){
            try{
                $sql = "UPDATE TCC.treino SET treino_repeticao = :treino_repeticao, treino_tipo = :treino_tipo WHERE id_treino = :id";
                $param = array( ":treino_repeticao" => $this->getRep(),
                                ":treino_tipo" => $this->getTip(),
                                ":id" => $this->getId());
                return parent::Execute($sql,$param);
            }catch(Exception $e){
                echo "Erro ao editar: ('{$e->getMessage()}')\n{$e}\n";
            }
        }

        public function Excluir(){
            try{
                $sql = "DELETE FROM TCC.treino WHERE id_treino = :id";
                $param = array(":id" => $this->getId());
                if (parent::Execute($sql,$param)) {
                    return true;
                }
            }catch(Exception $e){
                echo "Erro ao excluir: ('{$e->getMessage()}')\n{$e}\n";
            }
        }
    }
?>