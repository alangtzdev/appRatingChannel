$(function () {
    var mDia;
 
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
});