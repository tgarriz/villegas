/**
 * Abrimos la ventana modal para crear un nuevo elemento.
 * We open a modal window to create a new element.
 * @returns {undefined}
 */
function newCbPm_inm(){
    openCb('new',null,null,null);
}
/*------------PersonasFisicas---------------*/
 function openEdit(id,plano,inmueble){
   document.formEdit.id.value = id;
   document.formEdit.plano.value = plano;
   document.formEdit.inmueble.value = inmueble;
   $('#myModalUpdate').on('shown.bs.modal', function () {
     var modal = $(this);
     modal.find('.modal-title').text('Editar Registro');
     $('#update-language').show();
   });
 }

function openCb(action,id, plano,inmuebles){
    document.formCb.id.value = id;
    document.formCb.plano.value = plano;
    document.formCb.inmuebles.value = inmuebles;

    document.formCb.plano.disabled = (action === 'see')?true:false;
    document.formCb.inmuebles.disabled = (action === 'see')?true:false;

    $('#myModal').on('shown.bs.modal', function () {
        var modal = $(this);
        if (action === 'new'){
            modal.find('.modal-title').text('Crear Registro');
            $('#save-language').show();
            $('#update-language').hide();
        }else if (action === 'see'){
            modal.find('.modal-title').text('Ver Registro');
            $('#save-language').hide();
            $('#update-language').hide();
        }
        $('#idlanguage').focus()

    });
}
function deleteCb(id,plano,inmueble){
  document.formDelete.id.value = id;
  document.formDelete.plano.value = plano;
  document.formDelete.inmueble.value = inmueble;
  //alert(id);
  $('#myModalDelete').on('shown.bs.modal', function () {
    $('#myInput').focus();
});
}
