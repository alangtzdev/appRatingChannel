function addDefaultsOptions(jTableOptions) {
  jTableOptions.lengthMenu = [[10, 20, 50, -1], [10, 20, 50, "Todos"]];
  jTableOptions.scrollY = 440;
  jTableOptions.scrollCollapse = true;
  jTableOptions.scrollX = true;
}

function bindTableHeaders(table, arrColumns) {
  let $thead = $(table.find("thead"));
  let $tr = $("<tr>");
  $thead.html("");

  for (var itemColum of arrColumns) {
    //if (!itemColum || !itemColum.headName)
    //    debugger;

    let $th = $("<th>");

    if (itemColum && itemColum.headName) $th.html(itemColum.headName);

    $tr.append($th);
  }

  $thead.append($tr);
}

function bindTable(idTable, typeTable) {
  var $table = $(idTable);

  if (typeTable.isDinamycColumns) {
    bindTableHeaders($table, typeTable.columns);
  }

  let fnBeforeSend = () => {
    swal.showLoading();
  };

  let fnSuccess = data => {
    if (data.length != 0) {
      let jsonOptions = $.extend({}, typeTable);

      jsonOptions.data = data;
      jsonOptions.createdRow = function(row, data, dataIndex) {};

      addDefaultsOptions(jsonOptions);

      try {
        $table.DataTable().destroy();
        $table.DataTable(jsonOptions);
      } catch (e) {
        console.log(e);
      }

      swal.hideLoading();
      swal({
        position: "top-end",
        type: "success",
        title: "Usuarios cargados correctamente.",
        showConfirmButton: false,
        timer: 1500
      });
    } else {
      swal.hideLoading();
      swal({
        position: "top-end",
        type: "warning",
        title: "Usuarios no encontrados.",
        showConfirmButton: false,
        timer: 1500
      });
    }
  };

  let fnError = data => {
    swal.hideLoading();
    swal({
      position: "top-end",
      type: "error",
      title: "Error al cargar los usuarios.",
      showConfirmButton: false,
      timer: 1500
    });
  };

  typeTable.fnGet(fnBeforeSend, fnSuccess, fnError);
}
