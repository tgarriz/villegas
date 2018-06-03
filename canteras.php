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

        <title>CRUD - Minería</title>

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
	<?php
	 include 'database/DatabaseConnect.php';
         include 'database/CbCanteraController.php';
	 $dConnect = new DatabaseConnect;
         $cdb = $dConnect->dbConnectSimple();
         $CbCanteraController = new CbCanteraController();
         $CbCanteraController->cdb = $cdb;
	?>
      <!--
            Update
            Creamos una ventana Modal que utilizaremos para crear un nuevo idioma, actualizarlo o mostrarlo.
            We create a modal window used to create a new language, update or display.-->
                <div class="modal fade" id="myModalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabelUpdate">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"></h4>
                            </div>
                            <form role="form" name="formEdit" method="post" action="canteras.php">
                                <div class="modal-body">
                                  <div class="input-group">
                                      <label for="id">Id</label>
                                      <input type="text" readonly class="form-control" id="id" name="id">
                                      <!--<small class="text-muted">Lo utilizamos como ID y se forma con los iso de idioma (es) y país (ES) unidos por un guión bajo.</small>-->
                                  </div>
                                    <div class="input-group">
                                        <label for="partido">Partido</label>
                                        <input type="number" class="form-control" id="partido" name="partido" placeholder="partido" required> <!-- aria-describedby="sizing-addon2">-->
                                    </div>
                                    <div class="input-group">
                                        <label for="derecho">Derecho</label>
					<select class="form-control" data-style="btn-primary" id="derecho" name="derecho">
						<option value="null">Nulo</option>
                                          <?php
                                            try {
                                                    $rows = $CbCanteraController->listaDerechos();
                                                    foreach ($rows as $row) {
                                          ?>
                                               <option value="<?php print($row->codigo); ?>"><?php print($row->codigo); ?> - <?php print($row->descripcion); ?></option>
                                          <?php
                                                    }
                                            }  catch (Exception $exception) {
                                                        echo 'Error al traer listaDerechos: ' . $exception;
                                                }
                                          ?>
                                        </select>	
                                    </div>
                                    <div class="input-group">
                                        <label for="secuencia">Secuencia</label>
                                        <input type="number" class="form-control" id="secuencia" name="secuencia" placeholder="secuencia" required> <!-- aria-describedby="sizing-addon2">-->
                                    </div>
                                    <div class="input-group">
                                        <label for="caracteristica">Caracteristica</label>
                                        <input type="text" class="form-control" id="caracteristica" name="caracteristica" placeholder="caracteristica" maxlength="10" size="10"> <!-- aria-describedby="sizing-addon2">-->
                                    </div>
                                    <div class="input-group">
                                        <label for="expediente">Expediente</label>
                                        <input type="text" class="form-control" id="expediente" name="expediente" placeholder="expediente"  maxlength="10" size="10"> <!-- aria-describedby="sizing-addon2">-->
                                    </div>
                                    <div class="input-group">
                                        <label for="anio">Año</label>
                                        <input type="number" class="form-control" id="anio" name="anio" placeholder="anio"> <!-- aria-describedby="sizing-addon2">-->
                                    </div>
                                    <div class="input-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" maxlength="250"> <!-- aria-describedby="sizing-addon2">-->
                                    </div>
                                    <div class="input-group">
                                        <label for="mineral">Mineral</label>
					 <select class="form-control" data-style="btn-primary" id="mineral" name="mineral">
						<option value="null">Nulo</option>
                                          <?php
                                            try {
                                                    $rows = $CbCanteraController->listaMinerales();
                                                    foreach ($rows as $row) {
                                          ?>
                                               <option value="<?php print($row->id); ?>"><?php print($row->descripcion); ?></option>
                                          <?php
                                                    }
                                            }  catch (Exception $exception) {
                                                        echo 'Error al traer listaMinerales: ' . $exception;
                                                }
                                          ?>
                                        </select>

                                    </div>
                                    <div class="input-group">
                                        <label for="titular">Titular</label>
					<input type="text" class="form-control" id="titular" name="titular" placeholder="titular" maxlength="250">
				    </div>
                                    <div class="input-group">
                                        <label for="estado">Estado</label>
					 <select class="form-control" data-style="btn-primary" id="estado" name="estado">
						<option value="null">Nulo</option>
                                          <?php
                                            try {
                                                    $rows = $CbCanteraController->listaEstados();
                                                    foreach ($rows as $row) {
                                          ?>
                                               <option value="<?php print($row->id); ?>"><?php print($row->descripcion); ?></option>
                                          <?php
                                                    }
                                            }  catch (Exception $exception) {
                                                        echo 'Error al traer listaEstados: ' . $exception;
                                                }
                                          ?>
                                        </select>

                                    </div>
                                    <div class="input-group">
                                        <label for="productor">Productor</label>
					 <select class="form-control" data-style="btn-primary" id="productor" name="productor">
						<option value="null" >Nulo</option>
					  <?php
                                	    try {
		                                    $rows = $CbCanteraController->listaProductores();
	        	                            foreach ($rows as $row) {
        	        	          ?>
                                               <option value="<?php print($row->codigo); ?>"><?php print($row->nombre); ?></option>
					  <?php
						    }
					    }  catch (Exception $exception) {
                                    			echo 'Error al traer listaProductores: ' . $exception;
                                		}
					  ?>
					</select>
                                    </div>
                                    <div class="input-group">
                                        <label for="localidad">Localidad</label>
                                        <input type="text" class="form-control" id="localidad" name="localidad" placeholder="localidad" maxlength="250"> <!-- aria-describedby="sizing-addon2">-->
                                    </div>
                                    <div class="input-group">
                                        <label for="nomenclatura">Nomenclatura</label>
                                        <input type="text" class="form-control" id="nomenclatura" name="nomenclatura" placeholder="nomenclatura" maxlength="250"> <!-- aria-describedby="sizing-addon2">-->
                                    </div>
                                    <div class="input-group">
                                        <label for="reservas">Reservas</label>
                                        <input type="number" class="form-control" id="reservas" name="reservas" placeholder="reservas"> <!-- aria-describedby="sizing-addon2">-->
                                    </div>
                                    <div class="input-group">
                                        <label for="unidad">Unidad</label>
                                        <input type="text" class="form-control" id="unidad" name="unidad" placeholder="unidad" maxlength="3" size="3"> <!-- aria-describedby="sizing-addon2">-->
                                    </div>
                                    <div class="input-group">
                                        <label for="sector">Sector</label>
                                        <input type="number" class="form-control" id="sector" name="sector" placeholder="sector"> <!-- aria-describedby="sizing-addon2">-->
                                    </div>
                                </div>
                                <div class="modal-footer">
		                                <button id="update-language" name="update-language" type="submit" class="btn btn-primary">Actualizar</button>
                                    <button id="cancel"type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                </div>
                            </form>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
    	<!--
            Create
            Creamos una ventana Modal que utilizaremos para crear un nuevo idioma, actualizarlo o mostrarlo.
            We create a modal window used to create a new language, update or display.-->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"></h4>
                            </div>
                            <form role="form" name="formCbCantera" method="post" action="canteras.php">
                                <div class="modal-body">
                                  <div class="input-group">
                                      <label for="id">Id</label>
                                      <input type="text" readonly class="form-control" id="id" name="id">
                                      <!--<small class="text-muted">Lo utilizamos como ID y se forma con los iso de idioma (es) y país (ES) unidos por un guión bajo.</small>-->
                                  </div>
                                    <div class="input-group">
                                        <label for="partido">Partido</label>
                                        <input type="number" class="form-control" id="partido" name="partido" placeholder="partido" required> <!-- aria-describedby="sizing-addon2">-->
                                    </div>
                                    <div class="input-group">
                                        <label for="derecho">Derecho</label>
					 <label for="derecho">Derecho</label>
                                        <select class="form-control" data-style="btn-primary" id="derecho" name="derecho">
                                                <option value="null" selected>Nulo</option>
                                          <?php
                                            try {
                                                    $rows = $CbCanteraController->listaDerechos();
                                                    foreach ($rows as $row) {
                                          ?>
                                               <option value="<?php print($row->codigo); ?>"><?php print($row->codigo); ?> - <?php print($row->descripcion); ?></option>
                                          <?php
                                                    }
                                            }  catch (Exception $exception) {
                                                        echo 'Error al traer listaDerechos: ' . $exception;
                                                }
                                          ?>
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        <label for="secuencia">Secuencia</label>
                                        <input type="number" class="form-control" id="secuencia" name="secuencia" placeholder="secuencia" required> <!-- aria-describedby="sizing-addon2">-->
                                    </div>
                                    <div class="input-group">
                                        <label for="caracteristica">Caracteristica</label>
                                        <input type="text" class="form-control" id="caracteristica" name="caracteristica" placeholder="caracteristica" maxlength="10" size="10"> <!-- aria-describedby="sizing-addon2">-->
                                    </div>
                                    <div class="input-group">
                                        <label for="expediente">Expediente</label>
                                        <input type="text" class="form-control" id="expediente" name="expediente" placeholder="expediente" maxlength="10" size="10"> <!-- aria-describedby="sizing-addon2">-->
                                    </div>
                                    <div class="input-group">
                                        <label for="anio">Año</label>
                                        <input type="number" class="form-control" id="anio" value=2000 name="anio" placeholder="anio"> <!-- aria-describedby="sizing-addon2">-->
                                    </div>
                                    <div class="input-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" maxlength="250"> <!-- aria-describedby="sizing-addon2">-->
                                    </div>
                                    <div class="input-group">
                                        <label for="mineral">Mineral</label>
					 <select class="form-control" data-style="btn-primary" id="mineral" name="mineral">
						<option value="null" selected>Nulo</option>
                                          <?php
                                            try {
                                                    $rows = $CbCanteraController->listaMinerales();
                                                    foreach ($rows as $row) {
                                          ?>
                                               <option value="<?php print($row->id); ?>"><?php print($row->id); ?> - <?php print($row->descripcion); ?></option>
                                          <?php
                                                    }
                                            }  catch (Exception $exception) {
                                                        echo 'Error al traer listaMinerales: ' . $exception;
                                                }
                                          ?>
                                        </select>
				    </div>
                                    <div class="input-group">
                                        <label for="titular">Titular</label>
                                        <input type="text" class="form-control" id="titular" name="titular" placeholder="titular"> <!-- aria-describedby="sizing-addon2">-->
                                    </div>
                                    <div class="input-group">
                                        <label for="estado">Estado</label>
					 <select class="form-control" data-style="btn-primary" id="estado" name="estado">
						<option value="null" selected>Nulo</option>
                                          <?php
                                            try {
                                                    $rows = $CbCanteraController->listaEstados();
                                                    foreach ($rows as $row) {
                                          ?>
                                               <option value="<?php print($row->id); ?>"><?php print($row->id); ?> - <?php print($row->descripcion); ?></option>
                                          <?php
                                                    }
                                            }  catch (Exception $exception) {
                                                        echo 'Error al traer listaEstados: ' . $exception;
                                                }
                                          ?>
                                        </select>

                                    </div>
                                    <div class="input-group">
                                        <label for="productor">Productor</label>
					 <select class="form-control" data-style="btn-primary" id="productor" name="productor">
						<option value="null" selected>Nulo</option>
					  <?php
                                	    try {
		                                    $rows = $CbCanteraController->listaProductores();
	        	                            foreach ($rows as $row) {
        	        	          ?>
                                               <option value="<?php print($row->codigo); ?>"><?php print($row->nombre); ?></option>
					  <?php
						    }
					    }  catch (Exception $exception) {
                                    			echo 'Error al traer listaProductores: ' . $exception;
                                		}
					  ?>
					</select>
                                    </div>
                                    <div class="input-group">
                                        <label for="localidad">Localidad</label>
                                        <input type="text" class="form-control" id="localidad" name="localidad" placeholder="localidad" maxlength="250"> <!-- aria-describedby="sizing-addon2">-->
                                    </div>
                                    <div class="input-group">
                                        <label for="nomenclatura">Nomenclatura</label>
                                        <input type="text" class="form-control" id="nomenclatura" name="nomenclatura" placeholder="nomenclatura" maxlength="250"> <!-- aria-describedby="sizing-addon2">-->
                                    </div>
                                    <div class="input-group">
                                        <label for="reservas">Reservas</label>
                                        <input type="number" class="form-control" id="reservas" name="reservas" placeholder="reservas"> <!-- aria-describedby="sizing-addon2">-->
                                    </div>
                                    <div class="input-group">
                                        <label for="unidad">Unidad</label>
                                        <input type="text" class="form-control" id="unidad" name="unidad" placeholder="unidad" maxlength="3" size="3"> <!-- aria-describedby="sizing-addon2">-->
                                    </div>
                                    <div class="input-group">
                                        <label for="sector">Sector</label>
                                        <input type="number" class="form-control" id="sector" name="sector" placeholder="sector"> <!-- aria-describedby="sizing-addon2">-->
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

                <!--
                      Read
                      Creamos una ventana Modal que utilizaremos para crear un nuevo idioma, actualizarlo o mostrarlo.
                      We create a modal window used to create a new language, update or display.-->
                          <div class="modal fade" id="myModalRead" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                          <h4 class="modal-title" id="myModalLabel"></h4>
                                      </div>
                                      <form role="form" name="formCbCanteraRead" method="post" action="canteras.php">
                                          <div class="modal-body">
                                            <div class="input-group">
                                                <label for="id">Id</label>
                                                <input type="text" readonly class="form-control" id="id" name="id">
                                                <!--<small class="text-muted">Lo utilizamos como ID y se forma con los iso de idioma (es) y país (ES) unidos por un guión bajo.</small>-->
                                            </div>
                                              <div class="input-group">
                                                  <label for="codificacion">Codificacion</label>
                                                  <input type="text" class="form-control" id="codificacion" name="codificacion" placeholder="codificacion" >
                                                  <!--<small class="text-muted">Lo utilizamos como ID y se forma con los iso de idioma (es) y país (ES) unidos por un guión bajo.</small>-->
                                              </div>
                                              <div class="input-group">
                                                  <label for="partido">Partido</label>
                                                  <input type="text" class="form-control" id="partido" name="partido" placeholder="partido"> <!-- aria-describedby="sizing-addon2">-->
                                              </div>
                                              <div class="input-group">
                                                  <label for="derecho">Derecho</label>
                                                  <input type="text" class="form-control" id="derecho" name="derecho" placeholder="derecho"> <!-- aria-describedby="sizing-addon2">-->
                                              </div>
                                              <div class="input-group">
                                                  <label for="secuencia">Secuencia</label>
                                                  <input type="text" class="form-control" id="secuencia" name="secuencia" placeholder="secuencia"> <!-- aria-describedby="sizing-addon2">-->
                                              </div>
                                              <div class="input-group">
                                                  <label for="expte">Expte</label>
                                                  <input type="text" class="form-control" id="expte" name="expte" placeholder="expte"> <!-- aria-describedby="sizing-addon2">-->
                                              </div>
                                              <div class="input-group">
                                                  <label for="caracteristica">Caracteristica</label>
                                                  <input type="text" class="form-control" id="caracteristica" name="caracteristica" placeholder="caracteristica"> <!-- aria-describedby="sizing-addon2">-->
                                              </div>
                                              <div class="input-group">
                                                  <label for="expediente">Expediente</label>
                                                  <input type="text" class="form-control" id="expediente" name="expediente" placeholder="expediente"> <!-- aria-describedby="sizing-addon2">-->
                                              </div>
                                              <div class="input-group">
                                                  <label for="anio">Año</label>
                                                  <input type="text" class="form-control" id="anio" name="anio" placeholder="anio"> <!-- aria-describedby="sizing-addon2">-->
                                              </div>
                                              <div class="input-group">
                                                  <label for="nombre">Nombre</label>
                                                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre"> <!-- aria-describedby="sizing-addon2">-->
                                              </div>
                                              <div class="input-group">
                                                  <label for="mineral">Mineral</label>
                                                  <input type="text" class="form-control" id="mineral" name="mineral" placeholder="mineral"> <!-- aria-describedby="sizing-addon2">-->
                                              </div>
                                              <div class="input-group">
                                                  <label for="titular">Titular</label>
                                                  <input type="text" class="form-control" id="titular" name="titular" placeholder="titular"> <!-- aria-describedby="sizing-addon2">-->
                                              </div>
                                              <div class="input-group">
                                                  <label for="estado">Estado</label>
                                                  <input type="text" class="form-control" id="estado" name="estado" placeholder="estado"> <!-- aria-describedby="sizing-addon2">-->
                                              </div>
                                              <div class="input-group">
                                                  <label for="productor">Productor</label>
                                                  <input type="text" class="form-control" id="productor" name="productor" placeholder="productor"> <!-- aria-describedby="sizing-addon2">-->
                                              </div>
                                              <div class="input-group">
                                                  <label for="localidad">Localidad</label>
                                                  <input type="text" class="form-control" id="localidad" name="localidad" placeholder="localidad"> <!-- aria-describedby="sizing-addon2">-->
                                              </div>
                                              <div class="input-group">
                                                  <label for="nomenclatura">Nomenclatura</label>
                                                  <input type="text" class="form-control" id="nomenclatura" name="nomenclatura" placeholder="nomenclatura"> <!-- aria-describedby="sizing-addon2">-->
                                              </div>
                                              <div class="input-group">
                                                  <label for="reservas">Reservas</label>
                                                  <input type="text" class="form-control" id="reservas" name="reservas" placeholder="reservas"> <!-- aria-describedby="sizing-addon2">-->
                                              </div>
                                              <div class="input-group">
                                                  <label for="unidad">Unidad</label>
                                                  <input type="text" class="form-control" id="unidad" name="unidad" placeholder="unidad"> <!-- aria-describedby="sizing-addon2">-->
                                              </div>
                                              <div class="input-group">
                                                  <label for="sector">Sector</label>
                                                  <input type="text" class="form-control" id="sector" name="sector" placeholder="sector"> <!-- aria-describedby="sizing-addon2">-->
                                              </div>
                                          </div>
                                          <div class="modal-footer">
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
	                        <h4 class="modal-title" id="myModalDeleteLabel">Eliminación de Cantera</h4>
        	            </div>
                	    <form role="form" name="formDelete" method="post" action="canteras.php">
                        	<div class="modal-body">
                                	<div class="input-group">
	                                    <label for="id">¿Se va a eliminar el registro del cantera seleccionado?</label>
        	                        </div>
               		                <div class="input-group">
         	                      	    <label for="id">Id</label>
                	                    <input type="text" readonly class="form-control" id="id" name="id" readonly>
                        	        </div>
                                  <div class="input-group">
                                      <label for="codificacion">Codificacion</label>
                                      <input type="text" readonly class="form-control" id="codificacion" name="codificacion" > <!-- aria-describedby="sizing-addon2">-->
                                  </div>
                                  <div class="input-group">
                                      <label for="nombre">Nombre</label>
                                      <input type="text" readonly class="form-control" id="nombre" name="nombre" > <!-- aria-describedby="sizing-addon2">-->
                                  </div>
	                        </div>
        	                <div class="modal-footer">
                	                <button id="delete-select" name="delete-select" type="submit" class="btn btn-primary">Aceptar</button>
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
                        <li><a href="index.php">Productores</a></li>
                        <li><a href="minerales.php">Minerales</a></li>
                        <li><a href="derechos.php">Derechos</a></li>
	                <li><a href="estados.php">Estados</a></li>
	                <li class="active"><a href="canteras.php">Canteras<span class="sr-only">(current)</span></a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Administrador de Entidades</h1>

                    <h2 class="sub-header">Canteras</h2>

        <?php

            if (isset($_POST["save-language"]) || isset($_POST["update-language"]) ) {
        	     $id = $_POST['id'];
        	     $partido = $_POST['partido'];
	             $derecho = $_POST['derecho'];
        	     $secuencia = $_POST['secuencia'];
        	     $caracteristica = $_POST['caracteristica'];
        	     $expediente = $_POST['expediente'];
        	     $anio = $_POST['anio'];
	             $nombre = $_POST['nombre'];
        	     $mineral = $_POST['mineral'];
        	     $titular = $_POST['titular'];
        	     $estado = $_POST['estado'];
	             $productor = $_POST['productor'];
        	     $localidad = $_POST['localidad'];
	             $nomenclatura = $_POST['nomenclatura'];
        	     $reservas = $_POST['reservas'];
        	     $unidad = $_POST['unidad'];
        	     $sector = $_POST['sector'];
        	if (isset($_POST["save-language"])){
        	    $CbCanteraController->create($partido, $derecho, $secuencia, $caracteristica, $expediente, $anio,
                $nombre,$mineral,$titular,$estado,$productor,$localidad,$nomenclatura,$reservas,$unidad,$sector);
        	}else{
        	    $CbCanteraController->update($id,$partido, $derecho, $secuencia, $caracteristica, $expediente, $anio,
                $nombre,$mineral,$titular,$estado,$productor,$localidad,$nomenclatura,$reservas,$unidad,$sector);
        	}
        }

	     if (isset($_POST["delete-select"]) ) {
 	        $id = $_POST['id'];
	        $fp = fopen("/tmp/logphp.txt", "w");
        	fputs($fp, "Id = ".$id."\n");
	        $fp = fclose($fp);
		$CbCanteraController->delete($id);
	     }

        ?>
	<!-- Añadimos un botón para el diálogo modal -->
	<button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#myModal" onclick='newCbCantera()'>NUEVO</button>
         <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>CODIFICACION</th>
                                    <th>PARTIDO</th>
                                    <th>NOMBRE</th>
                                    <th>MINERAL</th>
                                    <th>LOCALIDAD</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form role="form" name="formListCbLanguage" method="post" action="canteras.php">
                                <?php
                                try {
                                    $rows = $CbCanteraController->readAll();

                                    foreach ($rows as $row) {
                                ?>
                                        <tr>
                                            <td><?php print($row->codificacion); ?></td>
                                            <td><?php print($row->partido); ?></td>
                                            <td><?php print($row->nombre); ?></td>
                                            <td><?php print($row->mineral); ?></td>
                                            <td><?php print($row->localidad); ?></td>
                                            <td>
						<button id="see-language"
							name="see-language"
							type="button"
							class="btn btn-success"
							data-toggle="modal"
							data-target="#myModalRead"
							onclick="openCbCanteraRead('see',
								    '<?php print($row->id); ?>',
										'<?php print($row->codificacion); ?>',
										'<?php print($row->partido); ?>',
								    '<?php print($row->derecho); ?>',
										'<?php print($row->secuencia); ?>',
										'<?php print($row->expte); ?>',
								    '<?php print($row->caracteristica); ?>',
										'<?php print($row->expediente); ?>',
										'<?php print($row->anio); ?>',
								    '<?php print($row->nombre); ?>',
										'<?php print($row->mineral); ?>',
										'<?php print($row->titular); ?>',
								    '<?php print($row->estado); ?>',
										'<?php print($row->productor); ?>',
										'<?php print($row->localidad); ?>',
								    '<?php print($row->nomenclatura); ?>',
								    '<?php print($row->reservas); ?>',
								    '<?php print($row->unidad); ?>',
								    '<?php print($row->sector); ?>')">Ver</button>
					    </td>
					    <td>
						  <button id="edit-language"
							 name="edit-language"
							 type="button"
						   class="btn btn-primary"
						   data-toggle="modal"
						   data-target="#myModalUpdate"
						   onclick="openEditCantera('<?php print($row->id); ?>',
               '<?php print($row->partido); ?>',
               '<?php print($row->derecho); ?>',
               '<?php print($row->secuencia); ?>',
               '<?php print($row->caracteristica); ?>',
               '<?php print($row->expediente); ?>',
               '<?php print($row->anio); ?>',
               '<?php print($row->nombre); ?>',
               '<?php print($row->mineral); ?>',
               '<?php print($row->titular); ?>',
               '<?php print($row->estado); ?>',
               '<?php print($row->productor); ?>',
               '<?php print($row->localidad); ?>',
               '<?php print($row->nomenclatura); ?>',
               '<?php print($row->reservas); ?>',
               '<?php print($row->unidad); ?>',
               '<?php print($row->sector); ?>')">Editar</button>
					    </td>
				      <td>
					  <button id="delete-language-modal"
						name="delete-language-modal"
						type="button"
						class="btn btn-danger"
						data-toggle="modal"
						data-target="#myModalDelete"
					  onclick="deleteCbCantera('<?php print($row->id); ?>',
						                         '<?php print($row->codificacion); ?>',
        	                           '<?php print($row->nombre); ?>')">Eliminar</button>
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
