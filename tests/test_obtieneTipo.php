<?php
    include '../database/DatabaseConnect.php';
    include '../database/CbPropietarioController.php';
    $dConnect = new DatabaseConnect;
    $cdb = $dConnect->dbConnectSimple();
    $CbPropietarioController = new CbPropietarioController();
    $CbPropietarioController->cdb = $cdb;

    $id = 4;
    $query1 = "select count(*) as res from catastro.p_fisicas where id = ".$id.";";
    $statement = $CbPropietarioController->cdb->prepare($query1);
    $statement->execute();
    $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
    if ($rows[0]->res == 1) {
      echo 'F';
    }
    else { echo  'J';}
  ?>
