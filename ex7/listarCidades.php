<?php 

require_once 'model/cidade.php';
require_once 'model/estado.php';

$cidade = new Cidade();
$estado = new Estado();

?>


<!DOCTYPE html>
<html>
<head>
    <title>Lista de Cidades</title>

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

  <div class="container">

    <h1>Lista de Cidades</h1>

    <br><br>

    <a href="index.php"><button>Voltar</button></a>

    <div class="container">
      <div class="row section-separator">
        <br><br>
        <div class="form-group">
          <div class="row">
            <?php
            if (isset($result)) {
              ?>
              <div class="alert alert-success">
                <?php echo $result; ?>
              </div>
              <?php
            }else if(isset($error)){
              ?>
              <div class="alert alert-danger">
                <?php echo $error; ?>
              </div>
              <?php
            }
            ?>
           <div class="row">
              <table id="table" class="table" border="1" >
                <tr border"1" bgcolor="#2e4868" bgcolor="">
                  <td id="td">
                    <p id="p">Nome da Cidade</p>
                  </td>
                  <td id="td">
                    <p id="p">Estado</p>
                  </td>
                </tr>
                <?php
                $stmt = $cidade->index();
                while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                ?>
                <form id="cidade" name="cidade" method="post" enctype="multipart/form-data">
                  <tr border"1">
                    <td id="td">
                      <?php echo $row->nome; ?>
                    </td>
                    <td id="td">
                      <?php
                      $stmlE = $estado->index();
                      while ($rowE = $stmlE->fetch(PDO::FETCH_OBJ)){
                        if ($rowE->id == $row->estado_id) {
                          echo $rowE->sigla; 
                        }
                        
                      }?>
                      
                    </td>
                  </tr>
                </form>
                <?php
                }
                ?>
              </table>
    </div>
  </div>
</div>
