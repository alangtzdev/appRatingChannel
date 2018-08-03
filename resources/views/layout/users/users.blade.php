@extends('templates.mastertemplate')
@section('title', 'Usuarios')
@section('content-master')
<div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <a class="btn purple btn-outline sbold" data-toggle="modal" href="#mdUser" data-action="create"> Crear usuario </a>
   </div>
</div>
<br>
<div class="row">
   <div class="col-md-12 col-lg-12">
      <table id="tableUsers" class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" role="grid" aria-describedby="sample_1_info">
         <thead>
         </thead>
         <tbody id="tooltip">
         </tbody>
      </table>
   </div>
</div>

<!-- modal user -->
<div class="modal fade bs-modal-lg" id="mdUser" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
   <div class="modal-dialog modal-lg">
      <form action="/registerusers" id="frm_users" method="post">
         @csrf
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
               <h4 class="modal-title"><i class="fa fa-address-card-o" aria-hidden="true"></i> Usuarios</h4>
            </div>
            <div class="modal-body">
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
                              <label for="nombre">Nombre completo</label>
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
                                 <input type="radio" id="rdFemenino" name="D_E[sexo]" class="md-radiobtn" value="F">
                                 <label for="rdFemenino">
                                    <span></span>
                                    <span class="check"></span>
                                    <span class="box"></span>Femenino</label>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                           <div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
                              <input type="text" class="form-control" name="D_E[dateBirth]" id="dateBirth">
                              <span class="input-group-btn">
                                 <button class="btn default" type="button">
                                    <i class="fa fa-calendar"></i>
                                 </button>
                              </span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn green">Aceptar</button>
               <button type="button" class="btn dark btn-outline" data-dismiss="modal">Cerrar</button>
            </div>
         </div>
         <!-- /.modal-content -->
      </form>
      <!-- /.form -->
   </div>
   <!-- /.modal-dialog -->
</div>
@include('layout.alerts')
<!-- /.modal -->
@endsection
@section('scripts')
<script src="{{asset('js/users.js')}}" type="text/javascript"></script>
@endsection