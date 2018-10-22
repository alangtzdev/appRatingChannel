function bindCboRoles(idCbo, idRol) {
  $(idCbo).removeClass("edited");
  $(idCbo)
    .find("option")
    .remove();

  let fnBeforeSend = () => {
    swal.showLoading();
  };

  let fnSuccess = data => {
    if (data.length != 0) {
      $(idCbo).addClass("edited");
      $.each(data, function(i, val) {
        $(idCbo).append(
          $("<option>")
            .text(val.name)
            .attr("value", val.id_Rol)
        );
      });

      if (idRol) {
        $(idCbo).val(idRol);
      }

      swal.hideLoading();
      swal({
        position: "top-end",
        type: "success",
        title: "Roles cargados correctamente.",
        showConfirmButton: false,
        timer: 1500
      });
    } else {
      swal.hideLoading();
      swal({
        position: "top-end",
        type: "warning",
        title: "Roles no encontrados.",
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
      title: "Error al cargar los roles.",
      showConfirmButton: false,
      timer: 1500
    });
  };

  getRoles(fnBeforeSend, fnSuccess, fnError);
}

function bindUserEdit() {
  $.each(arrayUserEdit, function(i, val) {
    $("input").addClass("edited");

    $("#usuario").val(val.username);
    $("#email").val(val.email);
    bindCboRoles("#tipousuario", val.id_Rol);
    $("#nombre").val(val.name);
    $("#apPaterno").val(val.apPaterno);
    $("#apMaterno").val(val.apMaterno);
    if (val.gender == "M") {
      $("#rdMasculino").prop("checked", true);
    } else {
      $("#rdFemenino").prop("checked", true);
    }
    $("#dateBirth").val(val.dateBirth);
  });
}

function bindCboPrograms(idCbo, idProgram) {
  $(idCbo)
    .find("option")
    .remove();

  let fnBeforeSend = () => {
    swal.showLoading();
  };

  let fnSuccess = data => {
    if (data.length != 0) {
      $.each(data, function(i, val) {
        $(idCbo).append(
          $("<option>")
            .text(val.name)
            .attr("value", val.id_Program)
        );
      });
      swal.hideLoading();
      swal({
        position: "top-end",
        type: "success",
        title: "Programas cargados correctamente.",
        showConfirmButton: false,
        timer: 1500
      });
    } else {
      swal.hideLoading();
      swal({
        position: "top-end",
        type: "warning",
        title: "Programas no encontrados.",
        showConfirmButton: false,
        timer: 1500
      });
    }

    $(".selectpicker").selectpicker("refresh");
    $("#cboRunTime").selectpicker("selectAll");
  };

  let fnError = data => {
    swal.hideLoading();
    swal({
      position: "top-end",
      type: "error",
      title: "Error al cargar los programas.",
      showConfirmButton: false,
      timer: 1500
    });
  };

  getPrograms(fnBeforeSend, fnSuccess, fnError);
}

function bindDateTimeFilter(jParams) {
  let fnBeforeSend = () => {
    swal.showLoading();
  };

  let fnSuccess = data => {
    swal.hideLoading();
    $("canvas#dayTime").remove();
    if (data.length != 0) {
      swal("¡Excelente!", "Tu grafica fue cargada correctamente.", "success");
      console.log(data);
      datetimepickers(data);
    } else {
      swal("¡Advertencia!", "Tus datos no fueron encontrados.", "warning");
    }
  };

  let fnError = data => {
    swal.hideLoading();
    swal("¡Algo salio mal!", "Tu grafica no fue cargada.", "error");
  };

  getDateTimeFilter(jParams, fnBeforeSend, fnSuccess, fnError);
}

function bindReportTableFilter(jParams) {
  let fnBeforeSend = () => {
    swal.showLoading();
  };

  let fnSuccess = datasReport => {
    swal.hideLoading();
    if (datasReport.length != 0) {
      swal(
        "¡Excelente!",
        "Tus datos fueron cargados correctamente.",
        "success"
      );

      let data = datasReport;
      console.log(data);
      $("#divReportTable").html("");

      let htmlReport = `
      <table class="table table-striped table-bordered table-advance table-hover">
      <thead class="" >
      <tr id="trHeadReportTable">
      <th class="text-center">HORA/DIA</th>
      </tr>
      </thead>
      <tbody id="tBodyReporTable">
      </tbody>
      </table>
      `;

      $("#divReportTable").append(htmlReport);

      data.forEach(datas => {
        datas.Days.forEach(days => {
          $("#trHeadReportTable").append(
            `<th class="text-center">${days}</th>`
          );
        });
      });

      data.forEach(datas => {
        let countTr = 0;
        datas.Times.forEach(times => {
          $("#tBodyReporTable").append(
            `<tr class="trBodyReporTable${countTr}"><td>${times}</td></tr>`
          );
          datas.Days.forEach((days, index) => {
            $(`.trBodyReporTable${countTr}`).append(
              `<td class="tdBodyReportTable${index}"></td>`
            );
            for (var datos in datas.Datos) {
              if (datas.Datos[datos].day === index) {
                for (var daydatas in datas.Datos[datos].dayDatas) {
                  if (datas.Datos[datos].dayDatas[daydatas].time === times) {
                    datas.Datos[datos].dayDatas[daydatas].timeDatas.forEach(
                      timedatas => {
                        $(
                          `.trBodyReporTable${countTr} td.tdBodyReportTable${index}`
                        ).append(`<div class="mt-element-ribbon bg-grey-steel">
                              <div class="ribbon ribbon-border-hor ribbon-clip ribbon-color-success uppercase">
                              <div class="ribbon-sub ribbon-clip"></div>
                              ${timedatas.AA.toFixed(2)}
                              </div>
                              <p class="ribbon-content">${
                                timedatas.program
                              } - <strong>${timedatas.runTime}</strong></p>
                              </div>`);
                      }
                    );
                  }
                }
              }
            }
          });
          countTr += 1;
        });
      });
    } else {
      swal("¡Advertencia!", "Tus datos no fueron encontrados.", "warning");
    }
  };

  let fnError = data => {
    swal.hideLoading();
    swal("¡Algo salio mal!", "Tus datos no fueron cargados.", "error");
  };

  getReportTableFilter(jParams, fnBeforeSend, fnSuccess, fnError);
}
