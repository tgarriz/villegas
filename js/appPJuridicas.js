/**
 * Abrimos la ventana modal para crear un nuevo elemento.
 * We open a modal window to create a new element.
 * @returns {undefined}
 */
function newCbPJuridica(){
    openCbPJuridica('new', null, null,null,null);
}
/*------------PersonasJuridicas---------------*/
 function openEditPJuridica(id,rsocial,domicilio,cuit){
   document.formEdit.id.value = id;
   document.formEdit.rsocial.value = rsocial;
   document.formEdit.domicilio.value = domicilio;
   document.formEdit.cuit.value = cuit;
   $('#myModalUpdate').on('shown.bs.modal', function () {
     var modal = $(this);
     modal.find('.modal-title').text('Editar Pers.Juridica ');
     $('#update-language').show();
   });
 }

function openCbPJuridica(action,id,rsocial,domicilio,cuit){
    document.formCbPJuridica.id.value = id;
    document.formCbPJuridica.rsocial.value = rsocial;
    document.formCbPJuridica.domicilio.value = domicilio;
    document.formCbPJuridica.cuit.value = cuit;

    document.formCbPJuridica.id.disabled = (action === 'see')?true:false;
    document.formCbPJuridica.rsocial.disabled = (action === 'see')?true:false;
    document.formCbPJuridica.domicilio.disabled = (action === 'see')?true:false;
    document.formCbPJuridica.cuit.disabled = (action === 'see')?true:false;

    $('#myModal').on('shown.bs.modal', function () {
        var modal = $(this);
        if (action === 'new'){
            document.formCbPJuridica.id.disabled = true;
            modal.find('.modal-title').text('Creación de Pers.Juridica');
            $('#save-language').show();
            $('#update-language').hide();
        }else if (action === 'see'){
            modal.find('.modal-title').text('Ver Pers.Juridica');
            $('#save-language').hide();
            $('#update-language').hide();
        }
        $('#idlanguage').focus()
    });
}
function deleteCbPJuridica(id,rsocial,cuit){
  document.formDeleteCbPJuridica.id.value = id;
  document.formDeleteCbPJuridica.rsocial.value = rsocial;
  $('#myModalDelete').on('shown.bs.modal', function () {
    $('#myInput').focus();
});
}
