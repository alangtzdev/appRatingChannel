function bindCboRoles(idCbo, idRol) {
  $(idCbo).removeClass("edited");
  $(idCbo)
    .find("option")
    .remove();

  let fnBeforeSend = () => {};

  let fnSuccess = data => {
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
  };

  let fnError = data => {
    $.bootstrapGrowl("Error: roles no cargados.", {
      ele: "body", // which element to append to
      type: "danger", // (null, 'info', 'danger', 'success')
      offset: { from: "top", amount: 20 }, // 'top', or 'bottom'
      align: "right", // ('left', 'right', or 'center')
      width: 250, // (integer, or 'auto')
      delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
      allow_dismiss: true, // If true then will display a cross to close the popup.
      stackup_spacing: 10 // spacing between consecutively stacked growls.
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

  let fnBeforeSend = () => {};

  let fnSuccess = data => {
    $.each(data, function(i, val) {
      $(idCbo).append(
        $("<option>")
          .text(val.name)
          .attr("value", val.id_Program)
      );
    });

    $(".selectpicker").selectpicker("refresh");
    $("#cboRunTime").selectpicker("selectAll");
  };

  let fnError = data => {
    $.bootstrapGrowl("Error: programas no cargados.", {
      ele: "body", // which element to append to
      type: "danger", // (null, 'info', 'danger', 'success')
      offset: { from: "top", amount: 20 }, // 'top', or 'bottom'
      align: "right", // ('left', 'right', or 'center')
      width: 250, // (integer, or 'auto')
      delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
      allow_dismiss: true, // If true then will display a cross to close the popup.
      stackup_spacing: 10 // spacing between consecutively stacked growls.
    });
  };

  getPrograms(fnBeforeSend, fnSuccess, fnError);
}

function bindDateTimeFilter(jParams) {
  let fnBeforeSend = () => {};

  let fnSuccess = data => {
    console.log(data);
    datetimepickers(data);
  };

  let fnError = data => {
    $.bootstrapGrowl("Error: datos para la grafica no cargados.", {
      ele: "body", // which element to append to
      type: "danger", // (null, 'info', 'danger', 'success')
      offset: { from: "top", amount: 20 }, // 'top', or 'bottom'
      align: "right", // ('left', 'right', or 'center')
      width: 250, // (integer, or 'auto')
      delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
      allow_dismiss: true, // If true then will display a cross to close the popup.
      stackup_spacing: 10 // spacing between consecutively stacked growls.
    });
  };

  getDateTimeFilter(jParams, fnBeforeSend, fnSuccess, fnError);
}

function bindReportTableFilter(jParams) {
  let fnBeforeSend = () => {
    spinner_show("#divReportTable");
  };

  let fnSuccess = datasReport => {
    spinner_hide("#divReportTable");
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
        $("#trHeadReportTable").append(`<th class="text-center">${days}</th>`);
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
  };

  let fnError = data => {
    $.bootstrapGrowl("Error: datos para la tabla no cargados.", {
      ele: "body", // which element to append to
      type: "danger", // (null, 'info', 'danger', 'success')
      offset: { from: "top", amount: 20 }, // 'top', or 'bottom'
      align: "right", // ('left', 'right', or 'center')
      width: 250, // (integer, or 'auto')
      delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
      allow_dismiss: true, // If true then will display a cross to close the popup.
      stackup_spacing: 10 // spacing between consecutively stacked growls.
    });
  };

  getReportTableFilter(jParams, fnBeforeSend, fnSuccess, fnError);
}
