/**
 * Abrimos la ventana modal para crear un nuevo elemento.
 * We open a modal window to create a new element.
 * @returns {undefined}
 */
function newCbPhs(){
    openCbPhs('new', null, null,null,null);
}
/*------------PersonasFisicas---------------*/
 function openEditPhs(id,profesional,objetos,secuencia,anio){
   document.formEdit.id.value = id;
   document.formEdit.profesional.value = profesional;
   document.formEdit.a_objetos.value = objetos;
   document.formEdit.secuencia.value = secuencia;
   document.formEdit.anio.value = anio;
   $('#myModalUpdate').on('shown.bs.modal', function () {
     var modal = $(this);
     modal.find('.modal-title').text('Editar Registro');
     $('#update-language').show();
   });
 }

function openCbPhs(action, id,profesional,objetos,secuencia,anio){
    document.formCbPhs.id.value = id;
    document.formCbPhs.profesional.value = profesional;
    document.formCbPhs.a_objetos.value = objetos;
    document.formCbPhs.secuencia.value = secuencia;
    document.formCbPhs.anio.value = anio;

    document.formCbPhs.id.disabled = (action === 'see')?true:false;
    document.formCbPhs.profesional.disabled = (action === 'see')?true:false;
    document.formCbPhs.a_objetos.disabled = (action === 'see')?true:false;
    document.formCbPhs.secuencia.disabled = (action === 'see')?true:false;
    document.formCbPhs.anio.disabled = (action === 'see')?true:false;

    $('#myModalCreate').on('shown.bs.modal', function () {
        var modal = $(this);
        if (action === 'new'){
            document.formCbPhs.id.disabled = true;
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

function openReadPhs(profesional,objetos,secuencia,anio,codigo){
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

function deleteCbPhs(id,secuencia,anio){
  document.formDeleteCbPhs.id.value = id;
  document.formDeleteCbPhs.secuencia.value = secuencia;
  document.formDeleteCbPhs.anio.value = anio;

  $('#myModalDelete').on('shown.bs.modal', function () {
    $('#myInput').focus();
 });
}
