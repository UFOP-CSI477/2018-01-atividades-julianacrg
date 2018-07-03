<?php 

require_once 'model/estado.php';

$estado = new Estado();

    if(isset($_POST['insert'])){
        $estado->setNome($_POST['nome']);
        $estado->setSigla($_POST['sigla']);
        if($estado->insert() == 1){
            $result = "Estado inserido com sucesso.";
        }else{
            $error = "Erro ao inserir, tente novamente!";
        }
    }

   
?>