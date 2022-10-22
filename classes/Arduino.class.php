<?php
    require_once('autoload.class.php');
    class Arduino extends BancoDados{
        private $id;
        private $temp;
        private $acy;
        private $acx;
        private $gcx;
        private $gcy;

        public function __construct($id,$temp,$acy,$acx,$gcx,$gcy){
            $this->setId($id);
            $this->setTemp($temp);
            $this->setAcx($acx);
            $this->setAcy($acy);
            $this->setGcx($gcx);
            $this->setGcy($gcy);
        }

        public function setId($id){if($id > 0){$this->id = $id;}}
        public function getId(){return $this->id;}

        public function setTemp($temp){if($temp != ""){$this->temp = $temp;}}
        public function getTemp(){return $this->temp;}

        public function setAcx($acx){if($acx != ""){$this->acx = $acx;}}
        public function getAcx(){return $this->acx;}

        public function setAcy($acy){if($acy != ""){$this->acy = $acy;}}
        public function getAcy(){return $this->acy;}

        public function setGcx($gcx){if($gcx != ""){$this->gcx = $gcx;}}
        public function getGcx(){return $this->gcx;}

        public function setGcy($gcy){if($gcy != ""){$this->gcy = $gcy;}}
        public function getGcy(){return $this->gcy;}

        public function Salvar(){
            try{
                $sql = "INSERT INTO `TCC`.`arduino` (`temp`, `acx`, `acy`,  `gcx`, `gcy` ) 
                VALUES (:temp,:acx,:acy,:gcx,:gcy)";

                $param = array( ":temp" => $this->getTemp(),
                                ":acx" => $this->getAcx(),
                                ":acy" => $this->getAcy(),
                                ":gcx" => $this->getGcx(),
                                ":gcy" => $this->getGcy());
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