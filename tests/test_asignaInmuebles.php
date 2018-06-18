<?php
    include '../database/DatabaseConnect.php';
    include '../database/CbPM_INMController.php';

    $dConnect = new DatabaseConnect;
    $cdb = $dConnect->dbConnectSimple();
    $CbPM_INMController = new CbPM_INMController();
    $CbPM_INMController->cdb = $cdb;

    echo $CbPM_INMController->asignaInmuebles(1,[1,2]);
  ?>
