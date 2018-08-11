function bindCboRoles(idCbo, idRol){
   $(idCbo).removeClass('edited');
   $(idCbo).find('option').remove();

   let fnBeforeSend = () => {
   };

   let fnSuccess = (data) => {
      $(idCbo).addClass('edited');
      $.each(data,function(i , val){
         $(idCbo).append($('<option>').text(val.name).attr('value', val.id_Rol));
      });

      if (idRol) {
         $(idCbo).val(idRol);
      }
   }

   let fnError = (data) => {
      $.bootstrapGrowl("Error: roles no cargados.", {
         ele: 'body', // which element to append to
         type: 'danger', // (null, 'info', 'danger', 'success')
         offset: {from: 'top', amount: 20}, // 'top', or 'bottom'
         align: 'right', // ('left', 'right', or 'center')
         width: 250, // (integer, or 'auto')
         delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
         allow_dismiss: true, // If true then will display a cross to close the popup.
         stackup_spacing: 10 // spacing between consecutively stacked growls.
      });
   }

   getRoles(fnBeforeSend, fnSuccess, fnError);
}

function bindUserEdit(){

   $.each(arrayUserEdit,function(i , val){
      $('input').addClass('edited');

      $('#usuario').val(val.username);
      $('#email').val(val.email);
      bindCboRoles('#tipousuario', val.id_Rol);
      $('#nombre').val(val.name);
      $('#apPaterno').val(val.apPaterno);
      $('#apMaterno').val(val.apMaterno);
      if(val.gender == "M"){
         $('#rdMasculino').prop('checked',true);
      }
      else{
         $('#rdFemenino').prop('checked',true);
      }
      $('#dateBirth').val(val.dateBirth);
   });

}

function bindCboPrograms(idCbo, idProgram){
   $(idCbo).find('option').remove();

   let fnBeforeSend = () => {
   };

   let fnSuccess = (data) => {
      $.each(data,function(i , val){
         $(idCbo).append($('<option>').text(val.name).attr('value', val.id_Program));
      });

      if (idProgram) {
         $(idCbo).val(idProgram);
      }

      $('.selectpicker').selectpicker('refresh');
   }

   let fnError = (data) => {
      $.bootstrapGrowl("Error: programas no cargados.", {
         ele: 'body', // which element to append to
         type: 'danger', // (null, 'info', 'danger', 'success')
         offset: {from: 'top', amount: 20}, // 'top', or 'bottom'
         align: 'right', // ('left', 'right', or 'center')
         width: 250, // (integer, or 'auto')
         delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
         allow_dismiss: true, // If true then will display a cross to close the popup.
         stackup_spacing: 10 // spacing between consecutively stacked growls.
      });
   }

   getPrograms(fnBeforeSend, fnSuccess, fnError);
}