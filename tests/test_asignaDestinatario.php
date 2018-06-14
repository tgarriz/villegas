<?php
    include '../database/DatabaseConnect.php';
    include '../database/CbDestinatarioController.php';

    $dConnect = new DatabaseConnect;
    $cdb = $dConnect->dbConnectSimple();
    $CbDestinatarioController = new CbDestinatarioController();
    $CbDestinatarioController->cdb = $cdb;

    echo $CbDestinatarioController->asignaDestinatario('F',3,4,'domicilio2');
  ?>
