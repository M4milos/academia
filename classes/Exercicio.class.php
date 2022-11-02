<?php
    require_once('autoload.class.php');
    class Exercio extends BancoDados {
        private $id;
        private $nome;

        public function __construct($id, $nome) {
            $this->setId($id);
            $this->setNome($nome);
        }

        public function setId($id) {if ($id > 0) {$this->id = $id;}}
        public function getId() {return $this->id;}

        public function setNome($nome) {if (strlen($nome) > 0) {$this->nome = $nome;}}
        public function getNome() {return $this->nome;}

        public function Salvar() {
            try {
                $sql = "INSERT INTO `TCC`.`exercicio` (`nome_exercicio`) VALUES (:nome)";
                $param = array(":nome" => $this->getNome());
                $teste = parent::Execute($sql, $param);
                return $teste;
            } catch (Exception $e) {
                echo "Erro ao salvar: ('{$e->getMessage()}')\n{$e}\n";
            }
        }

        public static function ListarExercicio($tipo = 0, $info = "") {
            try {
                $sql = "SELECT * FROM TCC.exercicio";
                if ($tipo > 0)
                    switch ($tipo) {
                        case '1': $sql .= " WHERE id_exercicio = :info"; break;
                        case '2': $sql .= " WHERE nome_exercicio LIKE :info"; $info .= "%"; break;
                    }
                $param = array();
                if ($tipo > 0)
                    $param = array(":info" => $info);
                $teste = parent::Execute($sql, $param);
                return $teste;
            } catch (Exception $e) {
                echo "Erro ao listar: ('{$e->getMessage()}')\n{$e}\n";
            }
        }

        public  function Excluir() {
            try {
                $sql = "DELETE FROM TCC.exercicio WHERE id_exercicio = :id";
                $param = array(":id" => $this->getId());
                $teste = parent::Execute($sql, $param);
                return $teste;
            } catch (Exception $e) {
                echo "Erro ao excluir: ('{$e->getMessage()}')\n{$e}\n";
            }
        }

        public  function Editar() {
            try {
                $sql = "UPDATE TCC.exercicio SET nome_exercicio = :nome WHERE id_exercicio = :id";
                $param = array( ":nome" => $this->getNome(), 
                                ":id" => $this->getId());
                $teste = parent::Execute($sql, $param);
                return $teste;
            } catch (Exception $e) {
                echo "Erro ao editar: ('{$e->getMessage()}')\n{$e}\n";
            }
        }
    }
    
?>