const typeColumnUsers = {
   username: {
      headName: 'Usuario',
      data: 'username',
      className: 'text-left',
      width: "15%"
   },
   email: {
      headName: 'Correo',
      data: 'email',
      className: 'text-center',
      width: "20%"
   },
   rol: {
      headName: 'Rol',
      data: 'rol',
      className: 'text-left',
      width: "10%"
   },
   name: {
      headName: 'Nombre',
      data: 'name',
      className: 'text-left',
      width: "10%"
   },
   apPaterno: {
      headName: 'Ap. Paterno',
      data: 'apPaterno',
      className: 'text-left',
      width: "10%"
   },
   apMaterno: {
      headName: 'Ap. Materno',
      data: 'apMaterno',
      className: 'text-left',
      width: "10%"
   },
   gender: {
      headName: 'Genero',
      data: 'gender',
      className: 'text-left',
      width: "5%"
   },
   dateBirth: {
      headName: 'F. Nacimiento',
      data: 'dateBirth',
      className: 'text-center',
      width: "10%"
   },
   acciones: {
      headName: 'Acciones',
      data: null,
      mRender: function (data, type, full) {
         return `<a type="button" class="btn btn-xs green" href="/admin/useredit/${full.id_User}"><i class="fa fa-pencil" aria-hidden="true"></i></a><a href="/destroyusers/${full.id_User}" type="button" class="btn btn-xs red-mint"><i class="fa fa-trash-o" aria-hidden="true"></i></a>`;
      },
      className: 'text-center',
      width: "5%"
   }
}