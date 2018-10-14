$(document).ready(function() {
  var mDia;
  bindCboPrograms("#cboPrograms");

  $('input[name="daterange"]').daterangepicker(
    {
      opens: "rigth",
      minYear: 2017,
      timePicker24Hour: true,
      startDate: moment().startOf("year"),
      alwaysShowCalendars: true,
      showCustomRangeLabel: true,
      ranges: {
        Hoy: [moment(), moment()],
        Ayer: [moment().subtract(1, "days"), moment().subtract(1, "days")],
        "Ultimos 7 días": [moment().subtract(6, "days"), moment()],
        "ultimos 30 días": [moment().subtract(29, "days"), moment()],
        "Este mes": [moment().startOf("month"), moment().endOf("month")],
        "Mes pasado": [
          moment()
            .subtract(1, "month")
            .startOf("month"),
          moment()
            .subtract(1, "month")
            .endOf("month")
        ],
        "Este año": [moment().startOf("year"), moment().endOf("year")],
        "Año pasado": [
          moment()
            .subtract(1, "year")
            .startOf("year"),
          moment()
            .subtract(1, "year")
            .endOf("year")
        ]
      }
    },
    function(start, end, label) {
      //      console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
    }
  );

  $(".selectpicker").selectpicker({
    title: "Seleccione...",
    liveSearch: true,
    actionsBox: true,
    selectAllText: '<i class="fa fa-check fa-1x" aria-hidden="true"></i>',
    deselectAllText: '<i class="fa fa-times fa-1x" aria-hidden="true"></i>',
    size: 5,
    windowPadding: ["top", "right", "bottom", "left"],
    dropdownAlignRight: true,
    style: "multiple-select"
  });

  $("#cboRunTime").selectpicker("selectAll");
  $("#cboPrograms").selectpicker("selectAll");

  $("#btnFilterDateTime").click(function() {
    var jParams = JSON.stringify({
      daterange: $("#dateRange").val(),
      nationalTime: $("#nationalTime").val(),
      runTime: $("#cboRunTime").val(),
      programs: $("#cboPrograms").val()
    });

    bindDateTimeFilter(jParams);
  });
});

function datetimepickers(datosGrafica) {
  $("div.day-time").append(
    '<canvas id="dayTime" class="animated fadeIn"></canvas>'
  );

  let ctx = document.getElementById("dayTime").getContext("2d");

  let options = {
    responcive: true,
    maintainAspectRatio: true,
    legend: {
      display: false,
      position: "top",
      labels: {
        boxWidth: 12,
        padding: 5
      }
    },
    scales: {
      yAxes: [
        {
          ticks: {
            beginAtZero: true,
            gridLines: {
              drawOnChartArea: true,
              drawBorder: true
            }
          },
          gridLines: {
            display: true
          }
        }
      ],
      xAxes: [
        {
          unitStepSize: 1,
          ticks: {
            autoSkip: true,
            gridLines: {
              drawOnChartArea: true,
              drawBorder: true
            }
          },
          gridLines: {
            display: true
          }
        }
      ]
    }
  };

  let mDia = datosGrafica[0].Dias;
  let mDatos = datosGrafica[0].Datos;

  let data = {
    labels: mDia,
    datasets: mDatos
  };

  let config = { type: "bar", data: data, options: options };
  let myChart = new Chart(ctx, config);
  myChart.clear();
  myChart = new Chart(ctx, config);
}
