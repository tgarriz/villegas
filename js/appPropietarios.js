/**
 * Abrimos la ventana modal para crear un nuevo elemento.
 * We open a modal window to create a new element.
 * @returns {undefined}
 */
function newCbPropietario(){
    openCbPhs('new', null, null,null,null,null,null);
}
/*------------PersonasFisicas---------------*/
 function openEditPropietario(tipo,id,inmueble,persona,porcentaje,f_alta,f_baja){
   document.formEdit.tipo.value = tipo;
   document.formEdit.id.value = id;
   document.formEdit.inmueble.value = inmueble;
   document.formEdit.persona.value = persona;
   document.formEdit.porcentaje.value = porcentaje;
   document.formEdit.f_alta.value = f_alta;
   document.formEdit.f_baja.value = f_baja;
   $('#myModalUpdate').on('shown.bs.modal', function () {
     var modal = $(this);
     modal.find('.modal-title').text('Editar');
     $('#update-language').show();
   });
 }

function openCbPropietario(tipo,id,inmueble,pfisica,pjuridica,porcentaje,f_alta,f_baja){
    document.formCb.tipo.value = tipo;
    document.formCb.id.value = id;
    document.formCb.inmueble.value = inmueble;
    if (top === 'F') {
      document.formCb.persona.value = pfisica;
    }else{document.formCb.persona.value = pjuridica}
    document.formCb.porcentaje.value = porcentaje;
    document.formCb.f_alta.value = f_alta;
    document.formCb.f_baja.value = f_baja;

    document.formCb.tipo.disabled = (action === 'see')?true:false;
    document.formCb.id.disabled = (action === 'see')?true:false;
    document.formCb.inmueble.disabled = (action === 'see')?true:false;
    document.formCb.persona.disabled = (action === 'see')?true:false;
    document.formCb.porcentaje.disabled = (action === 'see')?true:false;
    document.formCb.f_alta.disabled = (action === 'see')?true:false;
    document.formCb.f_baja.disabled = (action === 'see')?true:false;

    $('#myModalCreate').on('shown.bs.modal', function () {
        var modal = $(this);
        if (action === 'new'){
            document.formCbPropietario.id.disabled = true;
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

function deleteCbPhs(id,inmueble,persona){
  document.formDeleteCb.id.value = id;
  document.formDeleteCb.inmueble.value = inmueble;
  document.formDeleteCb.persona.value = persona;

  $('#myModalDelete').on('shown.bs.modal', function () {
    $('#myInput').focus();
 });
}
