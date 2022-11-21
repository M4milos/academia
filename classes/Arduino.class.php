<?php
    require_once('autoload.class.php');
    class Arduino extends BancoDados{
        private $id;
        private $temp;
        private $mov;
        private $acc;

        public function __construct($id,$temp,$mov, $acc){
            $this->setId($id);
            $this->setTemp($temp);
            $this->setMov($mov);
            $this->setAcc($acc);
        }

        public function setId($id){if($id > 0){$this->id = $id;}}
        public function getId(){return $this->id;}

        public function setTemp($temp){if($temp != ""){$this->temp = $temp;}}
        public function getTemp(){return $this->temp;}

        public function setMov($mov){if($mov != ""){$this->mov = $mov;}}
        public function getMov(){return $this->mov;}

        public function setAcc($acc){if($acc != ""){$this->acc = $acc;}}
        public function getAcc(){return $this->acc;}

        public function Salvar(){
            try{
                $sql = "INSERT INTO `TCC`.`arduino` (`temp_value`, `mov`,`acc`) 
                VALUES (:temp,:mov, :Acc)";

                $param = array( ":temp" => $this->getTemp(),
                                ":mov" => $this->getMov(),
                                ":Acc" => $this->getAcc());
                $teste = parent::Execute($sql,$param);
                return $teste;
            }catch(Exception $e){
                echo "Erro ao salvar: ('{$e->getMessage()}')\n{$e}\n";
            }
        }

        public static function Listagem($tipo = 0, $info = ""){
            try{
                $sql = "SELECT * FROM TCC.arduino";
                if($tipo > 0)
                    switch ($tipo) {
                        case '1': $sql .= " WHERE id_arduino = :info"; break;
                    }
                    $param = array();
                        if($tipo > 0)
                            $param = array(":info" => $info);   
                return parent::Listar($sql,$param);
            }catch(Exception $e){
                echo "Erro ao listar: ('{$e->getMessage()}')\n{$e}\n";
            }
        }
    }
    
?>