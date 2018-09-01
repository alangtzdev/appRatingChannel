@extends('templates.mastertemplate')
@section('title', 'Day Time')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection
@section('content-master')
<div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="portlet box green">
         <div class="portlet-title">
            <div class="caption">
               <i class="fa fa-filter"></i>Filters
            </div>
            <div class="tools">
               <a href="" class="collapse" data-original-title="" title=""></a>
            </div>
         </div>
         <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="#" class="form-horizontal form-bordered frm_date_time" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
               <div class="form-body">
                  <div class="form-group">
                     <div class="col-md-3 col-lg-3 text-center hidden-xs hidden-sm">
                        <label><strong>Meses</strong></label>
                     </div>
                     <div class="col-md-2 col-lg-2 text-center hidden-xs hidden-sm">
                        <label><strong>Hora inicia</strong></label>
                     </div>
                     <div class="col-md-2 col-lg-2 text-center hidden-xs hidden-sm">
                        <label><strong>Duración</strong></label>
                     </div>
                     <div class="col-md-5 col-lg-5 text-center hidden-xs hidden-sm">
                        <label><strong>Programas</strong></label>
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
                     <div class="col-md-2 col-lg-2 text-center">
                        <label class="hidden-md hidden-lg"><strong>Hora inicia</strong></label>
                        <div class="input-group">
                           <input id="nationalTime" type="text" class="form-control timepicker timepicker-24" name="nationalTime">
                           <span class="input-group-btn">
                              <button class="btn default" type="button">
                                 <i class="fa fa-clock-o"></i>
                              </button>
                           </span>
                        </div>
                     </div>
                     <div class="col-md-2 col-lg-2 text-center">
                        <label class="hidden-md hidden-lg"><strong>Duración</strong></label>
                        <select id="cboRunTime" class="form-control selectpicker show-tick" multiple data-selected-text-format="count > 3" data-count-selected-text="{0} seleccionados" name="runTime[]">
                           <option value="30">30 min.</option>
                           <option value="60">60 min.</option>
                           <option value="90">90 min.</option>
                           <option value="120">120 min.</option>
                        </select>
                     </div>
                     <div class="col-md-5 col-lg-5 text-center">
                        <label class="hidden-md hidden-lg"><strong>Programas</strong></label>
                        <select id="cboPrograms" class="form-control selectpicker show-tick" multiple data-selected-text-format="count > 3" data-count-selected-text="{0} seleccionados" name="programs[]">
                        </select>
                     </div>
                  </div>
               </div>
               <div class="form-actions">
                  <div class="row">
                     <div class="col-md-offset-9 col-md-3 text-right">
                        <button id="btnFilterDateTime" type="button" class="btn btn-success">
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
      <canvas id="dateTimePicker"></canvas>
   </div>
</div>
@endsection
@section('scripts')   
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="{{asset('js/datetimepickers.js')}}" type="text/javascript"></script>
@endsection