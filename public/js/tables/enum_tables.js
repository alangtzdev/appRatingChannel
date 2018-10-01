const typeTablesUsers = {
  adminUsers: {
    isDinamycColumns: true,
    columns: [
      typeColumnUsers.username,
      typeColumnUsers.email,
      typeColumnUsers.rol,
      typeColumnUsers.name,
      typeColumnUsers.apPaterno,
      typeColumnUsers.apMaterno,
      typeColumnUsers.gender,
      typeColumnUsers.acciones
    ],
    fnGet: getUsers
  }
};

const typeTablesReports = {
  reportTable: {
    isDinamycColumns: true,
    columns: [
      typeColumnsReport.horaDia,
      typeColumnsReport.lunes,
      typeColumnsReport.martes,
      typeColumnsReport.miercoles,
      typeColumnsReport.jueves,
      typeColumnsReport.viernes,
      typeColumnsReport.sabado,
      typeColumnsReport.domingo
    ],
    fnGet: getReportTableFilter
  }
};
