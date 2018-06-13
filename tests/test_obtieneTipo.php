<?php
    include '../database/DatabaseConnect.php';
    include '../database/CbPropietarioController.php';
    $dConnect = new DatabaseConnect;
    $cdb = $dConnect->dbConnectSimple();
    $CbPropietarioController = new CbPropietarioController();
    $CbPropietarioController->cdb = $cdb;

    $id = 8;
    $res = $CbPropietarioController->obtieneTipo($id);
    echo 'res es '.$res;
  ?>
