/**
 * Abrimos la ventana modal para crear un nuevo elemento.
 * We open a modal window to create a new element.
 * @returns {undefined}
 */
function newCbProfesional(){
    openCbProfesional('new', null, null,null,null,null,null);
}
/*------------PersonasFisicas---------------*/
 function openEditProfesional(id,nombre,apellido,tipo_doc,nro_doc,domicilio,matricula,profesion,mail,celular,cuit){
   document.formEdit.id.value = id;
   document.formEdit.nombre.value = nombre;
   document.formEdit.apellido.value = apellido;
   document.formEdit.tipo_doc.value = tipo_doc;
   document.formEdit.nro_doc.value = nro_doc;
   document.formEdit.domicilio.value = domicilio;
   document.formEdit.matricula.value = matricula;
   document.formEdit.profesion.value = profesion;
   document.formEdit.mail.value = mail;
   document.formEdit.celular.value = celular;
   document.formEdit.cuit.value = cuit;
   $('#myModalUpdate').on('shown.bs.modal', function () {
     var modal = $(this);
     modal.find('.modal-title').text('Editar Profesional ');
     $('#update-language').show();
   });
 }

function openCbProfesional(action, id,nombre,apellido,tipo_doc,nro_doc,domicilio,matricula,profesion,mail,celular,cuit){
    document.formCbProfesional.nombre.value = nombre;
    document.formCbProfesional.id.value = id;
    document.formCbProfesional.apellido.value = apellido;
    document.formCbProfesional.tipo_doc.value = tipo_doc;
    document.formCbProfesional.nro_doc.value = nro_doc;
    document.formCbProfesional.domicilio.value = domicilio;
    document.formCbProfesional.matricula.value = matricula;
    document.formCbProfesional.profesion.value = profesion;
    document.formCbProfesional.mail.value = mail;
    document.formCbProfesional.celular.value = celular;
    document.formCbProfesional.cuit.value = cuit;

    document.formCbProfesional.id.disabled = (action === 'see')?true:false;
    document.formCbProfesional.nombre.disabled = (action === 'see')?true:false;
    document.formCbProfesional.apellido.disabled = (action === 'see')?true:false;
    document.formCbProfesional.tipo_doc.disabled = (action === 'see')?true:false;
    document.formCbProfesional.nro_doc.disabled = (action === 'see')?true:false;
    document.formCbProfesional.domicilio.disabled = (action === 'see')?true:false;
    document.formCbProfesional.matricula.disabled = (action === 'see')?true:false;
    document.formCbProfesional.profesion.disabled = (action === 'see')?true:false;
    document.formCbProfesional.mail.disabled = (action === 'see')?true:false;
    document.formCbProfesional.celular.disabled = (action === 'see')?true:false;
    document.formCbProfesional.cuit.disabled = (action === 'see')?true:false;

    $('#myModal').on('shown.bs.modal', function () {
        var modal = $(this);
        if (action === 'new'){
            document.formCbProfesional.id.disabled = true;
            modal.find('.modal-title').text('Creación de Profesional');
            $('#save-language').show();
            $('#update-language').hide();
        }else if (action === 'see'){
            modal.find('.modal-title').text('Ver Profesional');
            $('#save-language').hide();
            $('#update-language').hide();
        }
        $('#idlanguage').focus()

    });
}
function deleteCbProfesional(id,nombre,apellido){
  document.formDeleteCbProfesional.id.value = id;
  document.formDeleteCbProfesional.nombre.value = nombre;
  document.formDeleteCbProfesional.apellido.value = apellido;
  //alert(id);
  $('#myModalDelete').on('shown.bs.modal', function () {
    $('#myInput').focus();
});
}
