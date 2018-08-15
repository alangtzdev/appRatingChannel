$( document ).ready(function(){
   var mDia;
   bindCboPrograms('#cboPrograms');

   $('input[name="daterange"]').daterangepicker({
      "opens": 'rigth',
      "minYear": 2017,
      "timePicker24Hour": true,
      "startDate": moment().startOf('year'),
      "alwaysShowCalendars": true,
      "showCustomRangeLabel": true,
      ranges: {
         'Hoy': [moment(), moment()],
         'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
         'Ultimos 7 días': [moment().subtract(6, 'days'), moment()],
         'ultimos 30 días': [moment().subtract(29, 'days'), moment()],
         'Este mes': [moment().startOf('month'), moment().endOf('month')],
         'Mes pasado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
         'Este año': [moment().startOf('year'), moment().endOf('year')],
         'Año pasado': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
      },
   }, function(start, end, label) {
      //      console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
   });

   $('.selectpicker').selectpicker({
      title: 'Seleccione...',
      liveSearch: true,
      actionsBox: true,
      selectAllText: '<i class="fa fa-check fa-1x" aria-hidden="true"></i>',
      deselectAllText: '<i class="fa fa-times fa-1x" aria-hidden="true"></i>',
      size: 5,
      windowPadding: ['top', 'right', 'bottom', 'left'],
      dropdownAlignRight: true,
      style: 'multiple-select'
   });

   $('#cboRunTime').selectpicker('selectAll');
   $('#cboPrograms').selectpicker('selectAll');

   $('#btnFilterDateTime').click(function(){
      var jParams = JSON.stringify({
         daterange: $('#dateRange').val(),
         nationalTime: $('#nationalTime').val(),
         runTime: $('#cboRunTime').val(),
         programs: $('#cboPrograms').val(),
      });

      //      $.post('/datetime', jParams, function(data){
      //         console.log(data);
      //      });

      bindDateTimeFilter(jParams);
   });
});

function datetimepickers(datosGrafica){
   var ctx = document.getElementById('dateTimePicker').getContext('2d');
   var myChart = new Chart(ctx, { type: 'bar', data: {}, options: {} });
   myChart.destroy();

   var options = {
      responcive: true,
      maintainAspectRatio: true,
      legend: {
         display: false,
         position: 'top',
         labels: {
            boxWidth: 12,
            padding: 5
         }
      },
      scales: {
         yAxes: [{
            ticks: {
               beginAtZero: true,
               gridLines: {
                  drawOnChartArea: true,
                  drawBorder: true,
               },
            },
            gridLines: {
               display: true,
            }
         }],
         xAxes: [{
            unitStepSize: 1,
            ticks: {
               autoSkip: true,
               gridLines: {
                  drawOnChartArea: true,
                  drawBorder: true,
               },
            },
            gridLines: {
               display: true,
            },
         }]
      }
   };

   mDia = datosGrafica.map(function (m) { return m.DiaString });
   var mDatos = datosGrafica.map(function (m) { return m.Datos });

   var arrDatos = [];

   for(i of mDatos){
      for(j of i)
      {
         arrDatos.push(j);
      }
   };

   for(i of arrDatos){
      for (j in mDia){
         var sum = parseInt(j) + 2;
         if(sum < mDia.length){
            i.data.push(random());
         }
      }
   };

   myChart = new Chart(ctx, {
      type: 'bar',
      data: {
         labels: mDia,
         datasets: arrDatos
      },
      options: options
   });
}

function random() {
   return Math.round(Math.random()*10000);    
}