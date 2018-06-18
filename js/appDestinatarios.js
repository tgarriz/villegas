/**
 * Abrimos la ventana modal para crear un nuevo elemento.
 * We open a modal window to create a new element.
 * @returns {undefined}
 */
function newCbDestinatario(){
  document.formCreate.inmueble.value = null;
  document.formCreate.persona.value = null;
  document.formCreate.domicilio.value = null;
  $('#myModalCreate').on('shown.bs.modal', function () {
  var modal = $(this);
  modal.find('.modal-title').text('Creación de Registro');
  $('#save-language').show();
  $('#update-language').hide();
});
}
/*------------PersonasFisicas---------------*/
 function openEditDestinatario(id,persona,inmueble,domicilio){
   document.formEdit.id.value = id;
   document.formEdit.inmueble.value = inmueble;
   document.formEdit.persona.value = persona;
   document.formEdit.domicilio.value = domicilio;
   $('#myModalUpdate').on('shown.bs.modal', function () {
     var modal = $(this);
     modal.find('.modal-title').text('Editar Destinatario');
     $('#save-language').hide();
     $('#update-language').show();
   });
 }

function openReadDestinatario(inmueble,persona,domicilio){
    document.formRead.inmueble.value = inmueble;
    document.formRead.persona.value = persona;
    document.formRead.domicilio.value = domicilio;

    document.formRead.inmueble.disabled = true;
    document.formRead.persona.disabled = true;
    document.formRead.domicilio.disabled = true;

    $('#myModalRead').on('shown.bs.modal', function () {
        var modal = $(this);
        modal.find('.modal-title').text('Ver Registro');
        //$('#save-language').hide();
        $('#update-language').hide();
    });
}

function deleteCbDestinatario(id,inmueble,persona){
  document.formDeleteCb.id.value = id;
  document.formDeleteCb.inmueble.value = inmueble;
  document.formDeleteCb.persona.value = persona;

  $('#myModalDelete').on('shown.bs.modal', function () {
    $('#myInput').focus();
 });
}
