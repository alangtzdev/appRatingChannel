@extends('templates.logintemplate')
@section('title', 'Login')
@section('content-login')
<!-- BEGIN LOGIN FORM -->
<form class="login-form" action="index.html" method="post">
   <h3 class="form-title">Ingresa tu cuenta</h3>
   <div class="alert alert-danger display-hide">
      <button class="close" data-close="alert"></button>
      <span> Enter any username and password. </span>
   </div>
   <div class="form-group">
      <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
      <label class="control-label visible-ie8 visible-ie9">Usuario</label>
      <div class="input-icon">
         <i class="fa fa-user"></i>
         <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Usuario" name="username" /> </div>
   </div>
   <div class="form-group">
      <label class="control-label visible-ie8 visible-ie9">Contraseña</label>
      <div class="input-icon">
         <i class="fa fa-lock"></i>
         <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Contraseña" name="password" /> </div>
   </div>
   <div class="form-actions">
      <label class="rememberme mt-checkbox mt-checkbox-outline">
         <input type="checkbox" name="remember" value="1" /> Recordarme
         <span></span>
      </label>
      <a href="{{ route('dashboard')}}" class="btn green pull-right"> Ingresar </a>
   </div>
   <div class="forget-password">
      <h4>Olvidaste tu contraseña ?</h4>
      <p> no te preocupes, click
         <a href="restorepassword"> aqui </a> para reestablecer la contraseña </p>
   </div>
</form>
<!-- END LOGIN FORM -->
@endsection