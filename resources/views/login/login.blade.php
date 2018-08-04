@extends('templates.logintemplate')
@section('title', 'Login')
@section('content-login')
<!-- BEGIN LOGIN FORM -->
<h3 class="form-title">Ingresa tu cuenta</h3>
<div class="alert alert-danger display-hide">
   <button class="close" data-close="alert"></button>
   <span> Enter any username and password. </span>
</div>
<form class="login-form" action="{{ route('postLogin') }}" method="post">
   {{ csrf_field() }}
   <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
      <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
      <label class="control-label visible-ie8 visible-ie9">Usuario</label>
      <div class="input-icon">
         <i class="fa fa-user"></i>
         <input class="form-control placeholder-no-fix" type="email" autocomplete="off" placeholder="Correo" id="email" name="email" value="{{ old('email')}}" /> </div>
         <span class="help-block">{{ $errors->first('email', ':message') }}</span>
   </div>
   <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
      <label class="control-label visible-ie8 visible-ie9">Contraseña</label>
      <div class="input-icon">
         <i class="fa fa-lock"></i>
         <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Contraseña" name="password" /> </div>
         <span class="help-block">{{ $errors->first('password', ':message') }}</span>
   </div>
   <div class="form-actions">
      <label class="rememberme mt-checkbox mt-checkbox-outline">
         <input type="checkbox" name="remember" value="{{ old('remember') ? 'checked' : ''}}" /> Recordarme
         <span></span>
      </label>
      <button type="submit" class="btn green pull-right"> Ingresar </button>
   </div>
</form>
<div class="forget-password">
   <h4>Olvidaste tu contraseña ?</h4>
   <p> no te preocupes, click
      <a href="restorepassword"> aqui </a> para reestablecer la contraseña </p>
</div>
<!-- END LOGIN FORM -->
@endsection