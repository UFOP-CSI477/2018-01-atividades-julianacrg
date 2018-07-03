<?php 

require_once 'model/aluno.php';
require_once 'model/cidade.php';

$aluno = new Aluno();
$cidade = new Cidade();

    if(isset($_POST['insert'])){
        $aluno->setNome($_POST['nome']);
        $aluno->setCidade_id($_POST['cidade_id']);
        if($aluno->insert() == 1){
            $result = "Aluno inserido com sucesso.";
        }else{
            $error = "Erro ao inserir, tente novamente!";
        }
    }

   
?>