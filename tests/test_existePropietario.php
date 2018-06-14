<?php
    include '../database/DatabaseConnect.php';
    include '../database/CbPropietarioController.php';

    $dConnect = new DatabaseConnect;
    $cdb = $dConnect->dbConnectSimple();
    $CbPropietarioController = new CbPropietarioController();
    $CbPropietarioController->cdb = $cdb;

    echo $CbPropietarioController->existePropietario('J',1,6);
  ?>
