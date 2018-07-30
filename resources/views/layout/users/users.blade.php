@extends('templates.mastertemplate')
@section('title', 'Usuarios')
@section('content-master')
<div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <a class="btn purple btn-outline sbold" data-toggle="modal" href="#mdUser"> Crear usuario </a>
   </div>
</div>

<!-- modal user -->
<div class="modal fade bs-modal-lg" id="mdUser" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
   <div class="modal-dialog modal-lg">
      <form action="/registerUsers" id="frm_users" method="post">
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
                        <div class="col-md-4 col-lg-4">
                           <div class="form-group form-md-line-input form-md-floating-label has-info">
                              <input type="text" class="form-control" id="usuario" name="D_U[usuario]" maxlength="30">
                              <label for="usuario">Nombre usuario</label>
                           </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                           <div class="form-group form-md-line-input form-md-floating-label has-info">
                              <input type="text" class="form-control" id="email" name="D_U[email]" maxlength="100">
                              <label for="email">Correo electronico</label>
                           </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                           <div class="form-group form-md-line-input form-md-floating-label has-info">
                              <select class="form-control" id="tipousuario" name="D_U[tipousuario]">
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
                              <input type="text" class="form-control" id="nombre" name="D_E[nombre]" maxlength="20">
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
                              <label for="nombre">Apellido Materno</label>
                           </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                           <div class="md-radio-inline">
                              <div class="md-radio">
                                 <input type="radio" id="rdMasculino" name="D_E[sexo]" class="md-radiobtn" checked="" value="M">
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
                              <input type="text" class="form-control" name="D_E[fechanacimiento]">
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

@if(session('info'))
<div class="alert alert-success">
   {{ session('info') }}
</div>
@endif
<!-- /.modal -->
@endsection
@section('scripts')
<script src="{{asset('js/users.js')}}" type="text/javascript"></script>
@endsection