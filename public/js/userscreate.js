$(document).ready(function(){
   $(".frm_create_users").validate({
      errorElement: 'span', //default input error message container
      errorClass: 'help-block', // default input error message class
      focusInvalid: false, // do not focus the last invalid input
      rules:{
         "D_U[name]":{
            required:true
         },
         "D_U[email]":{
            required:true,
            email:true
         },
         "D_U[password]":{
            required:true,
            password:true
         },
         "D_U[id_Rol]":{
            required:true
         },
         "D_E[name]":{
            required:true
         },
         "D_E[apPaterno]":{
            required:true
         },
         "D_E[apMaterno]":{
            required:true
         },
         "D_E[gender]":{
            required:true
         },
         "D_E[dateBirth]":{
            required:true
         }
      },
      messages:{
         "D_U[name]":{
            required:"Este campo es requerido"
         },
         "D_U[email]":{
            required:"Este campo es requerido",
            email: "Este campo debe ser tipo correo"
         },
         "D_U[password]":{
            required:"Este campo es requerido",
            password: "Este campo debe ser tipo contraseña"
         },
         "D_U[id_Rol]":{
            required:"Este campo es requerido"
         },
         "D_E[name]":{
            required:"Este campo es requerido"
         },
         "D_E[apPaterno]":{
            required:"Este campo es requerido"
         },
         "D_E[apMaterno]":{
            required:"Este campo es requerido"
         },
         "D_E[gender]":{
            required:"Este campo es requerido"
         },
         "D_E[dateBirth]":{
            required:"Este campo es requerido"
         }
      },
      invalidHandler: function (event, validator) { //display error alert on form submit   
         $('.alert-danger', $('.frm_create_users')).show();
      },

      highlight: function (element) { // hightlight error inputs
         $(element)
            .closest('.form-group').removeClass('has-info').addClass('has-error'); // set error class to the control group
      },

      unhighlight: function (element) {
         $(element)
            .closest('.form-group').removeClass('has-error').addClass('has-info');
      },

      success: function (label) {
         label.closest('.form-group').removeClass('has-error');
      },

      errorPlacement: function (error, element) {
         error.insertAfter(element.closest('.form-control'));
      },

      submitHandler: function (form) {
         form.submit();
      }
   });

   bindCboRoles('#tipousuario');
});