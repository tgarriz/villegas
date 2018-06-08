/**
 * Abrimos la ventana modal para crear un nuevo elemento.
 * We open a modal window to create a new element.
 * @returns {undefined}
 */
function newCbMensura(){
    openCbMensura('new', null, null,null,null);
}
/*------------PersonasFisicas---------------*/
 function openEditMensura(id,profesional,objetos,secuencia,anio){
   alert(id);
   document.formEdit.id.value = id;
   document.formEdit.profesional.value = profesional;
   document.formEdit.objetos.value = objetos;
   document.formEdit.secuencia.value = secuencia;
   document.formEdit.anio.value = anio;
   $('#myModalUpdate').on('shown.bs.modal', function () {
     var modal = $(this);
     modal.find('.modal-title').text('Editar');
     $('#update-language').show();
   });
 }

function openCbMensura(action, id,profesional,objetos,secuencia,anio){
    document.formCbMensura.id.value = id;
    document.formCbMensura.profesional.value = profesional;
    document.formCbMensura.objetos.value = objetos;
    document.formCbMensura.secuencia.value = secuencia;
    document.formCbMensura.anio.value = anio;

    document.formCbMensura.id.disabled = (action === 'see')?true:false;
    document.formCbMensura.profesional.disabled = (action === 'see')?true:false;
    document.formCbMensura.objetos.disabled = (action === 'see')?true:false;
    document.formCbMensura.secuencia.disabled = (action === 'see')?true:false;
    document.formCbMensura.anio.disabled = (action === 'see')?true:false;

    $('#myModalCreate').on('shown.bs.modal', function () {
        var modal = $(this);
        if (action === 'new'){
            document.formCbMensura.id.disabled = true;
            modal.find('.modal-title').text('Creación de Registro');
            $('#save-language').show();
            $('#update-language').hide();
        }else if (action === 'see'){
            modal.find('.modal-title').text('Ver Registro');
            $('#save-language').hide();
            $('#update-language').hide();
        }
    });
}

function openReadMensura(id,profesional,objetos,secuencia,anio,codigo){
    document.formRead.profesional.value = profesional;
    document.formRead.objetos.value = objetos;
    document.formRead.secuencia.value = secuencia;
    document.formRead.anio.value = anio;
    document.formRead.codigo.value = codigo;

    document.formRead.profesional.disabled = true;
    document.formRead.objetos.disabled = true;
    document.formRead.secuencia.disabled = true;
    document.formRead.anio.disabled = true;
    document.formRead.codigo.disabled = true;

    $('#myModalRead').on('shown.bs.modal', function () {
        var modal = $(this);
        modal.find('.modal-title').text('Ver Registro');
        $('#save-language').hide();
        $('#update-language').hide();
    });
}

function deleteCbMensura(id,secuencia,anio){
  document.formDeleteCbMensura.id.value = id;
  document.formDeleteCbMensura.secuencia.value = secuencia;
  document.formDeleteCbMensura.anio.value = anio;
  //alert(id);
  $('#myModalDelete').on('shown.bs.modal', function () {
    $('#myInput').focus();
 });
}
