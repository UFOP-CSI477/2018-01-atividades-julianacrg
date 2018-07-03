<?php 

require_once 'model/estado.php';

$estado = new Estado();

?>


<!DOCTYPE html>
<html>
<head>
    <title>Lista de Estados</title>

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

  <div class="container">

    <h1>Lista de Estados</h1>

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
                    <p id="p">Nome do Estado</p>
                  </td>
                  <td id="td">
                    <p id="p">Sigla</p>
                  </td>
                </tr>
                <?php
                $stmt = $estado->index();
                while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                ?>
                <form id="estado" name="estado" method="post" enctype="multipart/form-data">
                  <tr border"1">
                    <td id="td">
                      <?php echo $row->nome; ?>
                    </td>
                    <td id="td">
                      <?php
                          echo $row->sigla; ?>
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
