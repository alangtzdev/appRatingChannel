$(document).ready(function(){
   $("#frm_users").validate({
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
      highlight: function(element, errorClass, validClass) {
         $('.element').closest('.form-group').addClass('has-error');
      },
      unhighlight: function(element, errorClass, validClass) {
         $('.element').closest('.form-group').removeClass('has-error');
      },
      errorElement: "span",
      errorClass: "help-block",
      errorPlacement: function(error, element) {
         if(element.parent('.input-group').length) {
            error.insertAfter(element.parent());
         }
         else {
            error.insertAfter(element);
         }
      }
   });

   bindTable("#tableUsers", typeTablesUsers.adminUsers)

   $('#mdUser').on('shown.bs.modal', function (event) {
      let button = event.relatedTarget;
      let action = button.dataset.action;

      if(action == "edit") {
         let idUser = button.dataset.iduser;
         let idRol = button.dataset.idrol;
         
         bindCboRoles('#tipousuario', idRol);
         bindUserById(idUser);
      }
      else{
         bindCboRoles('#tipousuario');
      }
   });

   $('#mdUser').on('hidden.bs.modal', function () {
      limpiarCampos();
   });
});