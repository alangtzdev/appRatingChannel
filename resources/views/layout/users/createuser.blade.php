@extends('templates.mastertemplate')
@section('title', 'Crear usuario')
@section('content-master')
<div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="portlet box green">
         <div class="portlet-title">
            <div class="caption">
               <i class="fa fa-user-plus"></i>Crear usuario
            </div>
            <div class="tools">
               <a href="" class="collapse" data-original-title="" title=""></a>
            </div>
         </div>
         <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="{{ route('registerusers') }}" class="frm_create_users" method="post">
               @csrf
               <div class="form-body">
                  <div class="panel panel-success">
                     <div class="panel-heading">
                        <h3 class="panel-title">Datos generales</h3>
                     </div>
                     <div class="panel-body">
                        <div class="row">
                           <div class="col-md-3 col-lg-3">
                              <div class="form-group form-md-line-input form-md-floating-label has-info">
                                 <input type="text" class="form-control" id="usuario" name="D_U[name]" maxlength="30">
                                 <label for="usuario">Nombre usuario</label>
                              </div>
                           </div>
                           <div class="col-md-3 col-lg-3">
                              <div class="form-group form-md-line-input form-md-floating-label has-info">
                                 <input type="text" class="form-control" id="email" name="D_U[email]" maxlength="100">
                                 <label for="email">Correo electronico</label>
                              </div>
                           </div>
                           <div class="col-md-3 col-lg-3">
                              <div class="form-group form-md-line-input form-md-floating-label has-info">
                                 <input type="password" class="form-control" id="contraseña" name="D_U[password]" maxlength="20">
                                 <label for="contraseña">Contraseña</label>
                              </div>
                           </div>
                           <div class="col-md-3 col-lg-3">
                              <div class="form-group form-md-line-input form-md-floating-label has-info">
                                 <select class="form-control" id="tipousuario" name="D_U[id_Rol]">
                                    <option value=""></option>
                                 </select>
                                 <label for="tipousuario">Tipo usuario</label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="panel panel-success">
                     <div class="panel-heading">
                        <h3 class="panel-title">Datos personales</h3>
                     </div>
                     <div class="panel-body">
                        <div class="row">
                           <div class="col-md-4 col-lg-4">
                              <div class="form-group form-md-line-input form-md-floating-label has-info">
                                 <input type="text" class="form-control" id="nombre" name="D_E[name]" maxlength="20">
                                 <label for="nombre">Nombre(s)</label>
                              </div>
                           </div>
                           <div class="col-md-4 col-lg-4">
                              <div class="form-group form-md-line-input form-md-floating-label has-info">
                                 <input type="text" class="form-control" id="apPaterno" name="D_E[apPaterno]" maxlength="20">
                                 <label for="apPaterno">Apellido paterno</label>
                              </div>
                           </div>
                           <div class="col-md-4 col-lg-4">
                              <div class="form-group form-md-line-input form-md-floating-label has-info">
                                 <input type="text" class="form-control" id="apMaterno" name="D_E[apMaterno]" maxlength="20">
                                 <label for="apMaterno">Apellido Materno</label>
                              </div>
                           </div>
                           <div class="col-md-4 col-lg-4">
                              <div class="md-radio-inline">
                                 <div class="md-radio">
                                    <input type="radio" id="rdMasculino" name="D_E[gender]" class="md-radiobtn" checked="" value="M">
                                    <label for="rdMasculino">
                                       <span></span>
                                       <span class="check"></span>
                                       <span class="box"></span>Masculino</label>
                                 </div>
                                 <div class="md-radio">
                                    <input type="radio" id="rdFemenino" name="D_E[gender]" class="md-radiobtn" value="F">
                                    <label for="rdFemenino">
                                       <span></span>
                                       <span class="check"></span>
                                       <span class="box"></span>Femenino</label>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-actions">
                  <div class="row">
                     <div class="col-md-offset-9 col-md-3 text-right">
                        <button type="submit" class="btn btn-success">
                           <i class="fa fa-check"></i> Aceptar
                        </button>
                        <a href="{{ route('users') }}" type="button" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</a>
                     </div>
                  </div>
               </div>
            </form>
            <!-- END FORM-->
         </div>
      </div>
   </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('js/userscreate.js')}}" type="text/javascript"></script>
@endsection