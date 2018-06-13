/**
 * Abrimos la ventana modal para crear un nuevo elemento.
 * We open a modal window to create a new element.
 * @returns {undefined}
 */
function newCbPropietario(){
  document.formCreate.inmueble.value = null;
  document.formCreate.persona.value = null;
  document.formCreate.porcentaje.value = 0;
  document.formCreate.f_alta.value = null;
  document.formCreate.f_baja.value = null;
  var modal = $(this);
  modal.find('.modal-title').text('Creación de Registro');
}
/*------------PersonasFisicas---------------*/
 function openEditPropietario(id,persona,inmueble,porcentaje,f_alta,f_baja){
   document.formEdit.id.value = id;
   document.formEdit.persona.value = persona;
   document.formEdit.inmueble.value = inmueble;
   document.formEdit.porcentaje.value = porcentaje;
   document.formEdit.f_alta.value = f_alta;
   document.formEdit.f_baja.value = f_baja;
   $('#myModalUpdate').on('shown.bs.modal', function () {
     var modal = $(this);
     modal.find('.modal-title').text('Editar');
     $('#update-language').show();
   });
 }

/*function openCbPropietario(tipo,id,inmueble,pfisica,pjuridica,porcentaje,f_alta,f_baja){
    document.formCb.tipo.value = tipo;
    document.formCb.id.value = id;
    document.formCb.inmueble.value = inmueble;
    alert(tipo);
    if (tipo === 'F') {
      alert('tipo entro por F');
      document.formCb.persona.value = pfisica;
    }else{document.formCb.persona.value = pjuridica}
    document.formCb.porcentaje.value = porcentaje;
    document.formCb.f_alta.value = f_alta;
    document.formCb.f_baja.value = f_baja;
    var modal = $(this);
    modal.find('.modal-title').text('Actualizar Registro');
}*/

function openReadPropietario(inmueble,persona,porcentaje,f_alta,f_baja){
    document.formRead.inmueble.value = inmueble;
    document.formRead.persona.value = persona;
    document.formRead.porcentaje.value = porcentaje;
    document.formRead.f_alta.value = f_alta;
    document.formRead.f_baja.value = f_baja;

    document.formRead.inmueble.disabled = true;
    document.formRead.persona.disabled = true;
    document.formRead.porcentaje.disabled = true;
    document.formRead.f_alta.disabled = true;
    document.formRead.f_baja.disabled = true;

    $('#myModalRead').on('shown.bs.modal', function () {
        var modal = $(this);
        modal.find('.modal-title').text('Ver Registro');
        $('#save-language').hide();
        $('#update-language').hide();
    });
}

function deleteCbPropietario(id,inmueble,persona){
  document.formDeleteCb.id.value = id;
  document.formDeleteCb.inmueble.value = inmueble;
  document.formDeleteCb.persona.value = persona;

  $('#myModalDelete').on('shown.bs.modal', function () {
    $('#myInput').focus();
 });
}
