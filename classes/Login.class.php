<?php
    include_once('autoload.class.php');
    class Login extends BancoDados{
        
        private $id;
        private $nome;
        private $email;
        private $senha;
        private $funcao;
        
        public function __construct($id,$nome,$email,$senha,$funcao){
            $this->setId($id);
            $this->setNome($nome);
            $this->setEmail($email);
            $this->setSenha($senha);
            $this->setIdFuncao($funcao);
        }

        public function setId($id){if($id > 0){$this->id = $id;}}
        public function getId(){return $this->id;}

        public function setNome($nome){if($nome != ""){$this->nome = $nome;}}
        public function getNome(){return $this->nome;}

        public function setEmail($email){if($email != ""){$this->email = $email;}}
        public function getEmail(){return $this->email;}

        public function setSenha($senha){if($senha != ""){$this->senha = $senha;}}
        public function getSenha(){return $this->senha;}

        public function setIdFuncao($funcao){if($funcao > 0){$this->funcao = $funcao;}}
        public function getIdFuncao(){return $this->funcao;}

        public function Salvar(){
            try{
                $sql = "INSERT INTO `TCC`.`usuario` (`nome`, `email`, `senha`,   `id_funcao` ) 
                VALUES (:nome,:email,:senha,:id_funcao)";

                $param = array( ":nome" => $this->getNome(),
                                ":email" => $this->getEmail(),
                                ":senha" => $this->getSenha(),
                                ":id_funcao" => $this->getIdFuncao());
                $teste = parent::Execute($sql,$param);
                return $teste;
            }catch(Exception $e){
                echo "Erro ao salvar: ('{$e->getMessage()}')\n{$e}\n";
            }
        }

        public static function ListarUsuario($tipo = 0, $info = ""){
            try{
                $sql = "SELECT * FROM TCC.usuario";
                if($tipo > 0)
                    switch ($tipo) {
                        case '1': $sql .= " WHERE id_usuario = :info"; break;
                        case '2': $sql .= " WHERE nome LIKE :info"; $info .= "%"; break;
                        case '3': $sql .= " WHERE email LIKE :info"; $info .= "%"; break;
                    }
                    $param = array();
                        if($tipo > 0)
                            $param = array(":info" => $info);   
                return parent::Listar($sql,$param);
            }catch(Exception $e){
                echo "Erro ao listar: ('{$e->getMessage()}')\n{$e}\n";
            }
        }

        public static function ListarFuncao($id){
            try{
                $sql = "SELECT * FROM TCC.funcao";
                $param = array(); 
                if($id > 0)
                    $sql .= " WHERE id_funcao = :id";
                    $param = array(":id" => $id);
                return parent::Listar($sql,$param);
            }catch(Exception $e){
                echo "Erro ao listar: ('{$e->getMessage()}')\n{$e}\n";
            }
        }


        public function Editar(){
            try{
                $sql = "UPDATE TCC.usuario SET nome = :nome, email = :email, senha = :senha WHERE id_usuario = :id";
                $param = array( ":nome" => $this->getNome(),
                                ":email" => $this->getEmail(),
                                ":senha" => $this->getSenha(),
                                ":id" => $this->getId());
                return parent::Execute($sql,$param);
            }catch(Exception $e){
                echo "Erro ao editar: ('{$e->getMessage()}')\n{$e}\n";
            }
        }

        public function Excluir(){
            try{
                $sql = "DELETE FROM TCC.usuario WHERE id_usuario = :id";
                $param = array(":id" => $this->getId());
                return parent::Execute($sql,$param);
            }catch(Exception $e){
                echo "Erro ao excluir: ('{$e->getMessage()}')\n{$e}\n";
            }
        }

        public static function Logar($email, $senha){
            try{
                if(strlen($email) > 0 && strlen($senha) > 0){
                    $sql = "SELECT * FROM TCC.usuario WHERE email = :email AND senha = :senha";
                    $param = array(":email" => $email, ":senha" => $senha);
                    $result = parent::EfetuaLogin($sql,$param);
                    if($result){
                        if(count($result) > 0){
                                $_SESSION['usuario'] = array('id' => $result['id_usuario'], 'nome' => $result['nome']);
                                return true;
                            }
                        }
                    }else {
                        $_SESSION['nao_autenticado'] = true;
                        return false; 
                    }
                }catch(Exception $e){
                    echo "Erro ao logar: ('{$e->getMessage()}')\n{$e}\n";
            }
        }

        public static function Deslogar(){
            try{
                session_destroy();
                return true;
            }   catch(Exception $e){
                    echo "Erro ao listar: ('{$e->getMessage()}')\n{$e}\n";
            }
        }

        public function __toString(){
            return "Nome: ".$this->getNome()."<br>
                    Email: ".$this->getEmail()."<br>
                    Senha: ".$this->getSenha()."<br>
                    Função: ".$this->getIdFuncao();    
        }
    }
?>