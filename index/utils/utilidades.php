<?php
    function Index(){
        header("Location: ../index/index.php");
    }

    function Exibir($chave, $dado, $selecao = 0){
        $str = "<option value=0>Selecione</option>";
        $check="";
        foreach($dado as $linha){
            if($selecao > 0 && $linha['id_funcao'] == $selecao){
                $check = "selected";
            }
            //var_dump($linha);
            $str .= "<option ".$check." value='".$linha['id_funcao']."'>".$linha['nome']."</option>";
            $check = "";
        }
        return $str;
    }

    function ListarUsuario($selecao){
        $lista = Login::ListarPersonal();
        //var_dump($lista);
        return Exibir(array('id_funcao','funcao'),$lista, $selecao);
    }


?>