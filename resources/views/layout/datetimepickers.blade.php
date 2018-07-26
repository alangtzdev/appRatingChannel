@extends('templates.mastertemplate')
@section('title', 'Date & Time Pickers')
@section('bar', 'Date & Time Pickers')
@section('content-master')
<div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="portlet box green">
         <div class="portlet-title">
            <div class="caption">
               <i class="fa fa-gift"></i>Filters
            </div>
            <div class="tools">
               <a href="" class="collapse" data-original-title="" title=""><i class="fa fa-window-minimize" aria-hidden="true"></i></a>
            </div>
         </div>
         <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="#" class="form-horizontal form-bordered">
               <div class="form-body">
                  <div class="form-group">
                     <div class="col-md-2 col-lg-2 text-center"></div>
                     <div class="col-md-2 col-lg-2 text-center">
                        <label>Año</label>
                     </div>
                     <div class="col-md-2 col-lg-2 text-center">
                        <label>Meses</label>
                     </div>
                     <div class="col-md-2 col-lg-2 text-center">
                        <label>Hora inicia</label>
                     </div>
                     <div class="col-md-2 col-lg-2 text-center">
                        <label>Duración</label>
                     </div>
                     <div class="col-md-2 col-lg-2 text-center">
                        <label>Programas</label>
                     </div>
                  </div>
                  <div class="form-group last">
                     <div class="col-md-2 col-lg-2 text-center"></div>
                     <div class="col-md-2 col-lg-2 text-center">
                        <select class="btn-group bootstrap-select show-tick bs-select form-control selectpicker">
                           <option>2018</option>
                        </select>
                     </div>
                     <div class="col-md-2 col-lg-2 text-center">
                        <select class="btn-group bootstrap-select show-tick bs-select form-control selectpicker" multiple>
                           <option>Enero</option>
                           <option>Febrero</option>
                           <option>Marzo</option>
                           <option>Abril</option>
                           <option>Mayo</option>
                           <option>Junio</option>
                           <option>Julio</option>
                           <option>Agosto</option>
                           <option>Septiembre</option>
                           <option>Octubre</option>
                           <option>Noviembre</option>
                           <option>Diciembre</option>
                        </select>
                     </div>
                     <div class="col-md-2 col-lg-2 text-center">
                        <div class="input-group">
                           <input type="text" class="form-control timepicker timepicker-24">
                           <span class="input-group-btn">
                              <button class="btn default" type="button">
                                 <i class="fa fa-clock-o"></i>
                              </button>
                           </span>
                        </div>
                     </div>
                     <div class="col-md-2 col-lg-2 text-center">
                        <select class="btn-group bootstrap-select show-tick bs-select form-control selectpicker" multiple>
                           <option>30 min.</option>
                           <option>60 min.</option>
                        </select>
                     </div>
                     <div class="col-md-2 col-lg-2 text-center">
                        <select class="btn-group bootstrap-select show-tick bs-select form-control selectpicker" multiple>
                           <option>Programa 1</option>
                           <option>Programa 2</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="form-actions">
                  <div class="row">
                     <div class="col-md-offset-9 col-md-3 text-right">
                        <button type="submit" class="btn red">
                           <i class="fa fa-check"></i> Aceptar
                        </button>
                        <button type="button" class="btn default">Cancel</button>
                     </div>
                  </div>
               </div>
            </form>
            <!-- END FORM-->
         </div>
      </div>
   </div>
</div>
</div>
@endsection