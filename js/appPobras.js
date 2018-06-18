/**
 * Abrimos la ventana modal para crear un nuevo elemento.
 * We open a modal window to create a new element.
 * @returns {undefined}
 */
function newCbPObra(){
    openCbPObra('new',null,null,null,null,null,null);
}
/*------------PersonasFisicas---------------*/
 function openEditPObra(id,profesional,sup_cubierta,sup_semicub,sup_demoler,secuencia,anio){
   document.formEdit.id.value = id;
   document.formEdit.profesional.value = profesional;
   document.formEdit.sup_cubierta.value = sup_cubierta;
   document.formEdit.sup_semicub.value = sup_semicub;
   document.formEdit.sup_demoler.value = sup_demoler;
   document.formEdit.secuencia.value = secuencia;
   document.formEdit.anio.value = anio;
   $('#myModalUpdate').on('shown.bs.modal', function () {
     var modal = $(this);
     modal.find('.modal-title').text('Editar Plano de Obra ');
     $('#update-language').show();
   });
 }

function openCbPObra(action,profesional,sup_cubierta,sup_semicub,sup_demoler,secuencia,anio){
    document.formCbPObra.profesional.value = profesional;
    document.formCbPObra.sup_cubierta.value = sup_cubierta;
    document.formCbPObra.sup_semicub.value = sup_semicub;
    document.formCbPObra.sup_demoler.value = sup_demoler;
    document.formCbPObra.secuencia.value = secuencia;
    document.formCbPObra.anio.value = anio;

    document.formCbPObra.profesional.disabled = false;
    document.formCbPObra.sup_cubierta.disabled = false;
    document.formCbPObra.sup_semicub.disabled = false;
    document.formCbPObra.sup_demoler.disabled = false;
    document.formCbPObra.secuencia.disabled = false;
    document.formCbPObra.anio.disabled = false;

    $('#myModal').on('shown.bs.modal', function () {
          var modal = $(this);
          document.formCbPObra.id.disabled = true;
          $('#save-language').show();
          $('#update-language').hide();
          $('#idlanguage').focus();
      })
    }

function openSeePObra(profesional,sup_cubierta,sup_semicub,sup_demoler,codigo){

    document.formSeePObra.profesional.value = profesional;
    document.formSeePObra.sup_cubierta.value = sup_cubierta;
    document.formSeePObra.sup_semicub.value = sup_semicub;
    document.formSeePObra.sup_demoler.value = sup_demoler;
    document.formSeePObra.codigo.value = codigo;

    document.formSeePObra.profesional.disabled = true;
    document.formSeePObra.sup_cubierta.disabled = true;
    document.formSeePObra.sup_semicub.disabled = true;
    document.formSeePObra.sup_demoler.disabled = true;
    document.formSeePObra.codigo.disabled = true;

      $('#myModalRead').on('shown.bs.modal', function () {
          $('#myModalRead').find('.modal-title').text('Ver Registro ');
          $('#save-language').hide();
          $('#update-language').hide();
          $('#idlanguage').focus();
        })
    }

function deleteCbPObra(id,codigo){
  document.formDeleteCbPObra.id.value = id;
  document.formDeleteCbPObra.codigo.value = codigo;
  $('#myModalDelete').on('shown.bs.modal', function () {
    $('#myInput').focus();
});
}
