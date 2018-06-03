<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.ico">

        <title>Minería</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/dashboard.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="assets/js/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
	<!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <script src="assets/js/vendor/holder.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
        <script src="js/app.js"></script>
    </head>

    <body>
      <!--
            Update
            Creamos una ventana Modal que utilizaremos para crear un nuevo idioma, actualizarlo o mostrarlo.
            We create a modal window used to create a new language, update or display.-->
                <div class="modal fade" id="myModalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalUpdateLabel"></h4>
                            </div>
                            <form role="form" name="formEditMineral" method="post" action="minerales.php">
                                <div class="modal-body">
                                  <div class="input-group">
                                      <label for="id">Id</label>
                                      <input type="text" readonly class="form-control" id="id" name="id" >
                                      <!--<small class="text-muted">Lo utilizamos como ID y se forma con los iso de idioma (es) y país (ES) unidos por un guión bajo.</small>-->
                                  </div>
                                    <div class="input-group">
                                        <label for="descripcion">Descripcion</label>
                                        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="descripcion" maxlength="250" required>
                                        <!--<small class="text-muted">Lo utilizamos como ID y se forma con los iso de idioma (es) y país (ES) unidos por un guión bajo.</small>-->
                                    </div>
                                </div>
                                <div class="modal-footer">
		                                <button id="update-language" name="update-language" type="submit" class="btn btn-primary">Actualizar</button>
                                    <button id="cancel" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                </div>
                            </form>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
    	<!--
            Create - Read - Update
            Creamos una ventana Modal que utilizaremos para crear un nuevo idioma, actualizarlo o mostrarlo.
            We create a modal window used to create a new language, update or display.-->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"></h4>
                            </div>
                            <form role="form" name="formCbMineral" method="post" action="minerales.php">
                                <div class="modal-body">
                                  <div class="input-group">
                                      <label for="id">Id</label>
                                      <input type="text" readonly class="form-control" id="id" name="id" disabled >
                                      <!--<small class="text-muted">Lo utilizamos como ID y se forma con los iso de idioma (es) y país (ES) unidos por un guión bajo.</small>-->
                                  </div>
                                    <div class="input-group">
                                        <label for="descripcion">Descripcion</label>
                                        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="descripcion" maxlength="250" required>
                                        <!--<small class="text-muted">Lo utilizamos como ID y se forma con los iso de idioma (es) y país (ES) unidos por un guión bajo.</small>-->
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <!--<button id="save-language" name="save-language" type="submit" class="btn btn-primary">Guardar</button>-->
                                    <button id="save-language" name="save-language" type="submit" class="btn">Guardar</button>
                                    <button id="cancel" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                </div>
                            </form>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

		<!-- Modal DELETE -->
		<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalDeleteLabel">
	            <div class="modal-dialog" role="document">
        	        <div class="modal-content">
                	    <div class="modal-header">
                        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                        <h4 class="modal-title" id="myModalDeleteLabel">Eliminación de Mineral</h4>
        	            </div>
                	    <form role="form" name="formDeleteCbMineral" method="post" action="minerales.php">
                        	<div class="modal-body">
                                	<div class="input-group">
	                                    <label for="Mineral">¿Se va a eliminar el registro del mineral seleccionado?</label>
        	                        </div>
               		                <div class="input-group">
         	                      	    <label for="id">Id Mineral</label>
                	                    <input type="text" readonly class="form-control" id="idmineraldelete" name="idmineraldelete" readonly>
                        	        </div>
                                  <div class="input-group">
                                      <label for="descripcion">Descripcion</label>
                                      <input type="text" readonly class="form-control" id="descripcion" name="descripcion" > <!-- aria-describedby="sizing-addon2">-->
                                  </div>
	                        </div>
        	                <div class="modal-footer">
                	                <button id="delete-mineral-select" name="delete-mineral-select" type="submit" class="btn btn-primary">Aceptar</button>
                        	        <button id="cancel" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	                        </div>
        	            </form>
                	</div><!-- /.modal-content -->
	            </div><!-- /.modal-dialog -->
        	</div><!-- /.modal -->

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Dashboard</a></li>
                    </ul>
                    <form class="navbar-form navbar-right">
                        <input type="text" class="form-control" placeholder="Search...">
                    </form>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li><a href="index.php">Productores </a></li>
                        <li class="active"><a href="minerales.php">Minerales<span class="sr-only">(current)</span></a></li>
                        <li><a href="derechos.php">Derechos</a></li>
			                  <li><a href="estados.php">Estados</a></li>
			                  <li><a href="canteras.php">Canteras</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Administrador de Entidades</h1>

                    <h2 class="sub-header">Minerales</h2>

        <?php
              include 'database/DatabaseConnect.php';
	          include 'database/CbMineralController.php';

 	          $dConnect = new DatabaseConnect;
	          $cdb = $dConnect->dbConnectSimple();
	          $CbMineralController = new CbMineralController();
	          $CbMineralController->cdb = $cdb;

            if (isset($_POST["save-language"]) || isset($_POST["update-language"]) ) {
        	     $id = $_POST['id'];
        	     $descripcion = $_POST['descripcion'];
        	     if (isset($_POST["save-language"])){
        	        $CbMineralController->create($descripcion);
        	     }else{
        	        $CbMineralController->update($id,$descripcion);
        	     }
             }

	     if (isset($_POST["delete-mineral-select"]) ) {
 	        $id = $_POST['idmineraldelete'];
          $fp = fopen("/tmp/logphp.txt", "w");
          fputs($fp, "Id = ".$id."\n");
          $fp = fclose($fp);
		      $CbMineralController->delete($id);
	     }

        ?>
	<!-- Añadimos un botón para el diálogo modal -->
	<button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#myModal" onclick='newCbMineral()'>NUEVO</button>
         <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>DESCRIPCION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form role="form" name="formListCbLanguage" method="post" action="minerales.php">
                                <?php
                                try {
                                    $rows = $CbMineralController->readAll();

                                    foreach ($rows as $row) {
                                ?>
                                        <tr>
                                            <td><?php print($row->id); ?></td>
                                            <td><?php print($row->descripcion); ?></td>
                                            <td>
						<button id="see-language"
							name="see-language"
							type="button"
							class="btn btn-success"
							data-toggle="modal"
							data-target="#myModal"
							onclick="openCbMineral('see',
								    '<?php print($row->id); ?>',
										'<?php print($row->descripcion); ?>')">Ver</button>
					    </td>
					    <td>
						<button id="edit-language"
							name="edit-language"
							type="button"
						        class="btn btn-primary"
						        data-toggle="modal"
						        data-target="#myModalUpdate"
						        onclick="openEditMineral('<?php print($row->id); ?>',
							         '<?php print($row->descripcion); ?>')">Editar</button>
					    </td>
				       <td>
					    	<button id="delete-language-modal"
							   name="delete-language-modal"
							   type="button"
			           class="btn btn-danger"
                 data-toggle="modal"
			           data-target="#myModalDelete"
                 onclick="deleteCbMineral('<?php print($row->id); ?>','<?php print($row->descripcion); ?>')"
						     >Eliminar</button>
					    </td>
            </tr>
            <?php
            }
        } catch (Exception $exception) {
            echo 'Error hacer la consulta: ' . $exception;
        }
      ?>

      </form>
    </tbody>
  </table>
</div>
    <!-- Fin código PHP CRUD -->
                </div>
            </div>
        </div>
    </body>
</html>
