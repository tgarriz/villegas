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
        <script src="js/appInmuebles.js"></script>
    </head>

    <body>
      <?php
          include 'database/DatabaseConnect.php';
          include 'database/CbInmuebleController.php';
          $dConnect = new DatabaseConnect;
          $cdb = $dConnect->dbConnectSimple();
          $CbInmuebleController = new CbInmuebleController();
          $CbInmuebleController->cdb = $cdb;
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
                            <form role="form" name="formEdit" method="post" action="inmuebles.php">
                                <div class="modal-body">
                                  <input type="hidden" readonly class="form-control" id="id" name="id" >
                                  <div class="input-group">
                                      <label for="circ">Circunscripcion</label>
                                      <input type="text" class="form-control" id="circ" name="circ" maxlength="4" required>
                                  </div>
                                  <div class="input-group">
                                      <label for="secc">Seccion</label>
                                      <input type="text" class="form-control" id="secc" name="secc" maxlength="4" >
                                  </div>
                                  <div class="input-group">
                                      <label for="chac_n">Chacra</label>
                                      <input type="number" class="form-control" id="chac_n" name="chac_n" maxlength="4" >
                                      <input type="text" class="form-control" id="chac_l" name="chac_l" maxlength="4" >
                                  </div>
                                  <div class="input-group">
                                      <label for="quin_n">Quinta</label>
                                      <input type="number" class="form-control" id="quin_n" name="quin_n" maxlength="4" >
                                      <input type="text" class="form-control" id="quin_l" name="quin_l" maxlength="4" >
                                  </div>
                                  <div class="input-group">
                                      <label for="frac_n">Fraccion</label>
                                      <input type="number" class="form-control" id="frac_n" name="frac_n" maxlength="4" >
                                      <input type="text" class="form-control" id="frac_l" name="frac_l" maxlength="4" >
                                  </div>
                                  <div class="input-group">
                                      <label for="manz_n">Manzana</label>
                                      <input type="number" class="form-control" id="manz_n" name="manz_n" maxlength="4" >
                                      <input type="text" class="form-control" id="manz_l" name="manz_l" maxlength="4" >
                                  </div>
                                  <div class="input-group">
                                      <label for="parc_n">Parcela</label>
                                      <input type="number" class="form-control" id="parc_n" name="parc_n" maxlength="4" >
                                      <input type="text" class="form-control" id="parc_l" name="parc_l" maxlength="4" readonl>
                                  </div>
                                  <div class="input-group">
                                      <label for="subp">Subparcela</label>
                                      <input type="text" class="form-control" id="subp" name="subp" maxlength="6" readonl>
                                  </div>
                                  <div class="input-group">
                                      <label for="superficie">Superficie</label>
                                      <input type="number" class="form-control" id="superficie" name="superficie" maxlength="10" required>
                                  </div>
                                  <div class="input-group">
                                      <label for="nro_puerta">Nro. Puerta</label>
                                      <input type="number" class="form-control" id="nro_puerta" name="nro_puerta" maxlength="10" >
                                  </div>
                                  <div class="input-group">
                                      <label for="p_municipal">Padron Municipal</label>
                                      <input type="number" class="form-control" id="p_municipal" name="p_municipal" maxlength="10" required>
                                  </div>
                                  <div class="input-group">
                                      <label for="domicilio">Domicilio</label>
                                      <input type="text" class="form-control" id="domicilio" name="domicilio" maxlength="10" >
                                  </div>
                                  <div class="input-group col-xs-2">
                                    <label for="tipo">Tipo</label>
                                    <select class="form-control" id="tipo" name="tipo" maxlength="12" required>
                                      <option value="PROV">PROVISORIO</option>
                                      <option value="DEF">DEFINITIVO</option>
                                    </select>
                                  </div>
                                <div class="input-group col-xs-6 col-md-4">
                                  <label for="uso">Uso</label>
                                  <select class="form-control" id="uso" name="uso" required>
                                    <?php try {
                                          $rows = $CbInmuebleController->readUsos();
                                          foreach ($rows as $row) {
                                    ?>
                                          <option value='<?php print($row->id); ?>'><?php print($row->descripcion); ?></option>
                                  <?php
                                      }
                                  } catch (Exception $exception) {
                                      echo 'Error hacer la consulta de usos: ' . $exception;
                                  }
                                  ?>
                                  </select>
                                </div>
                                <div class="input-group">
                                    <label for="frente">Mts de frente</label>
                                    <input type="number" class="form-control" id="frente" name="frente" maxlength="10" >
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
                            <form role="form" name="formCbInmueble" method="post" action="inmuebles.php">
                                <div class="modal-body">
                                  <!--<div class="input-group">
                                      <label for="id">Id</label>
                                      <input type="text" readolny class="form-control" id="id" name="id">
                                  </div>-->
                                  <input type="hidden" readonly class="form-control" id="id" name="id" >
                                  <div class="input-group">
                                      <label for="circ">Circunscripcion</label>
                                      <input type="text" class="form-control" id="circ" name="circ" maxlength="4" required>
                                  </div>
                                  <div class="input-group">
                                      <label for="secc">Seccion</label>
                                      <input type="text" class="form-control" id="secc" name="secc" maxlength="4">
                                  </div>
                                  <div class="input-group">
                                      <label for="chac_n">Chacra</label>
                                      <input type="number" class="form-control" id="chac_n" name="chac_n" maxlength="4" >
                                      <input type="text" class="form-control" id="chac_l" name="chac_l" maxlength="4" >
                                  </div>
                                  <div class="input-group">
                                      <label for="quin_n">Quinta</label>
                                      <input type="number" class="form-control" id="quin_n" name="quin_n" maxlength="4" >
                                      <input type="text" class="form-control" id="quin_l" name="quin_l" maxlength="4" >
                                  </div>
                                  <div class="input-group">
                                      <label for="frac_n">Fraccion</label>
                                      <input type="number" class="form-control" id="frac_n" name="frac_n" maxlength="4" >
                                      <input type="text" class="form-control" id="frac_l" name="frac_l" maxlength="4" >
                                  </div>
                                  <div class="input-group">
                                      <label for="manz_n">Manzana</label>
                                      <input type="number" class="form-control" id="manz_n" name="manz_n" maxlength="4" >
                                      <input type="text" class="form-control" id="manz_l" name="manz_l" maxlength="4" >
                                  </div>
                                  <div class="input-group">
                                      <label for="parc_n">Parcela</label>
                                      <input type="number" class="form-control" id="parc_n" name="parc_n" maxlength="4" required>
                                      <input type="text" class="form-control" id="parc_l" name="parc_l" maxlength="4" >
                                  </div>
                                  <div class="input-group">
                                      <label for="subp">Subparcela</label>
                                      <input type="text" class="form-control" id="subp" name="subp" maxlength="6" >
                                  </div>
                                  <div class="input-group">
                                      <label for="superficie">Superficie</label>
                                      <input type="number" class="form-control" id="superficie" name="superficie" maxlength="10" required>
                                  </div>
                                  <div class="input-group">
                                      <label for="nro_puerta">Nro. Puerta</label>
                                      <input type="number" class="form-control" id="nro_puerta" name="nro_puerta" maxlength="10" >
                                  </div>
                                  <div class="input-group">
                                      <label for="p_municipal">Padron Municipal</label>
                                      <input type="number" class="form-control" id="p_municipal" name="p_municipal" maxlength="10" required>
                                  </div>
                                  <div class="input-group">
                                      <label for="domicilio">Domicilio</label>
                                      <input type="text" class="form-control" id="domicilio" name="domicilio" maxlength="10" >
                                  </div>
                                  <div class="input-group col-xs-2">
                                    <label for="tipo">Tipo</label>
                                    <select class="form-control" id="tipo" name="tipo" maxlength="12" required>
                                      <option value="PROV">PROVISORIO</option>
                                      <option value="DEF">DEFINITIVO</option>
                                    </select>
                                  </div>
                                <div class="input-group col-xs-6 col-md-4">
                                  <label for="uso">Uso</label>
                                  <select class="form-control" id="uso" name="uso" required>
                                    <?php try {
                                          $rows = $CbInmuebleController->readUsos();
                                          foreach ($rows as $row) {
                                    ?>
                                          <option value='<?php print($row->id); ?>'><?php print($row->descripcion); ?></option>
                                  <?php
                                      }
                                  } catch (Exception $exception) {
                                      echo 'Error hacer la consulta de usos: ' . $exception;
                                  }
                                  ?>
                                  </select>
                                </div>
                                <div class="input-group">
                                    <label for="frente">Mts de frente</label>
                                    <input type="number" class="form-control" id="frente" name="frente" maxlength="10" value="0" >
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
                                      <form role="form" name="formRead" method="post" action="inmuebles.php">
                                          <div class="modal-body">
                                            <input type="hidden" readonly class="form-control" id="id" name="id" >
                                            <div class="input-group">
                                                <label for="circ">Circunscripcion</label>
                                                <input type="text" class="form-control" id="circ" name="circ" maxlength="4" readonly>
                                            </div>
                                            <div class="input-group">
                                                <label for="secc">Seccion</label>
                                                <input type="text" class="form-control" id="secc" name="secc" maxlength="4" readonly>
                                            </div>
                                            <div class="input-group">
                                                <label for="chac_n">Chacra</label>
                                                <input type="number" class="form-control" id="chac_n" name="chac_n" maxlength="4" readonly>
                                                <input type="text" class="form-control" id="chac_l" name="chac_l" maxlength="4" readonly>
                                            </div>
                                            <div class="input-group">
                                                <label for="quin_n">Quinta</label>
                                                <input type="number" class="form-control" id="quin_n" name="quin_n" maxlength="4" readonly>
                                                <input type="text" class="form-control" id="quin_l" name="quin_l" maxlength="4" readonly>
                                            </div>
                                            <div class="input-group">
                                                <label for="frac_n">Fraccion</label>
                                                <input type="number" class="form-control" id="frac_n" name="frac_n" maxlength="4" readonly>
                                                <input type="text" class="form-control" id="frac_l" name="frac_l" maxlength="4" readonly>
                                            </div>
                                            <div class="input-group">
                                                <label for="manz_n">Manzana</label>
                                                <input type="number" class="form-control" id="manz_n" name="manz_n" maxlength="4" readonly>
                                                <input type="text" class="form-control" id="manz_l" name="manz_l" maxlength="4" readonly>
                                            </div>
                                            <div class="input-group">
                                                <label for="parc_n">Parcela</label>
                                                <input type="number" class="form-control" id="parc_n" name="parc_n" maxlength="4" readonly>
                                                <input type="text" class="form-control" id="parc_l" name="parc_l" maxlength="4" readonly>
                                            </div>
                                            <div class="input-group">
                                                <label for="subp">Subparcela</label>
                                                <input type="text" class="form-control" id="subp" name="subp" maxlength="6" readonly>
                                            </div>
                                            <div class="input-group">
                                                <label for="superficie">Superficie</label>
                                                <input type="number" class="form-control" id="superficie" name="superficie" maxlength="10" readonly>
                                            </div>
                                            <div class="input-group">
                                                <label for="nro_puerta">Nro. Puerta</label>
                                                <input type="number" class="form-control" id="nro_puerta" name="nro_puerta" maxlength="10" readonly>
                                            </div>
                                            <div class="input-group">
                                                <label for="p_municipal">Padron Municipal</label>
                                                <input type="number" class="form-control" id="p_municipal" name="p_municipal" maxlength="10" readonly>
                                            </div>
                                            <div class="input-group">
                                                <label for="domicilio">Domicilio</label>
                                                <input type="text" class="form-control" id="domicilio" name="domicilio" maxlength="10" readonly>
                                            </div>
                                            <div class="input-group">
                                                <label for="tipo">Tipo</label>
                                                <input type="text" class="form-control" id="tipo" name="tipo" maxlength="10" readonly>
                                            </div>
                                            <div class="input-group">
                                                <label for="uso">Uso</label>
                                                <input type="text" class="form-control" id="uso" name="uso" maxlength="15" readonly>
                                            </div>
                                          <div class="input-group">
                                              <label for="frente">Mts de frente</label>
                                              <input type="number" class="form-control" id="frente" name="frente" maxlength="10" readonly>
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
                	    <form role="form" name="formDeleteCbInmueble" method="post" action="inmuebles.php">
                        	<div class="modal-body">
                                	<div class="input-group">
	                                    <label for="id">¿Se va a eliminar el registro seleccionado?</label>
        	                        </div>
               		                <div class="input-group">
         	                      	    <label for="id">Id Inmueble</label>
                	                    <input type="text" readonly class="form-control" id="id" name="id" readonly>
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
                        <li class="active"><a href="#">Inmuebles <span class="sr-only">(current)</span></a></li>
                        <li><a href="mensuras.php">Planos Mensura</a></li>
                        <li><a href="phs.php">Planos PH</a></li>
                        <li><a href="planos_obra.php">Planos Obras</a></li>
                        <li><a href="propietarios.php">Propietarios</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Administrador de Entidades</h1>

                    <h2 class="sub-header">Inmuebles&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalCreate" onclick='newCbInmueble()'>NUEVO</button></h2>

        <?php
            if (isset($_POST["save-language"]) || isset($_POST["update-language"]) ) {
        	     $id = $_POST['id'];
        	     $circ = $_POST['circ'];
               $secc = $_POST['secc'];
               $chac_n = $_POST['chac_n'];
               $chac_l = $_POST['chac_l'];
               $quin_n = $_POST['quin_n'];
               $quin_l = $_POST['quin_l'];
               $frac_n = $_POST['frac_n'];
               $frac_l = $_POST['frac_l'];
               $manz_n = $_POST['manz_n'];
               $manz_l = $_POST['manz_l'];
               $parc_n = $_POST['parc_n'];
               $parc_l = $_POST['parc_l'];
               $subp = $_POST['subp'];
               $superficie = $_POST['superficie'];
               $nro_puerta = $_POST['nro_puerta'];
               $p_municipal = $_POST['p_municipal'];
               $domicilio = $_POST['domicilio'];
               $tipo = $_POST['tipo'];
               $frente = $_POST['frente'];
               $uso = $_POST['uso'];
               $nomencla = $_POST['nomencla'];
               $nomencla_sp = $_POST['nomencla_sp'];
        	if (isset($_POST["save-language"])){
        	    $CbInmuebleController->create($circ,$secc,$chac_n,$chac_l,$quin_n,$quin_l,$frac_n,$frac_l,$manz_n,$manz_l,$parc_n,$parc_l,$subp,$superficie,$nro_puerta,$p_municipal,$domicilio,$tipo,$uso,$frente);
        	}else{
        	    $CbInmuebleController->update($id,$circ,$secc,$chac_n,$chac_l,$quin_n,$quin_l,$frac_n,$frac_l,$manz_n,$manz_l,$parc_n,$parc_l,$subp,$superficie,$nro_puerta,$p_municipal,$domicilio,$tipo,$uso,$frente);
        	}
        }
	     if (isset($_POST["delete-select"]) ) {
 	        $id = $_POST['id'];
          $fp = fopen("/tmp/logphp.txt", "w");
          fputs($fp, "Id = ".$id."\n");
          $fp = fclose($fp);
		      $CbInmuebleController->delete($id);
	     }
        ?>
	<!-- Añadimos un botón para el diálogo modal -->
         <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>CIRC.</th>
                                    <th>SECC.</th>
                                    <th>CHAC.</th>
                                    <th>QUIN.</th>
                                    <th>FRACC.</th>
                                    <th>MANZ.</th>
                                    <th>PARC.</th>
                                    <th>SUBPC.</th>
                                    <th>SUPERF.</th>
                                    <th>FRENT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form role="form" name="formListCbLanguage" method="post" action="inmuebles.php">
                                <?php
                                try {
                                    $rows = $CbInmuebleController->readAll();
                                    foreach ($rows as $row) {
                                ?>
                                        <tr>
                                            <td><?php print($row->id); ?></td>
                                            <td><?php print($row->circ); ?></td>
                                            <td><?php print($row->secc); ?></td>
                                            <td><?php print($row->chac_n); ?>&nbsp;<?php print($row->chac_l); ?></td>
                                            <td><?php print($row->quin_n); ?>&nbsp;<?php print($row->quin_l); ?></td>
                                            <td><?php print($row->frac_n); ?>&nbsp;<?php print($row->frac_l); ?></td>
                                            <td><?php print($row->manz_n); ?>&nbsp;<?php print($row->manz_l); ?></td>
                                            <td><?php print($row->parc_n); ?>&nbsp;<?php print($row->parc_l); ?></td>
                                            <td><?php print($row->subp); ?></td>
                                            <td><?php print($row->superficie); ?></td>
                                            <td><?php print($row->frente); ?></td>
                                            <td>
						<button id="see-language"
							name="see-language"
							type="button"
							class="btn btn-success"
							data-toggle="modal"
							data-target="#myModalRead"
							onclick="openReadInmueble(
										'<?php print($row->circ); ?>',
										'<?php print($row->secc); ?>',
                    '<?php print($row->chac_n); ?>',
                    '<?php print($row->chac_l); ?>',
                    '<?php print($row->quin_n); ?>',
                    '<?php print($row->quin_l); ?>',
                    '<?php print($row->frac_n); ?>',
                    '<?php print($row->frac_l); ?>',
                    '<?php print($row->manz_n); ?>',
                    '<?php print($row->manz_l); ?>',
                    '<?php print($row->parc_n); ?>',
                    '<?php print($row->parc_l); ?>',
                    '<?php print($row->subp); ?>',
                    '<?php print($row->superficie); ?>',
                    '<?php print($row->nro_puerta); ?>',
                    '<?php print($row->p_municipal); ?>',
                    '<?php print($row->domicilio); ?>',
                    '<?php print($row->tipo); ?>',
                    '<?php print($row->uso); ?>',
                    '<?php print($row->frente); ?>')">Ver</button>
					    </td>
					    <td>
						<button id="edit-language"
							name="edit-language"
							type="button"
						  class="btn btn-primary"
						  data-toggle="modal"
						  data-target="#myModalUpdate"
						  onclick="openEditInmueble('<?php print($row->id); ?>',
              '<?php print($row->circ); ?>',
              '<?php print($row->secc); ?>',
              '<?php print($row->chac_n); ?>',
              '<?php print($row->chac_l); ?>',
              '<?php print($row->quin_n); ?>',
              '<?php print($row->quin_l); ?>',
              '<?php print($row->frac_n); ?>',
              '<?php print($row->frac_l); ?>',
              '<?php print($row->manz_n); ?>',
              '<?php print($row->manz_l); ?>',
              '<?php print($row->parc_n); ?>',
              '<?php print($row->parc_l); ?>',
              '<?php print($row->subp); ?>',
              '<?php print($row->superficie); ?>',
              '<?php print($row->nro_puerta); ?>',
              '<?php print($row->p_municipal); ?>',
              '<?php print($row->domicilio); ?>',
              '<?php print($row->tipo); ?>',
              '<?php print($row->uso); ?>',
              '<?php print($row->frente); ?>')">Editar</button>
					    </td>
				      <td>
					    	<button id="delete-language-modal"
							name="delete-language-modal"
							type="button"
			        class="btn btn-danger"
              data-toggle="modal"
			        data-target="#myModalDelete"
              onclick="deleteCbInmueble('<?php print($row->id); ?>','<?php print($row->nomencla); ?>','<?php print($row->p_municipal); ?>')"
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
