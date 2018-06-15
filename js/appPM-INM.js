/**
 * Abrimos la ventana modal para crear un nuevo elemento.
 * We open a modal window to create a new element.
 * @returns {undefined}
 */
function newCbPm_inm(){
    openCb('new',null,null,null);
}
/*------------PersonasFisicas---------------*/
 function openEditPm_inm(id,plano,inmueble){
   document.formEdit.id.value = id;
   document.formEdit.plano.value = plano;
   document.formEdit.inmueble.value = inmueble;
   $('#myModalUpdate').on('shown.bs.modal', function () {
     var modal = $(this);
     modal.find('.modal-title').text('Editar Pers.Fisica ');
     $('#update-language').show();
   });
 }

function openCb(action, plano,inmueble){
    document.formCb.id.value = id;
    document.formCb.plano.value = plano;
    document.formCb.inmueble.value = inmueble;

    document.formCb.plano.disabled = (action === 'see')?true:false;
    document.formCb.inmueble.disabled = (action === 'see')?true:false;

    $('#myModal').on('shown.bs.modal', function () {
        var modal = $(this);
        if (action === 'new'){
            modal.find('.modal-title').text('Creación de Pers.Fisica');
            $('#save-language').show();
            $('#update-language').hide();
        }else if (action === 'see'){
            modal.find('.modal-title').text('Ver Pers.Fisica');
            $('#save-language').hide();
            $('#update-language').hide();
        }
        $('#idlanguage').focus()

    });
}
function deleteCb(id,plano,inmueble){
  document.formDeleteCb.id.value = id;
  document.formDeleteCb.plano.value = plano;
  document.formDeleteCb.inmueble.value = inmueble;
  //alert(id);
  $('#myModalDelete').on('shown.bs.modal', function () {
    $('#myInput').focus();
});
}
