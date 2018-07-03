<?php 

require_once 'model/cidade.php';
require_once 'model/estado.php';

$cidade = new Cidade();
$estado = new Estado();

    if(isset($_POST['insert'])){
        $cidade->setNome($_POST['nome']);
        $cidade->setEstado_id($_POST['estado_id']);
        if($cidade->insert() == 1){
            $result = "Cidade inserida com sucesso.";
        }else{
            $error = "Erro ao inserir, tente novamente!";
        }
    }

   
?>