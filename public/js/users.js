$(document).ready(function(){
   //   $("#frm_users").validate({
   //      rules:{
   //         "D_U[usuario]":{
   //            required:true
   //         },
   //         "D_U[email]":{
   //            required:true
   //         },
   //         "D_U[tipousuario]":{
   //            required:true
   //         },
   //         "D_E[nombre]":{
   //            required:true
   //         },
   //         "D_E[apPaterno]":{
   //            required:true
   //         },
   //         "D_E[apMaterno]":{
   //            required:true
   //         },
   //         "D_E[sexo]":{
   //            required:true
   //         },
   //         "D_E[fechanacimiento]":{
   //            required:true
   //         }
   //      },
   //      messages:{
   //         "D_A[usuario]":{
   //            required:"Este campo es requerido"
   //         },
   //         "D_A[email]":{
   //            required:"Este campo es requerido"
   //         },
   //         "D_A[tipousuario]":{
   //            required:"Este campo es requerido"
   //         },
   //         "D_A[nombre]":{
   //            required:"Este campo es requerido"
   //         },
   //         "D_A[apPaterno]":{
   //            required:"Este campo es requerido"
   //         },
   //         "D_A[apMaterno]":{
   //            required:"Este campo es requerido"
   //         },
   //         "D_A[sexo]":{
   //            required:"Este campo es requerido"
   //         },
   //         "D_D[fechanacimiento]":{
   //            required:"Este campo es requerido"
   //         }
   //      },
   //      highlight: function(element, errorClass, validClass) {
   //         $('.element').closest('.form-group').addClass('has-error');
   //      },
   //      unhighlight: function(element, errorClass, validClass) {
   //         $('.element').closest('.form-group').removeClass('has-error');
   //      },
   //      errorElement: "span",
   //      errorClass: "help-block",
   //      errorPlacement: function(error, element) {
   //         if(element.parent('.input-group').length) {
   //            error.insertAfter(element.parent());
   //         }
   //         else {
   //            error.insertAfter(element);
   //         }
   //      }
   //   });

   $.ajax({
      "url":"/users",
      "type":"post",
      "datatype":"json"
   }).done(function(datos){
      if(datos.length>0)
      {
         console.log(datos);
      }
      else
      {
         $.bootstrapGrowl("Error: usuarios no cargados.", {
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
   });

   $.ajax({
      "url":"/roles",
      "type":"post",
      "datatype":"json"
   }).done(function(datos){
      if(datos.length>0)
      {
         var item='<option value=""></option>';
         $.each(datos,function(index,objeto){
            item +='<option value="'+ objeto.id_Rol +'">'+objeto.name+'</option>';
         });
         $("#tipousuario").html(item);
      }
      else
      {
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
   });
});