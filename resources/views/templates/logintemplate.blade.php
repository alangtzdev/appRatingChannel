<!DOCTYPE html>
<html>
   <!-- BEGIN HEAD -->
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Mexicanal | @yield('title')</title>
      <link rel="stylesheet" href="">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1" name="viewport">
      <!-- BEGIN GLOBAL MANDATORY STYLES -->
      <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="{{'css/globalMandatoryStyle.css'}}">
      <link href="{{asset('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
      <link href="{{asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css"/>
      <!-- END GLOBAL MANDATORY STYLES -->
      <!-- BEGIN PAGE LEVEL PLUGINS -->
      <link rel="stylesheet" href="{{'css/pageLevelPluginStyle.css'}}">
      <!-- END PAGE LEVEL PLUGINS -->
      <!-- BEGIN THEME GLOBAL STYLES -->
      <link rel="stylesheet" href="{{'css/themeGlobalStyle.css'}}">
      <!-- END THEME GLOBAL STYLES -->
      <!-- BEGIN PAGE LEVEL STYLES -->
      <link href="{{asset('assets/pages/css/login-4.min.css')}}" rel="stylesheet" type="text/css" />
      <!-- END PAGE LEVEL STYLES -->
      <!-- BEGIN THEME LAYOUT STYLES -->
      <!-- END THEME LAYOUT STYLES -->
      <link rel="shortcut icon" href="favicon.ico" />
   </head>

   <body class="login">
      <!-- BEGIN LOGO -->
      <div class="logo">
         <a href="index.html">
            <img src="{{asset('assets/pages/img/logo-big_.png')}}" alt="" /> </a>
      </div>
      <!-- END LOGO -->
      <div class="content">
         @yield('content-login')
      </div>
      <!-- BEGIN COPYRIGHT -->
      <div class="copyright"> 2018 &copy; Covenant Software - Admin Dashboard. </div>
      <!-- END COPYRIGHT -->
      <!-- BEGIN CORE PLUGINS -->
      <script src="{{'js/corePlugins.js'}}"></script>
      <!-- END CORE PLUGINS -->
      <!-- BEGIN PAGE LEVEL PLUGINS -->
      <script src="{{'js/pageLevelScript.js'}}"></script>      
      <!-- END PAGE LEVEL PLUGINS -->
      <!-- BEGIN THEME GLOBAL SCRIPTS -->
      <script src="{{asset('assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
      <!-- END THEME GLOBAL SCRIPTS -->
      <!-- BEGIN PAGE LEVEL SCRIPTS -->
      <script src="{{asset('assets/pages/scripts/login-4.min.js')}}" type="text/javascript"></script>
      <!-- END PAGE LEVEL SCRIPTS -->
      <!-- BEGIN THEME LAYOUT SCRIPTS -->
      <!-- END THEME LAYOUT SCRIPTS -->
   </body>
</html>