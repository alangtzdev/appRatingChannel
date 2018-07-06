@extends('templates.logintemplate')
@section('title', 'Login')
@section('content-login')
<!-- BEGIN LOGIN FORM -->
<form class="login-form" action="index.html" method="post">
   <h3 class="form-title">Login to your account</h3>
   <div class="alert alert-danger display-hide">
      <button class="close" data-close="alert"></button>
      <span> Enter any username and password. </span>
   </div>
   <div class="form-group">
      <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
      <label class="control-label visible-ie8 visible-ie9">Username</label>
      <div class="input-icon">
         <i class="fa fa-user"></i>
         <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" /> </div>
   </div>
   <div class="form-group">
      <label class="control-label visible-ie8 visible-ie9">Password</label>
      <div class="input-icon">
         <i class="fa fa-lock"></i>
         <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
   </div>
   <div class="form-actions">
      <label class="rememberme mt-checkbox mt-checkbox-outline">
         <input type="checkbox" name="remember" value="1" /> Remember me
         <span></span>
      </label>
      <a href="dashboard" class="btn green pull-right"> Login </a>
   </div>
   <div class="forget-password">
      <h4>Forgot your password ?</h4>
      <p> no worries, click
         <a href="restorepassword"> here </a> to reset your password. </p>
   </div>
   <div class="create-account">
      <p> Don't have an account yet ?&nbsp;
         <a href="createacount"> Create an account </a>
      </p>
   </div>
</form>
<!-- END LOGIN FORM -->
@endsection