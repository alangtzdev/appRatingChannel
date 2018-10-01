const typeColumnUsers = {
  username: {
    headName: "Usuario",
    data: "username",
    className: "text-left",
    width: "15%"
  },
  email: {
    headName: "Correo",
    data: "email",
    className: "text-center",
    width: "20%"
  },
  rol: {
    headName: "Rol",
    data: "rol",
    className: "text-left",
    width: "10%"
  },
  name: {
    headName: "Nombre",
    data: "name",
    className: "text-left",
    width: "10%"
  },
  apPaterno: {
    headName: "Ap. Paterno",
    data: "apPaterno",
    className: "text-left",
    width: "10%"
  },
  apMaterno: {
    headName: "Ap. Materno",
    data: "apMaterno",
    className: "text-left",
    width: "10%"
  },
  gender: {
    headName: "Genero",
    data: "gender",
    className: "text-left",
    width: "5%"
  },
  acciones: {
    headName: "Acciones",
    data: null,
    mRender: function(data, type, full) {
      return `<a type="button" class="btn btn-xs btn-warning" href="/admin/useredit/${
        full.id_User
      }"><i class="fa fa-pencil" aria-hidden="true"></i></a><a href="/destroyusers/${
        full.id_User
      }" type="button" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>`;
    },
    className: "text-center",
    width: "5%"
  }
};

const typeColumnsReport = {
  horaDia: {
    headName: "HORA/DIA",
    data: null,
    mRender: function(data, type, full) {},
    className: "text-left",
    width: "15%"
  },
  lunes: {
    headName: "Lunes",
    data: null,
    mRender: function(data, type, full) {},
    className: "text-left",
    width: "15%"
  },
  martes: {
    headName: "Martes",
    data: null,
    mRender: function(data, type, full) {},
    className: "text-left",
    width: "15%"
  },
  miercoles: {
    headName: "Miércoles",
    data: null,
    mRender: function(data, type, full) {},
    className: "text-left",
    width: "15%"
  },
  jueves: {
    headName: "Jueves",
    data: null,
    mRender: function(data, type, full) {},
    className: "text-left",
    width: "15%"
  },
  viernes: {
    headName: "Viernes",
    data: null,
    mRender: function(data, type, full) {},
    className: "text-left",
    width: "15%"
  },
  sabado: {
    headName: "Sábado",
    data: null,
    mRender: function(data, type, full) {},
    className: "text-left",
    width: "15%"
  },
  domingo: {
    headName: "Domingo",
    data: null,
    mRender: function(data, type, full) {},
    className: "text-left",
    width: "15%"
  }
};
