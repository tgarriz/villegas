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

        <title>Catastro - Gral. Villegas</title>

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
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <script src="assets/js/vendor/holder.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
        <script src="js/appPM-INM.js"></script>
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
                            <form role="form" name="formEdit" method="post" action="index.php">
                                <div class="modal-body">
                                  <input type="hidden" readonly class="form-control" id="id" name="id" >
                                  <div class="input-group">
                                      <label for="plano">Plano</label>
                                      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" required>
                                      <!--<small class="text-muted">Lo utilizamos como ID y se forma con los iso de idioma (es) y país (ES) unidos por un guión bajo.</small>-->
                                  </div>
                                  <div class="input-group">
                                      <label for="apellido">Apellido</label>
                                      <input type="text" class="form-control" id="apellido" name="apellido" placeholder="apellido" maxlength="200" required>
                                      <!--<small class="text-muted">Lo utilizamos como ID y se forma con los iso de idioma (es) y país (ES) unidos por un guión bajo.</small>-->
                                  </div>
                                  <div class="input-group col-xs-2">
                                    <label for="tipo_doc">Tipo</label>
                                    <select class="form-control" id="tipo_doc" name="tipo_doc" maxlength="3" required>
                                      <option value="DNI">DNI</option>
                                      <option value="LC">LC</option>
                                      <option value="LE">LE</option>
                                    </select>
                                  </div>
                                  <div class="input-group">
                                      <label for="nro_doc">Nro. Documento</label>
                                      <input type="number" class="form-control" id="nro_doc" name="nro_doc" placeholder="nro_doc" maxlength="9" required>
                                      <!--<small class="text-muted">Lo utilizamos como ID y se forma con los iso de idioma (es) y país (ES) unidos por un guión bajo.</small>-->
                                  </div>
                                  <div class="input-group">
                                      <label for="domicilio">Domicilio</label>
                                      <input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="domicilio" maxlength="200" required>
                                      <!--<small class="text-muted">Lo utilizamos como ID y se forma con los iso de idioma (es) y país (ES) unidos por un guión bajo.</small>-->
                                  </div>
                                  <div class="input-group">
                                      <label for="cuit">Cuit</label>
                                      <input type="number" class="form-control" id="cuit" name="cuit" placeholder="cuit" maxlength="12" required>
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
            Create - Read
            Creamos una ventana Modal que utilizaremos para crear un nuevo idioma, actualizarlo o mostrarlo.
            We create a modal window used to create a new language, update or display.-->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"></h4>
                            </div>
                            <form role="form" name="formCbPFisica" method="post" action="index.php">
                                <div class="modal-body">
                                  <!--<div class="input-group">
                                      <label for="id">Id</label>
                                      <input type="text" readolny class="form-control" id="id" name="id">
                                  </div>-->
                                  <input type="hidden" readonly class="form-control" id="id" name="id" >
                                  <div class="input-group">
                                      <label for="nombre">Nombre</label>
                                      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" required>
                                      <!--<small class="text-muted">Lo utilizamos como ID y se forma con los iso de idioma (es) y país (ES) unidos por un guión bajo.</small>-->
                                  </div>
                                  <div class="input-group">
                                      <label for="apellido">Apellido</label>
                                      <input type="text" class="form-control" id="apellido" name="apellido" placeholder="apellido" maxlength="200" required>
                                      <!--<small class="text-muted">Lo utilizamos como ID y se forma con los iso de idioma (es) y país (ES) unidos por un guión bajo.</small>-->
                                  </div>
                                  <div class="input-group col-xs-2">
                                    <label for="tipo_doc">Tipo</label>
                                    <select class="form-control" id="tipo_doc" name="tipo_doc" maxlength="3" required>
                                      <option value="DNI" selected="selected">DNI</option>
                                      <option value="LC">LC</option>
                                      <option value="LE">LE</option>
                                    </select>
                                  </div>
                                  <div class="input-group">
                                      <label for="nro_doc">Nro. Documento</label>
                                      <input type="number" class="form-control" id="nro_doc" name="nro_doc" placeholder="nro_doc" maxlength="9" required>
                                      <!--<small class="text-muted">Lo utilizamos como ID y se forma con los iso de idioma (es) y país (ES) unidos por un guión bajo.</small>-->
                                  </div>
                                  <div class="input-group">
                                      <label for="domicilio">Domicilio</label>
                                      <input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="domicilio" maxlength="200" required>
                                      <!--<small class="text-muted">Lo utilizamos como ID y se forma con los iso de idioma (es) y país (ES) unidos por un guión bajo.</small>-->
                                  </div>
                                  <div class="input-group">
                                      <label for="cuit">Cuit</label>
                                      <input type="number" class="form-control" id="cuit" name="cuit" placeholder="cuit" maxlength="12" required>
                                      <!--<small class="text-muted">Lo utilizamos como ID y se forma con los iso de idioma (es) y país (ES) unidos por un guión bajo.</small>-->
                                  </div>
                                </div>
                                <div class="modal-footer">
                                    <button id="save-language" name="save-language" type="submit" class="btn btn-primary">Guardar</button>
                                    <button id="cancel"type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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
	                        <h4 class="modal-title" id="myModalDeleteLabel">Eliminación de Registro</h4>
        	            </div>
                	    <form role="form" name="formDeleteCbPFisica" method="post" action="index.php">
                        	<div class="modal-body">
                                	<div class="input-group">
	                                    <label for="idPFisica">¿Se va a eliminar el registro seleccionado?</label>
        	                        </div>
               		                <div class="input-group">
         	                      	    <label for="id">Id P. Fisica</label>
                	                    <input type="text" readonly class="form-control" id="id" name="id" readonly>
                        	        </div>
                                  <div class="input-group">
                                      <label for="nombre">Nombre</label>
                                      <input type="text" readonly class="form-control" id="nombre" name="nombre" > <!-- aria-describedby="sizing-addon2">-->
                                  </div>
	                        </div>
        	                <div class="modal-footer">
                	                <button id="delete-pfisica-select" name="delete-pfisica-select" type="submit" class="btn btn-primary">Aceptar</button>
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
                    <li><a class="navbar-brand" href="#"><img src="assets/img/logo_i.png" alt="logo_i" style="width:80px;higth:50px;"></a></li>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><img src="assets/img/logo_d.png" alt="logo_d" style="width:80px;higth:40px;"></a></li>
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
                        <li class="active"><a href="#">Pers.Fisicas <span class="sr-only">(current)</span></a></li>
                        <li><a href="pjuridicas.php">Pers.Juridicas</a></li>
                        <li><a href="profesionales.php">Profesionales</a></li>
                        <li><a href="inmuebles.php">Inmuebles</a></li>
                        <li><a href="mensuras.php">Planos Mensura</a></li>
                        <li><a href="phs.php">Planos PH</a></li>
                        <li><a href="planos_obra.php">Planos Obras</a></li>
                        <hr style="border-color: #337ab7;border-style: inset; border-width: 0.3px;"/>
                        <li><a href="propietarios.php" >Propietarios</a></li>
                        <li><a href="destinatarios_tasa.php" >Destinatarios</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Administrador de Entidades</h1>

                    <h2 class="sub-header">Personas Fisicas&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick='newCbProfesional()'>NUEVO</button></h2>

        <?php
            include 'database/DatabaseConnect.php';
	          include 'database/CbPFisicaController.php';

 	          $dConnect = new DatabaseConnect;
	          $cdb = $dConnect->dbConnectSimple();
	          $CbPFisicaController = new CbPFisicaController();
	          $CbPFisicaController->cdb = $cdb;

            if (isset($_POST["save-language"]) || isset($_POST["update-language"]) ) {
        	     $id = $_POST['id'];
        	     $nombre = $_POST['nombre'];
               $apellido = $_POST['apellido'];
               $tipo_doc = $_POST['tipo_doc'];
               $nro_doc = $_POST['nro_doc'];
               $domicilio = $_POST['domicilio'];
               $cuit = $_POST['cuit'];
        	if (isset($_POST["save-language"])){
        	    $CbPFisicaController->create($nombre,$apellido,$tipo_doc,$nro_doc,$domicilio,$cuit);
        	}else{
        	    $CbPFisicaController->update($id,$nombre,$apellido,$tipo_doc,$nro_doc,$domicilio,$cuit);
        	}
        }

	     if (isset($_POST["delete-pfisica-select"]) ) {
 	        $id = $_POST['id'];
          $fp = fopen("/tmp/logphp.txt", "w");
          fputs($fp, "Id = ".$id."\n");
          $fp = fclose($fp);
		      $CbPFisicaController->delete($id);
	     }

        ?>
	<!-- Añadimos un botón para el diálogo modal -->
         <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NOMBRE</th>
                                    <th>APELLIDO</th>
                                    <th>TIPO_DOC</th>
                                    <th>NRO_DOC</th>
                                    <th>DOMICILIO</th>
                                    <th>CUIT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form role="form" name="formListCbLanguage" method="post" action="index.php">
                                <?php
                                try {
                                    $rows = $CbPFisicaController->readAll();

                                    foreach ($rows as $row) {
                                ?>
                                        <tr>
                                            <td><?php print($row->id); ?></td>
                                            <td><?php print($row->nombre); ?></td>
                                            <td><?php print($row->apellido); ?></td>
                                            <td><?php print($row->tipo_doc); ?></td>
                                            <td><?php print($row->nro_doc); ?></td>
                                            <td><?php print($row->domicilio); ?></td>
                                            <td><?php print($row->cuit); ?></td>
                                            <td>
						<button id="see-language"
							name="see-language"
							type="button"
							class="btn btn-success"
							data-toggle="modal"
							data-target="#myModal"
							onclick="openCbPFisica('see',
								    '<?php print($row->id); ?>',
										'<?php print($row->nombre); ?>',
										'<?php print($row->apellido); ?>',
                    '<?php print($row->tipo_doc); ?>',
                    '<?php print($row->nro_doc); ?>',
                    '<?php print($row->domicilio); ?>',
                    '<?php print($row->cuit); ?>')">Ver</button>
					    </td>
					    <td>
						<button id="edit-language"
							name="edit-language"
							type="button"
						  class="btn btn-primary"
						  data-toggle="modal"
						  data-target="#myModalUpdate"
						  onclick="openEditPFisica('<?php print($row->id); ?>',
				           '<?php print($row->nombre); ?>',
                   '<?php print($row->apellido); ?>',
                   '<?php print($row->tipo_doc); ?>',
                   '<?php print($row->nro_doc); ?>',
                   '<?php print($row->domicilio); ?>',
									 '<?php print($row->cuit); ?>')">Editar</button>
					    </td>
				      <td>
					    	<button id="delete-language-modal"
							name="delete-language-modal"
							type="button"
			        class="btn btn-danger"
              data-toggle="modal"
			        data-target="#myModalDelete"
              onclick="deleteCbPFisica('<?php print($row->id); ?>','<?php print($row->nombre); ?>','<?php print($row->apellido); ?>')"
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
