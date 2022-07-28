<?php
/*
    * Super classe pai que irá definir aquilo que é comum para tadas as classes 
    * Classe PAI
    * @acess public
    * @return boolean
*/
require_once('banco.class.php');
require_once "../conf/default.inc.php";
require_once "../conf/Conexao.php";

class Based extends BancoDados{
    private $id;
    private static $count = 0;
        
        public function __construct($id){/*Aqui vai os metodos e variaveis da classe pai*/
            $this->setId($id);    
            self::$count += 1;
        }

        public function setId($id){
            if ($id > 0){
                $this->id = $id;
            }
        }
        public function getId(){return $this->id;}

        public function __toString(){
            return  "<h5>[Pai] <br>".
                    "ID: ". $this->getId(). "<br>".
                    "Contador: ". self::$count."</h5>";
        }
    }

?>