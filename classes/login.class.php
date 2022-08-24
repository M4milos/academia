<?php
    include_once('autoload.class.php');
    class Login extends BancoDados{
        
        private $id;
        private $nome;
        private $email;
        private $senha;
        private $cpf;
        
        public function __construct($id,$nome,$email,$senha,$cpf){
            $this->setId($id);
            $this->setNome($nome);
            $this->setEmail($email);
            $this->setSenha($senha);
            $this->setCpf($cpf);
        }

        public function setId($id){if($id > 0){$this->id = $id;}}
        public function getId(){return $this->id;}

        public function setNome($nome){if($nome != ""){$this->nome = $nome;}}
        public function getNome(){return $this->nome;}

        public function setEmail($email){if($email != ""){$this->email = $email;}}
        public function getEmail(){return $this->email;}

        public function setSenha($senha){if($senha != ""){$this->senha = $senha;}}
        public function getSenha(){return $this->senha;}

        public function setCpf($cpf){if($cpf != ""){$this->cpf = $cpf;}}
        public function getCpf(){return $this->cpf;}

        public function Salvar(){
            try{
                $sql = "INSERT INTO usuario (nome,email,senha,cpf) VALUES (:nome,:email,:senha,:cpf)";
                $param = array( ":nome" => $this->getNome(),
                                ":email" => $this->getEmail(),
                                ":senha" => $this->getSenha(),
                                ":cpf" => $this->getCpf());
                return parent::Execute($sql,$param);
            }catch(Exception $e){
                echo "Erro ao salvar: ('{$e->getMessage()}')\n{$e}\n";
            }
        }

        public static function Listar($tipo = 0, $info = ""){
            try{
                $sql = "SELECT * FROM usuario";
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

        public function Editar(){
            try{
                $sql = "UPDATE usuario SET nome = :nome, email = :email, senha = :senha, cpf = :cpf WHERE id_usuario = :id";
                $param = array( ":nome" => $this->getNome(),
                                ":email" => $this->getEmail(),
                                ":senha" => $this->getSenha(),
                                ":cpf" => $this->getCpf(),
                                ":id" => $this->getId());
                return parent::Execute($sql,$param);
            }catch(Exception $e){
                echo "Erro ao editar: ('{$e->getMessage()}')\n{$e}\n";
            }
        }

        public function Excluir(){
            try{
                $sql = "DELETE FROM usuario WHERE id_usuario = :id";
                $param = array(":id" => $this->getId());
                return parent::Execute($sql,$param);
            }catch(Exception $e){
                echo "Erro ao excluir: ('{$e->getMessage()}')\n{$e}\n";
            }
        }

        public static function Logar($email, $senha){
            try{
                if(strlen($email) > 0 && strlen($senha) > 0){
                    $sql = "SELECT * FROM usuario WHERE email = :email AND senha = :senha";
                    $param = array(":email" => $email, ":senha" => $senha);
                    $result = parent::EfetuaLogin($sql,$param);
                    if($result){
                        if(count($result) > 0){
                                $_SESSION['usuario'] = $result['nome'];
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

        // public static function VerificaLogin($email, $senha){
        //     try{
        //         if(strlen($email) > 0 && strlen($senha) > 0){
        //             $sql = "SELECT * FROM usuario WHERE email = :email";
        //             $param = array(":email" => $email);
        //             $verificado = parent::EfetuaLogin($sql,$param);

        //             $sql2 = "SELECT * FROM usuario WHERE senha = :senha";
        //             $param2 = array(":senha" => $senha);
        //             $verificado2 = parent::EfetuaLogin($sql2,$param2);
        //             if($verificado && $verificado2){
        //                 if($verificado['email'] == $verificado2['email']){
        //                     return true;
        //                 }
        //             }else{
        //                 return false;
        //             }
        //         }
        //     }catch(Exception $e){
        //             throw new Exception("Erro ao verificar: ".$e->getMessage());
        //     }
        // }

        public static function Deslogar(){
            try{
                session_destroy();
                return true;
            }   catch(Exception $e){
                    echo "Erro ao listar: ('{$e->getMessage()}')\n{$e}\n";
            }
        }
    }
?>