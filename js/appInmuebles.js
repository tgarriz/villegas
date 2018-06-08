/**
 * Abrimos la ventana modal para crear un nuevo elemento.
 * We open a modal window to create a new element.
 * @returns {undefined}
 */
function newCbInmueble(){
    openCbInmueble('new', null, null,null,null,null,null, null, null,null,null,null,null, null, null,null,null,null,null, null, null,null,null,null);
}
/*------------PersonasFisicas---------------*/
 function openEditInmueble(id,circ,secc,chac_n,chac_l,quin_n,quin_l,frac_n,frac_l,manz_n,manz_l,parc_n,parc_l,subp,superficie,nro_puerta,p_municipal,domicilio,tipo,uso,frente){
   alert(id);
   document.formEdit.id.value = id;
   document.formEdit.circ.value = circ;
   document.formEdit.secc.value = secc;
   document.formEdit.chac_n.value = chac_n;
   document.formEdit.chac_l.value = chac_l;
   document.formEdit.quin_n.value = quin_n;
   document.formEdit.quin_l.value = quin_l;
   document.formEdit.frac_n.value = frac_n;
   document.formEdit.frac_l.value = frac_l;
   document.formEdit.manz_n.value = manz_n;
   document.formEdit.manz_l.value = manz_l;
   document.formEdit.parc_n.value = parc_n;
   document.formEdit.parc_l.value = parc_l;
   document.formEdit.subp.value = subp;
   document.formEdit.superficie.value = superficie;
   document.formEdit.nro_puerta.value = nro_puerta;
   document.formEdit.p_municipal.value = p_municipal;
   document.formEdit.domicilio.value = domicilio;
   document.formEdit.tipo.value = tipo;
   document.formEdit.frente.value = frente;
   document.formEdit.uso.value = uso;
   $('#myModalUpdate').on('shown.bs.modal', function () {
     var modal = $(this);
     modal.find('.modal-title').text('Editar');
     $('#update-language').show();
   });
 }

function openCbInmueble(action, id,circ,secc,chac_n,chac_l,quin_n,quin_l,frac_n,frac_l,manz_n,manz_l,parc_n,parc_l,subp,superficie,nro_puerta,p_municipal,domicilio,tipo,uso,frente){
    document.formCbInmueble.id.value = id;
    document.formCbInmueble.circ.value = circ;
    document.formCbInmueble.secc.value = secc;
    document.formCbInmueble.chac_n.value = chac_n;
    document.formCbInmueble.chac_l.value = chac_l;
    document.formCbInmueble.quin_n.value = quin_n;
    document.formCbInmueble.quin_l.value = quin_l;
    document.formCbInmueble.frac_n.value = frac_n;
    document.formCbInmueble.frac_l.value = frac_l;
    document.formCbInmueble.manz_n.value = manz_n;
    document.formCbInmueble.manz_l.value = manz_l;
    document.formCbInmueble.parc_n.value = parc_n;
    document.formCbInmueble.parc_l.value = parc_l;
    document.formCbInmueble.subp.value = subp;
    document.formCbInmueble.superficie.value = superficie;
    document.formCbInmueble.nro_puerta.value = nro_puerta;
    document.formCbInmueble.p_municipal.value = p_municipal;
    document.formCbInmueble.domicilio.value = domicilio;
    document.formCbInmueble.tipo.value = tipo;
    document.formCbInmueble.frente.value = frente;
    document.formCbInmueble.uso.value = uso;

    document.formCbInmueble.id.disabled = (action === 'see')?true:false;
    document.formCbInmueble.circ.disabled = (action === 'see')?true:false;
    document.formCbInmueble.secc.disabled = (action === 'see')?true:false;
    document.formCbInmueble.chac_n.disabled = (action === 'see')?true:false;
    document.formCbInmueble.chac_l.disabled = (action === 'see')?true:false;
    document.formCbInmueble.quin_n.disabled = (action === 'see')?true:false;
    document.formCbInmueble.quin_l.disabled = (action === 'see')?true:false;
    document.formCbInmueble.frac_n.disabled = (action === 'see')?true:false;
    document.formCbInmueble.frac_l.disabled = (action === 'see')?true:false;
    document.formCbInmueble.manz_n.disabled = (action === 'see')?true:false;
    document.formCbInmueble.manz_l.disabled = (action === 'see')?true:false;
    document.formCbInmueble.parc_n.disabled = (action === 'see')?true:false;
    document.formCbInmueble.parc_l.disabled = (action === 'see')?true:false;
    document.formCbInmueble.subp.disabled = (action === 'see')?true:false;
    document.formCbInmueble.superficie.disabled = (action === 'see')?true:false;
    document.formCbInmueble.nro_puerta.disabled = (action === 'see')?true:false;
    document.formCbInmueble.p_municipal.disabled = (action === 'see')?true:false;
    document.formCbInmueble.domicilio.disabled = (action === 'see')?true:false;
    document.formCbInmueble.tipo.disabled = (action === 'see')?true:false;
    document.formCbInmueble.frente.disabled = (action === 'see')?true:false;
    document.formCbInmueble.uso.disabled = (action === 'see')?true:false;

    $('#myModalCreate').on('shown.bs.modal', function () {
        var modal = $(this);
        if (action === 'new'){
            document.formCbInmueble.id.disabled = true;
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

function openReadInmueble(circ,secc,chac_n,chac_l,quin_n,quin_l,frac_n,frac_l,manz_n,manz_l,parc_n,parc_l,subp,superficie,nro_puerta,p_municipal,domicilio,tipo,uso,frente){
    document.formRead.circ.value = circ;
    document.formRead.secc.value = secc;
    document.formRead.chac_n.value = chac_n;
    document.formRead.chac_l.value = chac_l;
    document.formRead.quin_n.value = quin_n;
    document.formRead.quin_l.value = quin_l;
    document.formRead.frac_n.value = frac_n;
    document.formRead.frac_l.value = frac_l;
    document.formRead.manz_n.value = manz_n;
    document.formRead.manz_l.value = manz_l;
    document.formRead.parc_n.value = parc_n;
    document.formRead.parc_l.value = parc_l;
    document.formRead.subp.value = subp;
    document.formRead.superficie.value = superficie;
    document.formRead.nro_puerta.value = nro_puerta;
    document.formRead.p_municipal.value = p_municipal;
    document.formRead.domicilio.value = domicilio;
    document.formRead.tipo.value = tipo;
    document.formRead.frente.value = frente;
    document.formRead.uso.value = uso;

    document.formRead.circ.disabled = true;
    document.formRead.secc.disabled = true;
    document.formRead.chac_n.disabled = true;
    document.formRead.chac_l.disabled = true;
    document.formRead.quin_n.disabled = true;
    document.formRead.quin_l.disabled = true;
    document.formRead.frac_n.disabled = true;
    document.formRead.frac_l.disabled = true;
    document.formRead.manz_n.disabled = true;
    document.formRead.manz_l.disabled = true;
    document.formRead.parc_n.disabled = true;
    document.formRead.parc_l.disabled = true;
    document.formRead.subp.disabled = true;
    document.formRead.superficie.disabled = true;
    document.formRead.nro_puerta.disabled = true;
    document.formRead.p_municipal.disabled = true;
    document.formRead.domicilio.disabled = true;
    document.formRead.tipo.disabled = true;
    document.formRead.frente.disabled = true;
    document.formRead.uso.disabled = true;

    $('#myModalRead').on('shown.bs.modal', function () {
        var modal = $(this);
        modal.find('.modal-title').text('Ver Registro');
        $('#save-language').hide();
        $('#update-language').hide();
    });
}

function deleteCbInmueble(id,nombre,apellido){
  document.formDeleteCbInmueble.id.value = id;
  document.formDeleteCbInmueble.nomencla.value = nomencla;
  document.formDeleteCbInmueble.p_municipal.value = p_municipal;
  //alert(id);
  $('#myModalDelete').on('shown.bs.modal', function () {
    $('#myInput').focus();
});
}
