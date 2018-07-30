$( document ).ready(function() {
   datetimepickers();

   $('.selectpicker').selectpicker({
      title: 'Seleccione...',
      liveSearch: true,
      actionsBox: true,
      selectAllText: '<i class="fa fa-check fa-1x" aria-hidden="true"></i> Todo',
      deselectAllText: '<i class="fa fa-times fa-1x" aria-hidden="true"></i> Todo',
      size: 5,
      windowPadding: ['top', 'right', 'bottom', 'left'],
      dropdownAlignRight: true,
      style: 'multiple-select'
   });
});

function datetimepickers(){
   var ctx = document.getElementById("dateTimePicker").getContext('2d');
   var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
         labels: ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"],
         datasets: [{
            label: "Ahí viene la Marimba",
            data: [528.48, 373.42, 124.90, 294.23, 303.29, 217.45, 746.35],
            backgroundColor: 'rgba(54, 162, 235, 1)'
         },{
            label: "Café Nostalgia",
            data: [132.43, 576.42, 174.90, 104.23, 343.29, 367.45, 223.35],
            backgroundColor: 'rgba(54, 162, 235, 1)'
         },{
            label: "Con el son de la marimba",
            data: [378.48, 283.42, 158.90, 765.23, 323.29, 319.45, 517.35],
            backgroundColor: 'rgba(54, 162, 235, 1)'
         },{
            label: "Cantares de mi tierra",
            data: [748.48, 354.42, 674.90, 389.23, 595.29, 164.45, 176.35],
            backgroundColor: 'rgba(54, 162, 235, 1)'
         },{
            label: "Raíces de Michoacán",
            data: [238.48, 265.42, 573.90, 189.23, 467.29, 885.45, 384.35],
            backgroundColor: 'rgba(54, 162, 235, 1)'
         },{
            label: "Venga a bailar Huapango",
            data: [189.48, 472.42, 723.90, 378.23, 869.29, 376.45, 837.35],
            backgroundColor: 'rgba(54, 162, 235, 1)'
         },{
            label: "Lo mágico de México",
            data: [634.48, 367.42, 478.90, 278.23, 647.29, 449.45, 294.35],
            backgroundColor: 'rgba(54, 162, 235, 1)'
         }]
      },
      options: {
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
                  stepSize: 25,
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
      }
   });
}