<?php
    include '../database/DatabaseConnect.php';
    include '../database/CbPropietarioController.php';

    $dConnect = new DatabaseConnect;
    $cdb = $dConnect->dbConnectSimple();
    $CbPropietarioController = new CbPropietarioController();
    $CbPropietarioController->cdb = $cdb;

    $id = 4;
    $tipo = $CbPropietarioController->obtieneTipo($id);

    if ($tipo == 'F') {
      $query = "select (nombre, apellido) as nombre from catastro.p_fisicas where id = ".$id.";";
      $statement = $CbPropietarioController->cdb->prepare($query);
      $statement->execute();
      $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
      print_r($rows[0]->nombre);
    }
    else {
      $query = "select (rsocial) as nombre from catastro.p_juridicas where id = ".$id.";";
      $statement = $CbPropietarioController->cdb->prepare($query);
      $statement->execute();
      $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
      print_r($rows[0]->nombre);
    }
  ?>
