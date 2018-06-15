<?php
    include '../database/DatabaseConnect.php';
    include '../database/CbDestinatarioController.php';

    $dConnect = new DatabaseConnect;
    $cdb = $dConnect->dbConnectSimple();
    $CbDestinatarioController = new CbDestinatarioController();
    $CbDestinatarioController->cdb = $cdb;

    echo $CbDestinatarioController->obtieneNomencla(1);
  ?>
