<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Mexicanal | @yield('title')</title>
      <link rel="stylesheet" href="">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width">
      <!-- BEGIN GLOBAL MANDATORY STYLES -->
      <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
      <link href="{{asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css"/>
      <link href="{{asset('assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
      <!-- END GLOBAL MANDATORY STYLES -->
      <!-- BEGIN PAGE LEVEL PLUGINS -->
      <link href="{{asset('assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
      <!-- END PAGE LEVEL PLUGINS -->
      <!-- BEGIN THEME GLOBAL STYLES -->
      <link href="{{asset('assets/global/css/components-md.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
      <link href="{{asset('assets/global/css/plugins-md.min.css')}}" rel="stylesheet" type="text/css" />
      <!-- END THEME GLOBAL STYLES -->
      <!-- BEGIN PAGE LEVEL STYLES -->
      <link href="{{asset('assets/pages/css/login-4.min.css')}}" rel="stylesheet" type="text/css" />
      <!-- END PAGE LEVEL STYLES -->
      <!-- BEGIN THEME LAYOUT STYLES -->
      <link href="{{asset('assets/layouts/layout/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/layouts/layout/css/themes/darkblue.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
      <link href="{{asset('assets/layouts/layout/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
      <!-- END THEME LAYOUT STYLES -->
      <link rel="shortcut icon" href="favicon.ico" />
   </head>

   <body class="page-header-fixed page-sidebar-closed-hide-logo page-md">
      <div class="page-wraper">
         <!-- BEGIN HEADER -->
         <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
               <!-- BEGIN LOGO -->
               <div class="page-logo">
                  <a href="index.html">
                     <img src="{{asset('assets/layouts/layout/img/logo.png')}}" alt="logo" class="logo-default" /> </a>
                  <div class="menu-toggler sidebar-toggler">
                     <span></span>
                  </div>
               </div>
               <!-- END LOGO -->
               <!-- BEGIN RESPONSIVE MENU TOGGLER -->
               <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                  <span></span>
               </a>
               <!-- END RESPONSIVE MENU TOGGLER -->
               <!-- BEGIN TOP NAVIGATION MENU -->
               <div class="top-menu">
                  <ul class="nav navbar-nav pull-right">
                     <!-- BEGIN USER LOGIN DROPDOWN -->
                     <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                           <img alt="" class="img-circle" src="{{asset('assets/layouts/layout/img/avatar3_small.jpg')}}" />
                           <span class="username username-hide-on-mobile"> Nick </span>
                           <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                           <li>
                              <a href="userprofile">
                                 <i class="icon-user"></i> My Profile </a>
                           </li>
                           <li class="divider"> </li>
                           <li>
                              <a href="lockscreen">
                                 <i class="icon-lock"></i> Lock Screen </a>
                           </li>
                           <li>
                              <a href="logout">
                                 <i class="icon-key"></i> Log Out </a>
                           </li>
                        </ul>
                     </li>
                     <!-- END USER LOGIN DROPDOWN -->
                  </ul>
               </div>
               <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
         </div>
         <!-- END HEADER -->
         <!-- BEGIN HEADER & CONTENT DIVIDER -->
         <div class="clearfix"> </div>
         <!-- END HEADER & CONTENT DIVIDER -->
         <!-- BEGIN CONTAINER -->
         <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
               <!-- BEGIN SIDEBAR -->
               <div class="page-sidebar navbar-collapse collapse">
                  <!-- BEGIN SIDEBAR MENU -->
                  <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                     <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                     <li class="sidebar-toggler-wrapper hide">
                        <div class="sidebar-toggler">
                           <span></span>
                        </div>
                     </li>
                     <!-- END SIDEBAR TOGGLER BUTTON -->
                     <li class="nav-item start active open">
                        <a href="javascript:;" class="nav-link nav-toggle">
                           <i class="icon-home"></i>
                           <span class="title">Dashboard</span>
                           <span class="selected"></span>
                           <span class="arrow open"></span>
                        </a>
                        <ul class="sub-menu">
                           <li class="nav-item start active open">
                              <a href="dashboard" class="nav-link ">
                                 <i class="icon-graph"></i>
                                 <span class="title">Dashboard 3</span>
                                 <span class="selected"></span>
                                 <span class="badge badge-danger">5</span>
                              </a>
                           </li>
                        </ul>
                     </li>
                     <li class="heading">
                        <h3 class="uppercase">Features</h3>
                     </li>
                     <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                           <i class="icon-diamond"></i>
                           <span class="title">UI Features</span>
                           <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                           <li class="nav-item  ">
                              <a href="dashboard" class="nav-link ">
                                 <span class="title">Color Library</span>
                              </a>
                           </li>
                        </ul>
                     </li>
                     <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                           <i class="icon-puzzle"></i>
                           <span class="title">Components</span>
                           <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                           <li class="nav-item  ">
                              <a href="dashboard" class="nav-link ">
                                 <span class="title">Date & Time Pickers</span>
                              </a>
                           </li>
                        </ul>
                     </li>
                  </ul>
                  <!-- END SIDEBAR MENU -->
                  <!-- END SIDEBAR MENU -->
               </div>
               <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
               <!-- BEGIN CONTENT BODY -->
               <div class="page-content">
                  <!-- BEGIN PAGE HEADER-->
                  <!-- BEGIN PAGE TITLE-->
                  <h1 class="page-title"> @yield('title')
                     <small>dashboard & statistics</small>
                  </h1>
                  <!-- END PAGE TITLE-->
                  <!-- BEGIN PAGE BAR -->
                  <div class="page-bar">
                     <ul class="page-breadcrumb">
                        <li>
                           <a href="index.html">Home</a>
                           <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                           <span>Dashboard</span>
                        </li>
                     </ul>
                     <div class="page-toolbar">
                        <div class="pull-right tooltips btn btn-fit-height green" data-placement="top" data-original-title="Change dashboard date range">
                           <i class="icon-calendar"></i>&nbsp;
                           <span class="thin uppercase hidden-xs"></span>&nbsp;
                           <i class="fa fa-angle-down"></i>
                        </div>
                     </div>
                  </div>
                  <!-- END PAGE BAR -->
                  <!-- END PAGE HEADER-->
                  @yield('content-master')
               </div>
               <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
         </div>
         <!-- END CONTAINER -->
         <!-- BEGIN FOOTER -->
         <div class="page-footer">
            <div class="page-footer-inner"> 2016 &copy; Metronic Theme By
               <a target="_blank" href="http://keenthemes.com">Keenthemes</a> &nbsp;|&nbsp;
               <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a>
            </div>
            <div class="scroll-to-top">
               <i class="icon-arrow-up"></i>
            </div>
         </div>
         <!-- END FOOTER -->
      </div>
      <!-- BEGIN CORE PLUGINS -->
      <script src="{{asset('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
      <script src="{{asset('assets/global/plugins/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
      <script src="{{asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
      <script src="{{asset('assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
      <script src="{{asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
      <script src="{{asset('assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
      <script src="{{asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
      <!-- END CORE PLUGINS -->
      <!-- BEGIN PAGE LEVEL PLUGINS -->
      <script src="{{asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
      <script src="{{asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
      <script src="{{asset('assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
      <script src="{{asset('assets/global/plugins/backstretch/jquery.backstretch.min.js')}}" type="text/javascript"></script>
      <!-- END PAGE LEVEL PLUGINS -->
      <!-- BEGIN THEME GLOBAL SCRIPTS -->
      <script src="{{asset('assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
      <!-- END THEME GLOBAL SCRIPTS -->
      <!-- BEGIN PAGE LEVEL SCRIPTS -->
      <!--      <script src="{{asset('assets/pages/scripts/dashboard.min.js')}}" type="text/javascript"></script>-->
      <!-- END PAGE LEVEL SCRIPTS -->
      <!-- BEGIN THEME LAYOUT SCRIPTS -->
      <script src="{{asset('assets/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
      <script src="{{asset('assets/layouts/layout/scripts/demo.min.js')}}" type="text/javascript"></script>
      <script src="{{asset('assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
      <!-- END THEME LAYOUT SCRIPTS -->
   </body>
</html>