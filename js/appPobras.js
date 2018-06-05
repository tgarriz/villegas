/**
 * Abrimos la ventana modal para crear un nuevo elemento.
 * We open a modal window to create a new element.
 * @returns {undefined}
 */
function newCbPObra(){
    openCbPObra('new', null, null,null,null,null,null);
}
/*------------PersonasFisicas---------------*/
 function openEditPObra(id,profesional,sup_cubierta,sup_semicub,sup_demoler,codigo){
   document.formEdit.id.value = id;
   document.formEdit.profesional.value = profesional;
   document.formEdit.sup_cubierta.value = sup_cubierta;
   document.formEdit.sup_semicub.value = sup_semicub;
   document.formEdit.sup_demoler.value = sup_demoler;
   document.formEdit.codigo.value = codigo;
   $('#myModalUpdate').on('shown.bs.modal', function () {
     var modal = $(this);
     modal.find('.modal-title').text('Editar PObra ');
     $('#update-language').show();
   });
 }

function openCbPObra(action, id,profesional,sup_cubierta,sup_semicub,sup_demoler,codigo){
    document.formCbPObra.id.value = id;
    document.formCbPObra.profesional.value = profesional;
    document.formCbPObra.sup_cubierta.value = sup_cubierta;
    document.formCbPObra.sup_semicub.value = sup_semicub;
    document.formCbPObra.sup_demoler.value = sup_demoler;
    document.formCbPObra.codigo.value = codigo;

    document.formCbPObra.id.disabled = true;
    document.formCbPObra.profesional.disabled = (action === 'see')?true:false;
    document.formCbPObra.sup_cubierta.disabled = (action === 'see')?true:false;
    document.formCbPObra.sup_semicub.disabled = (action === 'see')?true:false;
    document.formCbPObra.sup_demoler.disabled = (action === 'see')?true:false;
    document.formCbPObra.codigo.disabled = (action === 'see')?true:false;

    $('#myModal').on('shown.bs.modal', function () {
        var modal = $(this);
        if (action === 'new'){
            document.formCbPObra.id.disabled = true;
            modal.find('.modal-title').text('Creación de Plano de Obra');
            $('#save-language').show();
            $('#update-language').hide();
        }else if (action === 'see'){
            modal.find('.modal-title').text('Ver Plano de Obra');
            $('#save-language').hide();
            $('#update-language').hide();
        }
        $('#idlanguage').focus()
    });
}
function deleteCbPObra(id,codigo){
  document.formDeleteCbPObra.id.value = id;
  document.formDeleteCbPObra.codigo.value = codigo;
  //alert(id);
  $('#myModalDelete').on('shown.bs.modal', function () {
    $('#myInput').focus();
});
}
