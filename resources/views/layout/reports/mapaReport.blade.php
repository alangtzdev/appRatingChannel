@extends('templates.mastertemplate')
@section('title', 'Reporte Mapa')
@section('css')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {
        'packages':['geochart'],
        // Note: you will need to get a mapsApiKey for your project.
        // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
        'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
      });
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
          ['Pais', 'Popularidad'],
          ['Alabama', 200],
          ['Alaska', 350], 
          ['Arizona', 700],
          ['Arkansas', 250],
          ['California', 500],
        ]);
        var data2 = google.visualization.arrayToDataTable([
          ['Country', 'Popularity'],
          ['Germany', 200],
          ['United States', 300],
          ['Brazil', 400],
          ['Canada', 500],
          ['France', 600],
          ['RU', 700]
        ]);

        var options = {
          region: 'US', // Africa
          displayMode: 'regions',
          resolution: 'provinces',
          colorAxis: {colors: ['green', 'blue']}
        //   backgroundColor: '#81d4fa',
        //   datalessRegionColor: '#f8bbd0',
        //   defaultColor: '#f5f5f5',
        };
        // var options2 = {
        //   region: 'MX', // Africa
        //   colorAxis: {colors: ['#00853f', 'black', '#e31b23']},
        //   backgroundColor: '#81d4fa',
        //   datalessRegionColor: '#f8bbd0',
        //   defaultColor: '#f5f5f5',
        // };
        var options2 = {};

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));
        var chart2 = new google.visualization.GeoChart(document.getElementById('regions_div2'));

        chart.draw(data, options);
        chart2.draw(data2, options2);
      }
    </script>
@endsection
@section('content-master')
<div class="row">
 <div class="col-md-6">
  <div class="portlet light portlet-fit bordered">
   <div class="portlet-title">
    <div class="caption">
     <i class=" icon-layers font-green"></i>
     <span class="caption-subject font-green bold uppercase">Estados Unidos</span>
    </div>
   </div>
   <div class="portlet-body">
    <div id="regions_div" style="width: 100%; height: 500px;"></div>
   </div>
  </div>
 </div>
 <div class="col-md-6">
  <div class="portlet light portlet-fit bordered">
   <div class="portlet-title">
    <div class="caption">
     <i class=" icon-layers font-green"></i>
     <span class="caption-subject font-green bold uppercase">Mexico</span>
    </div>
   </div>
   <div class="portlet-body">
    <div id="regions_div2" style="width: 100%; height: 500px;"></div>
   </div>
  </div>
 </div>
</div>

@endsection
@section('scripts')   

@endsection