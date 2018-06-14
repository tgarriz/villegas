/**
 * Abrimos la ventana modal para crear un nuevo elemento.
 * We open a modal window to create a new element.
 * @returns {undefined}
 */
function newCbPFisica(){
    openCbPFisica('new', null, null,null,null,null,null);
}
/*------------PersonasFisicas---------------*/
 function openEditPFisica(id,nombre,apellido,tipo_doc,nro_doc,domicilio,cuit){
   document.formEdit.id.value = id;
   document.formCbPFisica.id.disabled = true;
   document.formEdit.nombre.value = nombre;
   document.formEdit.apellido.value = apellido;
   document.formEdit.tipo_doc.value = tipo_doc;
   document.formEdit.nro_doc.value = nro_doc;
   document.formEdit.domicilio.value = domicilio;
   document.formEdit.cuit.value = cuit;
   $('#myModalUpdate').on('shown.bs.modal', function () {
     var modal = $(this);
     modal.find('.modal-title').text('Editar Pers.Fisica ');
     $('#update-language').show();
   });
 }

function openCbPFisica(action, id, nombre,apellido,tipo_doc,nro_doc,domicilio,cuit){
    document.formCbPFisica.id.value = id;
    document.formCbPFisica.nombre.value = nombre;
    document.formCbPFisica.apellido.value = apellido;
    document.formCbPFisica.tipo_doc.value = tipo_doc;
    document.formCbPFisica.nro_doc.value = nro_doc;
    document.formCbPFisica.domicilio.value = domicilio;
    document.formCbPFisica.cuit.value = cuit;

    document.formCbPFisica.id.disabled = true;
    document.formCbPFisica.nombre.disabled = (action === 'see')?true:false;
    document.formCbPFisica.apellido.disabled = (action === 'see')?true:false;
    document.formCbPFisica.tipo_doc.disabled = (action === 'see')?true:false;
    document.formCbPFisica.nro_doc.disabled = (action === 'see')?true:false;
    document.formCbPFisica.domicilio.disabled = (action === 'see')?true:false;
    document.formCbPFisica.cuit.disabled = (action === 'see')?true:false;

    $('#myModal').on('shown.bs.modal', function () {
        var modal = $(this);
        if (action === 'new'){
            document.formCbPFisica.id.disabled = true;
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
function deleteCbPFisica(id,nombre,apellido){
  document.formDeleteCbPFisica.id.value = id;
  document.formDeleteCbPFisica.nombre.value = nombre;
  document.formDeleteCbPFisica.apellido.value = apellido;
  //alert(id);
  $('#myModalDelete').on('shown.bs.modal', function () {
    $('#myInput').focus();
});
}
