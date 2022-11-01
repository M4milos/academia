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

    function ListarPainel($tipo, $info){
        $lista = Login::ListarUsuario($tipo, $info);
        $str = "";
        foreach($lista as $linha){
            $str .= "<tr>";
            $str .= "<td>".$linha['id_usuario']."</td>";
            $str .= "<td>".$linha['nome']."</td>";
            $str .= "<td>".$linha['email']."</td>";
            $str .= "<td>".$linha['senha']."</td>";
            $funcao = Login::ListarFuncao($linha['id_funcao']);
            $str .= "<td>".$funcao[0]['nome']."</td>";
            $str .= "<td><a href='cadastro.php?id=".$linha['id_usuario']."&acao=Editar'>Editar</a></td>";
            $str .= "<td><a href='../processa/processa.php?id=".$linha['id_usuario']."&acao=excluir'>Excluir</a></td>";
            $str .= "</tr>";
        }
        return $str;
    }

    function VerificaFuncao($acao){
        if($acao == 'Treino'){
            $array = array( 'values' => 'treino_nome', 'treino_tipo', 'treino_repetição');
            return $array;
        }
    }

    function DefaultF($acao){
        if ($acao != 'Treino') {  
            $array = array( 'values' => 'nome', 'email', 'senha', 'tipo');
            return $array;
        }
    }

?>