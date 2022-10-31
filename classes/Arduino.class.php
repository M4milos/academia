<?php
    require_once('autoload.class.php');
    class Arduino extends BancoDados{
        private $id;
        private $temp;
        private $acy;
        private $acx;
        private $acz;
        private $gyx;
        private $gyy;
        private $gyz;

        public function __construct($id,$temp,$acy,$acx,$acz,$gyx,$gyy,$gyz){
            $this->setId($id);
            $this->setTemp($temp);
            $this->setAcx($acx);
            $this->setAcy($acy);
            $this->setAcz($acz);
            $this->setGyx($gyx);
            $this->setGyy($gyy);
            $this->setGyz($gyz);
        }

        public function setId($id){if($id > 0){$this->id = $id;}}
        public function getId(){return $this->id;}

        public function setTemp($temp){if($temp != ""){$this->temp = $temp;}}
        public function getTemp(){return $this->temp;}

        public function setAcx($acx){if($acx != ""){$this->acx = $acx;}}
        public function getAcx(){return $this->acx;}

        public function setAcy($acy){if($acy != ""){$this->acy = $acy;}}
        public function getAcy(){return $this->acy;}

        public function setAcz($acz){if($acz != ""){$this->acz = $acz;}}
        public function getAcz(){return $this->acz;}

        public function setGyx($gyx){if($gyx != ""){$this->GyX = $gyx;}}
        public function getGyx(){return $this->GyX;}

        public function setGyy($gyy){if($gyy != ""){$this->GyY = $gyy;}}
        public function getGyy(){return $this->GyY;}

        public function setGyz($gyz){if($gyz != ""){$this->GyZ = $gyz;}}
        public function getGyz(){return $this->GyZ;}

        public function Salvar(){
            try{
                $sql = "INSERT INTO `TCC`.`arduino` (`temp_value`, `AcX`, `AcY`, `AcZ`, `GyX`, `GyY`, `GyZ`) 
                VALUES (:temp,:AcX,:AcY,:GyX,:GyY)";

                $param = array( ":temp" => $this->getTemp(),
                                ":AcX" => $this->getAcx(),
                                ":AcY" => $this->getAcy(),
                                ":AcZ" => $this->getAcz(),
                                ":GyX" => $this->getGyX(),
                                ":GyY" => $this->getGyY(),
                                ":GyZ" => $this->getGyz());
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