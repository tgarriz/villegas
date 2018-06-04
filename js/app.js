/**
 * Abrimos la ventana modal para crear un nuevo elemento.
 * We open a modal window to create a new element.
 * @returns {undefined}
 */
function newCbPFisica(){
    openCbPFisica('new', null, null,null,null,null,null);
}

function newCbDerecho(){
    openCbDerecho('new', null, null, null);
}

function newCbMineral(){
    openCbMineral('new',null,null);
}

function newCbEstado(){
    openCbEstado('new',null,null);
}

function newCbCantera(){
    openCbCantera('new',null,null,null,null,null,null,0,null,null,null,null,null,null,null,0,null,null,null);
}
/**
 * Abrimos la ventana modal teniendo en cuenta la acción (action) para
 * utilizarla como creación (Create), lectura (Read) o actualización (Update).
 * We opened the modal window considering the action (action) to use
 * as creation (Create), reading (Read) or upgrade (Update).
 */

 function openEditCantera(id, partido, derecho, secuencia, caracteristica, expediente, anio,
   nombre,mineral,titular,estado,productor,localidad,nomenclatura,reservas,unidad,sector) {
   //alert('estoy en openEditCantera');
   document.formEdit.id.value = id;
   document.formEdit.partido.value = partido;
   document.formEdit.derecho.value = derecho;
   document.formEdit.secuencia.value = secuencia;
   document.formEdit.caracteristica.value = caracteristica;
   document.formEdit.expediente.value = expediente;
   document.formEdit.anio.value = anio;
   document.formEdit.nombre.value = nombre;
   document.formEdit.mineral.value = mineral;
   document.formEdit.titular.value = titular;
   document.formEdit.estado.value = estado;
   document.formEdit.productor.value = productor;
   document.formEdit.localidad.value = localidad;
   document.formEdit.nomenclatura.value = nomenclatura;
   document.formEdit.reservas.value = reservas;
   document.formEdit.unidad.value = unidad;
   document.formEdit.sector.value = sector;
   $('#myModalUpdate').on('shown.bs.modal', function () {
     var modal = $(this);
     modal.find('.modal-title').text('Editar Cantera');
     $('#update-language').show();
   });
 }

 function openCbCantera(action, id, partido, derecho, secuencia, caracteristica, expediente, anio,
   nombre,mineral,titular,estado,productor,localidad,nomenclatura,reservas,unidad,sector){
     //alert('estoy en openCbCantera')
     document.formCbCantera.id.value = id;
     document.formCbCantera.partido.value = partido;
     document.formCbCantera.derecho.value = derecho;
     document.formCbCantera.secuencia.value = secuencia;
     document.formCbCantera.caracteristica.value = caracteristica;
     document.formCbCantera.expediente.value = expediente;
     document.formCbCantera.anio.value = anio;
     document.formCbCantera.nombre.value = nombre;
     document.formCbCantera.mineral.value = mineral;
     document.formCbCantera.titular.value = titular;
     document.formCbCantera.estado.value = estado;
     document.formCbCantera.productor.value = productor;
     document.formCbCantera.localidad.value = localidad;
     document.formCbCantera.nomenclatura.value = nomenclatura;
     document.formCbCantera.reservas.value = reservas;
     document.formCbCantera.unidad.value = unidad;
     document.formCbCantera.sector.value = sector;

     $('#myModal').on('shown.bs.modal', function () {
         var modal = $(this);
         document.formCbCantera.id.disabled = true;
         modal.find('.modal-title').text('Creación de Cantera');
             //$('#save-language').show();
             //$('#update-language').hide()
         $('#idlanguage').focus()
     });
 }
 function openCbCanteraRead(action, id, codificacion, partido, derecho, secuencia, expte, caracteristica, expediente, anio,
   nombre,mineral,titular,estado,productor,localidad,nomenclatura,reservas,unidad,sector){
     //alert('estoy en openCbCanteraRead')
     document.formCbCanteraRead.id.value = id;
     document.formCbCanteraRead.codificacion.value = codificacion;
     document.formCbCanteraRead.partido.value = partido;
     document.formCbCanteraRead.secuencia.value = secuencia;
     document.formCbCanteraRead.derecho.value = derecho;
     document.formCbCanteraRead.expte.value = expte;
     document.formCbCanteraRead.caracteristica.value = caracteristica;
     document.formCbCanteraRead.expediente.value = expediente;
     document.formCbCanteraRead.anio.value = anio;
     document.formCbCanteraRead.nombre.value = nombre;
     document.formCbCanteraRead.mineral.value = mineral;
     document.formCbCanteraRead.titular.value = titular;
     document.formCbCanteraRead.estado.value = estado;
     document.formCbCanteraRead.productor.value = productor;
     document.formCbCanteraRead.localidad.value = localidad;
     document.formCbCanteraRead.nomenclatura.value = nomenclatura;
     document.formCbCanteraRead.reservas.value = reservas;
     document.formCbCanteraRead.unidad.value = unidad;
     document.formCbCanteraRead.sector.value = sector;

     document.formCbCanteraRead.codificacion.disabled = (action === 'see')?true:false;
     document.formCbCanteraRead.id.disabled = (action === 'see')?true:false;
     document.formCbCanteraRead.partido.disabled = (action === 'see')?true:false;
     document.formCbCanteraRead.derecho.disabled = (action === 'see')?true:false;
     document.formCbCanteraRead.secuencia.disabled = (action === 'see')?true:false;
     document.formCbCanteraRead.secuencia.disabled = (action === 'see')?true:false;
     document.formCbCanteraRead.caracteristica.disabled = (action === 'see')?true:false;
     document.formCbCanteraRead.expte.disabled = (action === 'see')?true:false;
     document.formCbCanteraRead.expediente.disabled = (action === 'see')?true:false;
     document.formCbCanteraRead.anio.disabled = (action === 'see')?true:false;
     document.formCbCanteraRead.nombre.disabled = (action === 'see')?true:false;
     document.formCbCanteraRead.mineral.disabled = (action === 'see')?true:false;
     document.formCbCanteraRead.titular.disabled = (action === 'see')?true:false;
     document.formCbCanteraRead.estado.disabled = (action === 'see')?true:false;
     document.formCbCanteraRead.productor.disabled = (action === 'see')?true:false;
     document.formCbCanteraRead.localidad.disabled = (action === 'see')?true:false;
     document.formCbCanteraRead.nomenclatura.disabled = (action === 'see')?true:false;
     document.formCbCanteraRead.reservas.disabled = (action === 'see')?true:false;
     document.formCbCanteraRead.unidad.disabled = (action === 'see')?true:false;
     document.formCbCanteraRead.sector.disabled = (action === 'see')?true:false;

     $('#myModalRead').on('shown.bs.modal', function () {
         var modal = $(this);
         modal.find('.modal-title').text('Ver Cantera');
        //$('#idlanguage').focus()

     });
 }
/*------------PersonasFisicas---------------*/
 function openEditPFisica(id,nombre,apellido,tipo_doc,nro_doc,domicilio,cuit){
   document.formEdit.id.value = id;
   document.formEdit.nombre.value = nombre;
   document.formEdit.apellido.value = apellido;
   document.formEdit.tipo_doc.value = tipo_doc;
   document.formEdit.nro_doc.value = nro_doc;
   document.formEdit.domicilio.value = domicilio;
   document.formEdit.cuit.value = cuit;
   $('#myModalUpdate').on('shown.bs.modal', function () {
     var modal = $(this);
     modal.find('.modal-title').text('Editar PersonaFisica ');
     $('#update-language').show();
   });
 }

function openCbPFisica(action, id, nombre,apellido,tipo_doc,nro_doc,domicilio,cuit){
    document.formCbPFisica.id.value = id;
    document.formCbPFisica.nombre.value = nombre;
    document.formCbPFisica.apellido.value = apellido;
    document.formCbPFisica.tipo_doc.value = tipo_doc;
    document.formCbPFisica.nro_doc.value = nro_doc;
    document.formCbPFisica.domicilio.value = domicilio;
    document.formCbPFisica.cuit.value = cuit;

    document.formCbPFisica.id.disabled = (action === 'see')?true:false;
    document.formCbPFisica.nombre.disabled = (action === 'see')?true:false;
    document.formCbPFisica.apellido.disabled = (action === 'see')?true:false;
    document.formCbPFisica.tipo_doc.disabled = (action === 'see')?true:false;
    document.formCbPFisica.nro_doc.disabled = (action === 'see')?true:false;
    document.formCbPFisica.domicilio.disabled = (action === 'see')?true:false;
    document.formCbPFisica.cuit.disabled = (action === 'see')?true:false;

    $('#myModal').on('shown.bs.modal', function () {
        var modal = $(this);
        if (action === 'new'){
            document.formCbPFisica.id.disabled = true;
            modal.find('.modal-title').text('Creación de Productor');
            $('#save-language').show();
            $('#update-language').hide();
        }else if (action === 'see'){
            modal.find('.modal-title').text('Ver Productor');
            $('#save-language').hide();
            $('#update-language').hide();
        }
        $('#idlanguage').focus()

    });
}

function openEditMineral(id, descripcion) {
  document.formEditMineral.id.value = id;
  document.formEditMineral.descripcion.value = descripcion;
  $('#myModalUpdate').on('shown.bs.modal', function () {
    var modal = $(this);
    modal.find('.modal-title').text('Editar Mineral');
    $('#update-language').show();
    //$('#idlanguage').focus();
  });
}

function openCbMineral(action, id, descripcion) {
    document.formCbMineral.id.value = id;
    document.formCbMineral.descripcion.value = descripcion;

    document.formCbMineral.id.disabled = (action === 'see')?true:false;
    document.formCbMineral.descripcion.disabled = (action === 'see')?true:false;

    $('#myModal').on('shown.bs.modal', function () {
        var modal = $(this);
        if (action === 'new'){
            document.formCbMineral.id.disabled = true;
            modal.find('.modal-title').text('Creación de Mineral');
            $('#save-language').show();
            $('#update-language').hide();
        }else if (action === 'see'){
            modal.find('.modal-title').text('Ver Mineral');
            $('#save-language').hide();
            $('#update-language').hide();
        }
        $('#idlanguage').focus()

    });
}

function openEditDerecho(id, codigo, descripcion) {
  document.formEdit.id.value = id;
  document.formEdit.codigo.value = codigo;
  document.formEdit.descripcion.value = descripcion;
  $('#myModalUpdate').on('shown.bs.modal', function () {
    var modal = $(this);
    modal.find('.modal-title').text('Editar Derecho');
    $('#update-language').show();
  });
}

function openCbDerecho(action, id, codigo, descripcion){
   document.formCbDerecho.id.value = id;
   document.formCbDerecho.codigo.value = codigo;
   document.formCbDerecho.descripcion.value = descripcion;

   document.formCbDerecho.id.disabled = (action === 'see')?true:false;
   document.formCbDerecho.codigo.disabled = (action === 'see')?true:false;
   document.formCbDerecho.descripcion.disabled = (action === 'see')?true:false;

   $('#myModal').on('shown.bs.modal', function () {
       var modal = $(this);
       if (action === 'new'){
           document.formCbDerecho.id.disabled = true;
           modal.find('.modal-title').text('Creación de Derecho');
           $('#save-language').show();
           $('#update-language').hide();
       }else if (action === 'see'){
           modal.find('.modal-title').text('Ver Derecho');
           $('#save-language').hide();
           $('#update-language').hide();
       }
       $('#idlanguage').focus()

   });
}

function openEditEstado(id, descripcion) {
  document.formEdit.id.value = id;
  document.formEdit.descripcion.value = descripcion;
  $('#myModalUpdate').on('shown.bs.modal', function () {
    var modal = $(this);
    modal.find('.modal-title').text('Editar Estado');
    $('#update-language').show();
    //$('#idlanguage').focus();
  });
}

function openCbEstado(action, id, descripcion) {
    document.formCbEstado.id.value = id;
    document.formCbEstado.descripcion.value = descripcion;

    document.formCbEstado.id.disabled = (action === 'see')?true:false;
    document.formCbEstado.descripcion.disabled = (action === 'see')?true:false;

    $('#myModal').on('shown.bs.modal', function () {
        var modal = $(this);
        if (action === 'new'){
            document.formCbEstado.id.disabled = true;
            modal.find('.modal-title').text('Creación de Estado');
            $('#save-language').show();
            $('#update-language').hide();
        }else if (action === 'see'){
            modal.find('.modal-title').text('Ver Estado');
            $('#save-language').hide();
            $('#update-language').hide();
        }
        $('#idlanguage').focus()

    });
}
/**
* Para borrar el idioma seleccionado abrimos una ventana modal para
* que el usuario confirme si quiere eliminar el registro.
* To delete the selected language we open a modal window for
* the user to confirm whether to delete the record.
* @param {type} idlanguage
* @returns {undefined}
*/
  function deleteCbCantera(id,codificacion,nombre){
    document.formDelete.id.value = id;
    document.formDelete.codificacion.value = codificacion;
    document.formDelete.nombre.value = nombre;
    $('#myModalDelete').on('shown.bs.modal', function () {
    $('#myInput').focus();
  });
}

function deleteCbPFisica(id,nombre,apellido){
  document.formDeleteCbPFisica.idproductordelete.value = id;
  document.formDeleteCbPFisica.nombre.value = nombre;
  document.formDeleteCbPFisica.apellido.value = apellido;
  //alert(id);
  $('#myModalDelete').on('shown.bs.modal', function () {
    $('#myInput').focus();
});
}

function deleteCbDerecho(id,codigo,descripcion){
  document.formDelete.id.value = id;
  document.formDelete.codigo.value = codigo;
  document.formDelete.descripcion.value = descripcion;
  $('#myModalDelete').on('shown.bs.modal', function () {
    $('#myInput').focus();
  });
}

function deleteCbMineral(id,descripcion){
    document.formDeleteCbMineral.idmineraldelete.value = id;
    document.formDeleteCbMineral.descripcion.value = descripcion;
    $('#myModalDelete').on('shown.bs.modal', function () {
      $('#myInput').focus();
    });
}

function deleteCbEstado(id,descripcion){
    document.formDelete.id.value = id;
    document.formDelete.descripcion.value = descripcion;
    $('#myModalDelete').on('shown.bs.modal', function () {
      $('#myInput').focus();
    });
}
