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
        <link href="css/bootstrap-select.min.css" rel="stylesheet">
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
        <script src="js/bootstrap-select.min.js"></script>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <script src="assets/js/vendor/holder.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
        <script src="js/appPhs.js"></script>
    </head>

    <body>
      <?php
          include 'database/DatabaseConnect.php';
          include 'database/CbPhsController.php';
          $dConnect = new DatabaseConnect;
          $cdb = $dConnect->dbConnectSimple();
          $CbPhsController = new CbPhsController();
          $CbPhsController->cdb = $cdb;
     ?>
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
                            <form role="form" name="formEdit" method="post" action="phs.php">
                                <div class="modal-body">
                                  <input type="hidden" readonly class="form-control" id="id" name="id" >
                                  <div class="input-group col-xs-6 col-md-4">
                                    <label for="profesional">Profesional</label>
                                    <select class="form-control" id="profesional" name="profesional" required>
                                      <?php try {
                                            $rows = $CbPhsController->readProfesionales();
                                            foreach ($rows as $row) {
                                      ?>
                                            <option value='<?php print($row->id); ?>'><?php print($row->apellido); ?>,&nbsp;<?php print($row->nombre); ?></option>
                                    <?php
                                        }
                                    } catch (Exception $exception) {
                                        echo 'Error hacer la consulta profesionales: ' . $exception;
                                    }
                                    ?>
                                    </select>
                                  </div>
                                  <div class="input-group">
                                      <label for="objetos">Objetos</label>
                                      <select multiple class="form-control" id="a_objetos" name="a_objetos[]">
                                        <option>objetos1</option>
                                        <option>objetos2</option>
                                        <option>objetos3</option>
                                        <option>objetos4</option>
                                        <option>objetos5</option>
                                        <option>objetos6</option>
                                        <option>objetos7</option>
                                        <option>objetos8</option>
                                      </select>
                                  </div>
                                  <div class="input-group">
                                      <label for="secuencia">Secuencia</label>
                                      <input type="number" class="form-control" id="secuencia" name="secuencia" maxlength="10" >
                                  </div>
                                  <div class="input-group">
                                      <label for="anio">Año</label>
                                      <input type="number" class="form-control" id="anio" name="anio" maxlength="4" >
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
            Create
            Creamos una ventana Modal que utilizaremos para crear un nuevo idioma, actualizarlo o mostrarlo.
            We create a modal window used to create a new language, update or display.-->
                <div class="modal fade" id="myModalCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"></h4>
                            </div>
                            <form role="form" name="formCbPhs" method="post" action="phs.php">
                                <div class="modal-body">
                                  <div class="input-group col-xs-6 col-md-4">
                                    <label for="profesional">Profesional</label>
                                    <select class="form-control" id="profesional" name="profesional" required>
                                      <?php try {
                                            $rows = $CbPhsController->readProfesionales();
                                            foreach ($rows as $row) {
                                      ?>
                                            <option value='<?php print($row->id); ?>'><?php print($row->apellido); ?>,&nbsp;<?php print($row->nombre); ?></option>
                                    <?php
                                        }
                                    } catch (Exception $exception) {
                                        echo 'Error hacer la consulta profesionales: ' . $exception;
                                    }
                                    ?>
                                    </select>
                                  </div>
                                  <div class="input-group">
                                      <label for="objetos">Objetos</label>
                                      <select multiple class="form-control" id="a_objetos" name="a_objetos[]">
                                        <option>objetos1</option>
                                        <option>objetos2</option>
                                        <option>objetos3</option>
                                        <option>objetos4</option>
                                        <option>objetos5</option>
                                        <option>objetos6</option>
                                        <option>objetos7</option>
                                        <option>objetos8</option>
                                      </select>
                                  </div>
                                  <div class="input-group">
                                      <label for="secuencia">Secuencia</label>
                                      <input type="number" class="form-control" id="secuencia" name="secuencia" maxlength="10" >
                                  </div>
                                  <div class="input-group">
                                      <label for="anio">Año</label>
                                      <input type="number" class="form-control" id="anio" name="anio" maxlength="4" >
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
                                      <form role="form" name="formRead" method="post" action="phs.php">
                                          <div class="modal-body">
                                            <div class="input-group">
                                                <label for="profesional">Profesional</label>
                                                <input type="text" class="form-control" id="profesional" name="profesional" maxlength="60" readonly>
                                            </div>
                                            <div class="input-group">
                                                <label for="objetos">Objetos</label>
                                                <input type="textarea" class="form-control" id="objetos" name="objetos" maxlength="255" readonly>
                                            </div>
                                            <div class="input-group">
                                                <label for="secuencia">Secuencia</label>
                                                <input type="number" class="form-control" id="secuencia" name="secuencia" maxlength="10" readonly>
                                            </div>
                                            <div class="input-group">
                                                <label for="quin_n">Año</label>
                                                <input type="number" class="form-control" id="anio" name="anio" maxlength="4" readonly>
                                            </div>
                                            <div class="input-group">
                                                <label for="codigo">Codigo</label>
                                                <input type="text" class="form-control" id="codigo" name="codigo" maxlength="15" readonly>
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
	                        <h4 class="modal-title" id="myModalDeleteLabel">Eliminación de Registro</h4>
        	            </div>
                	    <form role="form" name="formDeleteCbPhs" method="post" action="phs.php">
                        	<div class="modal-body">
                                	<div class="input-group">
	                                    <label for="id">¿Se va a eliminar el registro seleccionado?</label>
        	                        </div>
               		                <div class="input-group">
         	                      	    <label for="id">Id</label>
                	                    <input type="text" readonly class="form-control" id="id" name="id" readonly>
                        	        </div>
                                  <div class="input-group">
                                      <label for="secuencia">Secuencia</label>
                                      <input type="text" readonly class="form-control" id="secuencia" name="secuencia" > <!-- aria-describedby="sizing-addon2">-->
                                  </div>
                                  <div class="input-group">
                                      <label for="anio">Ano</label>
                                      <input type="text" readonly class="form-control" id="anio" name="anio" > <!-- aria-describedby="sizing-addon2">-->
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
                        <li><a href="index.php">Pers.Fisicas</a></li>
                        <li><a href="pjuridicas.php">Pers.Juridicas</a></li>
                        <li><a href="profesionales.php">Profesionales</a></li>
                        <li><a href="inmuebles.php">Inmuebles</a></li>
                        <li><a href="mensuras.php">Planos Mensura</a></li>
                        <li class="active"><a href="#">Planos PH <span class="sr-only">(current)</span></a></li>
                        <li><a href="planos_obra.php">Planos Obras</a></li>
                        <hr style="border-color: #337ab7;border-style: inset; border-width: 0.3px;"/>
                        <li><a href="propietarios.php">Propietarios</a></li>
                        <li><a href="destinatarios_tasa.php">Destinatarios</a></li>
                        <li><a href="plano_m_inm.php" >Mens.-Inmuebles</a></li>
                        <li><a href="plano_o_inm.php" >Pl. de Obras.-Inmubles</a></li>
                        <li><a href="plano_ph_inm.php" >Pl. PH-Inmubles</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Administrador de Entidades</h1>

                    <h2 class="sub-header">Planos PH&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalCreate" onclick='newCbPhs()'>NUEVO</button></h2>

        <?php
            if (isset($_POST["save-language"]) || isset($_POST["update-language"]) ) {
               foreach ($_POST['a_objetos'] as $value) {
                  $objetos.= $value.", ";
               }
        	     $id = $_POST['id'];
        	     $profesional = $_POST['profesional'];
               $secuencia = $_POST['secuencia'];
               $anio = $_POST['anio'];
               $codigo = $_POST['codigo'];
        	if (isset($_POST["save-language"])){
        	    $CbPhsController->create($profesional,$objetos,$secuencia,$anio);
        	}else{
        	    $CbPhsController->update($id,$profesional,$objetos,$secuencia,$anio);
        	}
        }
	     if (isset($_POST["delete-select"]) ) {
 	        $id = $_POST['id'];
          $fp = fopen("/tmp/logphp.txt", "w");
          fputs($fp, "Id = ".$id."\n");
          $fp = fclose($fp);
		      $CbPhsController->delete($id);
	     }
        ?>
	<!-- Añadimos un botón para el diálogo modal -->
         <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>PROF.</th>
                                    <th>OBJETOS</th>
                                    <th>SECUENCIA</th>
                                    <th>ANO</th>
                                    <th>CODIGO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form role="form" name="formListCbLanguage" method="post" action="phs.php">
                                <?php
                                try {
                                    $rows = $CbPhsController->readAll();
                                    foreach ($rows as $row) {
                                ?>
                                        <tr>
                                            <td><?php print($row->id); ?></td>
                                            <td><?php print($row->profesional); ?></td>
                                            <td><?php print($row->objetos); ?></td>
                                            <td><?php print($row->secuencia); ?></td>
                                            <td><?php print($row->anio); ?></td>
                                            <td><?php print($row->codigo); ?></td>
                                            <td>
						<button id="see-language"
							name="see-language"
							type="button"
							class="btn btn-success"
							data-toggle="modal"
							data-target="#myModalRead"
							onclick="openReadPhs(
										'<?php print($row->profesional); ?>',
										'<?php print($row->objetos); ?>',
                    '<?php print($row->secuencia); ?>',
                    '<?php print($row->anio); ?>',
                    '<?php print($row->codigo); ?>')">Ver</button>
					    </td>
					    <td>
						<button id="edit-language"
							name="edit-language"
							type="button"
						  class="btn btn-primary"
						  data-toggle="modal"
						  data-target="#myModalUpdate"
						  onclick="openEditPhs('<?php print($row->id); ?>',
										'<?php print($row->profesional); ?>',
										'<?php print($row->objetos); ?>',
                    '<?php print($row->secuencia); ?>',
                    '<?php print($row->anio); ?>',
                    '<?php print($row->codigo); ?>')">Editar</button>
					    </td>
				      <td>
					    	<button id="delete-language-modal"
							name="delete-language-modal"
							type="button"
			        class="btn btn-danger"
              data-toggle="modal"
			        data-target="#myModalDelete"
              onclick="deleteCbPhs('<?php print($row->id); ?>','<?php print($row->secuencia); ?>','<?php print($row->anio); ?>')"
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
