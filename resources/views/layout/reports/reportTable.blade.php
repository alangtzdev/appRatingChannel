@extends('templates.mastertemplate')
@section('title', 'Reporte Tabla')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<style>
.table.dataTable thead tr {
      background-color: green;
    }
</style>

@endsection
@section('content-master')
<div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="portlet box yellow-gold">
         <div class="portlet-title">
            <div class="caption">
               <i class="fa fa-filter"></i>Filtros
            </div>
            <div class="tools">
               <a href="" class="collapse" data-original-title="" title=""></a>
            </div>
         </div>
         <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="{{ route('reporttime') }}" class="form-horizontal form-bordered frm_date_time" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
               <div class="form-body">
                  <div class="form-group">
                     <div class="col-md-3 col-lg-3 text-center hidden-xs hidden-sm">
                        <label><strong>Meses</strong></label>
                     </div>
                  </div>
                  <div class="form-group last">
                     <div class="col-md-3 col-lg-3 text-center">
                        <div class="input-group">
                           <input id="dateRange" type="text" name="daterange" class="form-control" />
                           <span class="input-group-btn">
                              <button class="btn default" type="button">
                                 <i class="fa fa-calendar"></i>
                              </button>
                           </span>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-actions">
                  <div class="row">
                     <div class="col-md-offset-9 col-md-3 text-right">
                        <button id="btnFilterReportTime" type="submit" class="btn btn-success">
                           <i class="fa fa-check"></i> Aceptar
                        </button>
                        <button type="button" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancel</button>
                     </div>
                  </div>
               </div>
            </form>
            <!-- END FORM-->
         </div>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-md-12 col-lg-12">
    <div class="table-scrollable">
      <table class="table table-striped table-bordered table-advance table-hover">
          <thead class="" >
              <tr>
                  <th class="text-center"> HORA\DIA</th>
                  <th class="text-center">Lunes</th>
                  <th class="text-center">Martes</th>
                  <th class="text-center">Miercoles</th>
                  <th class="text-center">Jueves</th>
                  <th class="text-center">Viernes</th>
                  <th class="text-center">Sabado</th>
                  <th class="text-center">Domingo</th>


              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>
                      <a href="javascript:;"> 7:00 </a>
                  </td>
                  <td class="hidden-xs">
                    528.48    
                     <p>Programa pagado</p>
                     </td>
                  <td> 
                    85.52 
                      <p>Programa pagado</p>
                      {{-- <span class="label label-sm label-success label-mini"> Paid </span> --}}
                  </td>
                  <td>
                      373.42    
                     <p>Programa pagado</p>
                  </td>
                  <td>
                      124.90    
                     <p>Programa pagado</p>
                  </td>
                  <td>
                      294.48    
                     <p>Programa pagado</p>
                  </td>
                  <td>
                      0.0   
                     <p>Programa pagado</p>
                  </td>
                  <td>
                     0.0   
                     <p>Programa pagado</p>
                  </td>

              </tr>
              <tr>
                  <td>
                      <a href="javascript:;"> 7:30 </a>
                  </td>
                  <td class="hidden-xs">
                      528.48    
                       <p>Programa pagado</p>
                       </td>
                    <td> 
                      528.48    
                        <p>Programa pagado</p>
                        {{-- <span class="label label-sm label-success label-mini"> Paid </span> --}}
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
              </tr>
              <tr>
                  <td>
                      <a href="javascript:;"> 8:00 </a>
                  </td>
                  <td class="hidden-xs">
                      528.48    
                       <p>Programa pagado</p>
                       </td>
                    <td> 
                      528.48    
                        <p>Programa pagado</p>
                        {{-- <span class="label label-sm label-success label-mini"> Paid </span> --}}
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
              </tr>
              <tr>
                  <td>
                      <a href="javascript:;"> 8:30 </a>
                  </td>
                  <td class="hidden-xs">
                      528.48    
                       <p>Programa pagado</p>
                       </td>
                    <td> 
                      528.48    
                        <p>Programa pagado</p>
                        {{-- <span class="label label-sm label-success label-mini"> Paid </span> --}}
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
              </tr><tr>
                  <td>
                      <a href="javascript:;"> 9:00 </a>
                  </td>
                  <td class="hidden-xs">
                      528.48    
                       <p>Programa pagado</p>
                       </td>
                    <td> 
                      528.48    
                        <p>Programa pagado</p>
                        {{-- <span class="label label-sm label-success label-mini"> Paid </span> --}}
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
              </tr>
              <tr>
                  <td>
                      <a href="javascript:;"> 9:30 </a>
                  </td>
                  <td class="hidden-xs">
                      528.48    
                       <p>Programa pagado</p>
                       </td>
                    <td> 
                      528.48    
                        <p>Programa pagado</p>
                        {{-- <span class="label label-sm label-success label-mini"> Paid </span> --}}
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
              </tr>
              <tr>
                  <td>
                      <a href="javascript:;"> 10:00 </a>
                  </td>
                  <td class="hidden-xs">
                      528.48    
                       <p>Programa pagado</p>
                       </td>
                    <td> 
                      528.48    
                        <p>Programa pagado</p>
                        {{-- <span class="label label-sm label-success label-mini"> Paid </span> --}}
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
              </tr>
              <tr>
                  <td>
                      <a href="javascript:;"> 10:30 </a>
                  </td>
                  <td class="hidden-xs">
                      528.48    
                       <p>Programa pagado</p>
                       </td>
                    <td> 
                      528.48    
                        <p>Programa pagado</p>
                        {{-- <span class="label label-sm label-success label-mini"> Paid </span> --}}
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
              </tr>
              <tr>
                  <td>
                      <a href="javascript:;"> 11:00 </a>
                  </td>
                  <td class="hidden-xs">
                      528.48    
                       <p>Programa pagado</p>
                       </td>
                    <td> 
                      528.48    
                        <p>Programa pagado</p>
                        {{-- <span class="label label-sm label-success label-mini"> Paid </span> --}}
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
              </tr>
              <tr>
                  <td>
                      <a href="javascript:;"> 11:30 </a>
                  </td>
                  <td class="hidden-xs">
                      528.48    
                       <p>Programa pagado</p>
                       </td>
                    <td> 
                      528.48    
                        <p>Programa pagado</p>
                        {{-- <span class="label label-sm label-success label-mini"> Paid </span> --}}
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
              </tr>
              <tr>
                  <td>
                      <a href="javascript:;"> 12:00 </a>
                  </td>
                  <td class="hidden-xs">
                      528.48    
                       <p>Programa pagado</p>
                       </td>
                    <td> 
                      528.48    
                        <p>Programa pagado</p>
                        {{-- <span class="label label-sm label-success label-mini"> Paid </span> --}}
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
              </tr>
              <tr>
                  <td>
                      <a href="javascript:;"> 12:30 </a>
                  </td>
                  <td class="hidden-xs">
                      528.48    
                       <p>Programa pagado</p>
                       </td>
                    <td> 
                      528.48    
                        <p>Programa pagado</p>
                        {{-- <span class="label label-sm label-success label-mini"> Paid </span> --}}
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
              </tr>
              <tr>
                  <td>
                      <a href="javascript:;"> 13:00 </a>
                  </td>
                  <td class="hidden-xs">
                      528.48    
                       <p>Programa pagado</p>
                       </td>
                    <td> 
                      528.48    
                        <p>Programa pagado</p>
                        {{-- <span class="label label-sm label-success label-mini"> Paid </span> --}}
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
              </tr>
              <tr>
                  <td>
                      <a href="javascript:;"> 13:30 </a>
                  </td>
                  <td class="hidden-xs">
                      528.48    
                       <p>Programa pagado</p>
                       </td>
                    <td> 
                      528.48    
                        <p>Programa pagado</p>
                        {{-- <span class="label label-sm label-success label-mini"> Paid </span> --}}
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
              </tr>
              <tr>
                  <td>
                      <a href="javascript:;"> 14:00 </a>
                  </td>
                  <td class="hidden-xs">
                      528.48    
                       <p>Programa pagado</p>
                       </td>
                    <td> 
                      528.48    
                        <p>Programa pagado</p>
                        {{-- <span class="label label-sm label-success label-mini"> Paid </span> --}}
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
              </tr>
              <tr>
                  <td>
                      <a href="javascript:;"> 14:30 </a>
                  </td>
                  <td class="hidden-xs">
                      528.48    
                       <p>Programa pagado</p>
                       </td>
                    <td> 
                      528.48    
                        <p>Programa pagado</p>
                        {{-- <span class="label label-sm label-success label-mini"> Paid </span> --}}
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
              </tr>
              <tr>
                  <td>
                      <a href="javascript:;"> 15:00 </a>
                  </td>
                  <td class="hidden-xs">
                      528.48    
                       <p>Programa pagado</p>
                       </td>
                    <td> 
                      528.48    
                        <p>Programa pagado</p>
                        {{-- <span class="label label-sm label-success label-mini"> Paid </span> --}}
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
              </tr>
              <tr>
                  <td>
                      <a href="javascript:;"> 15:30 </a>
                  </td>
                  <td class="hidden-xs">
                      528.48    
                       <p>Programa pagado</p>
                       </td>
                    <td> 
                      528.48    
                        <p>Programa pagado</p>
                        {{-- <span class="label label-sm label-success label-mini"> Paid </span> --}}
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
                    <td>
                        528.48    
                       <p>Programa pagado</p>
                    </td>
              </tr>
          </tbody>
      </table>
  </div>
   </div>
</div>
@endsection
@section('scripts')   
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="{{asset('js/datetimepickers.js')}}" type="text/javascript"></script>
@endsection