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
                        <link href="{{asset('assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" />
                        <link href="{{asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
                        <link href="{{asset('assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet" type="text/css" />
                        <link href="{{asset('assets/global/plugins/SpinKit/SpinKit.css')}}" rel="stylesheet" type="text/css" />
                        {{--<link rel="stylesheet" href="{{'css/globalMandatoryStyle.css'}}">--}}
                        <!-- END GLOBAL MANDATORY STYLES -->
                        <!-- BEGIN PAGE LEVEL PLUGINS -->
                        {{--<link rel="stylesheet" href="{{'css/pageLevelPluginStyle.css'}}">--}}
                        @yield('css')
                        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@7.26.10/dist/sweetalert2.min.css" rel="stylesheet" type="text/css" />
                        <link href="{{asset('assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
                        <link href="{{asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
                        <!-- END PAGE LEVEL PLUGINS -->
                        <!-- BEGIN THEME GLOBAL STYLES -->
                        {{--<link rel="stylesheet" href="{{'css/themeGlobalStyle.css'}}">--}}
                        <link href="{{asset('assets/global/css/components-md.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
                        <link href="{{asset('assets/global/css/plugins-md.min.css')}}" rel="stylesheet" type="text/css" />
                        <!-- END THEME GLOBAL STYLES -->
                        <!-- BEGIN PAGE LEVEL STYLES -->
                        <link href="{{asset('assets/pages/css/login-4.min.css')}}" rel="stylesheet" type="text/css" />
                        <!-- END PAGE LEVEL STYLES -->
                        <!-- DATATABLES -->
                        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.18/af-2.3.0/b-1.5.2/b-colvis-1.5.2/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.4.0/r-2.2.2/rg-1.0.3/rr-1.2.4/sc-1.5.0/sl-1.2.6/datatables.min.css"/>
                        <!-- END DATATABLES -->
                        <!-- BEGIN THEME LAYOUT STYLES -->
                        {{--<link rel="stylesheet" href="{{'css/themeLayoutStyle.css'}}">--}}
                        <link href="{{asset('css/mastertemplate.css')}}" rel="stylesheet" type="text/css">
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
                                          {{--<img alt="" class="img-circle" src="{{asset('assets/layouts/layout/img/avatar3_small.jpg')}}" />--}}
                                          <i class="fa fa-user-circle fa-5x" aria-hidden="true"></i>
                                          <span class="username username-hide-on-mobile"> Admin </span>
                                          <i class="fa fa-angle-down"></i>
                                          </a>
                                          <ul class="dropdown-menu dropdown-menu-default">
                                          {{--  <li>
                                                <a href="userprofile">
                                                <i class="icon-user"></i> Mi perfil</a>
                                          </li>  --}}
                                          <li class="divider"> </li>
                                          <li>
                                                <a href="{{route('logout')}}">
                                                <i class="icon-key"></i> Salir </a>
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
                                    <ul class="page-sidebar-menu  page-header-fixed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                                    <li class="sidebar-toggler-wrapper hide">
                                          <div class="sidebar-toggler">
                                          <span></span>
                                          </div>
                                    </li>
                                    <!-- END SIDEBAR TOGGLER BUTTON -->
                                    <li class="nav-item {{Request::is('admin/dashboard') ? 'start active' : 'null'}}">
                                          <a href="javascript:;" class="nav-link nav-toggle">
                                          <i class="icon-home"></i>
                                          <span class="title">Dashboard</span>
                                          <span class="selected"></span>
                                          <span class="arrow open"></span>
                                          </a>
                                          <ul class="sub-menu">
                                          <li class="nav-item {{Request::is('admin/dashboard') ? 'start active open' : 'null'}}">
                                                <a href="{{ route('dashboard') }}" class="nav-link ">
                                                <i class="icon-graph"></i>
                                                <span class="title">Dashboard</span>
                                                <span class="selected"></span>
                                                <span class="badge badge-danger">5</span>
                                                </a>
                                          </li>
                                          </ul>
                                    </li>
                                    <li class="heading">
                                          <h3 class="uppercase">Herramientas</h3>
                                    </li>
                                    <li class="nav-item {{Request::is('admin/users') ? 'start active' : 'null'}}">
                                          <a href="javascript:;" class="nav-link nav-toggle">
                                          <i class="fa fa-archive" aria-hidden="true"></i>
                                          <span class="title">Administrar</span>
                                          <span class="selected"></span>
                                          <span class="arrow"></span>
                                          </a>
                                          <ul class="sub-menu">
                                          <li class="nav-item {{Request::is('admin/users') ? 'start active open' : 'null'}}">
                                                <a href="{{ route('users') }}" class="nav-link ">
                                                <i class="fa fa-users" aria-hidden="true"></i>
                                                <span class="title">Usuarios</span>
                                                </a>
                                          </li>
                                          </ul>
                                    </li>
                                    <li class="nav-item {{Request::is('admin/datos/*') ? 'start active' : 'null'}}">
                                          <a href="javascript:;" class="nav-link nav-toggle">
                                          <i class="fa fa-database" aria-hidden="true"></i>
                                          <span class="title">Datos</span>
                                          <span class="selected"></span>
                                          <span class="arrow"></span>
                                          </a>
                                          <ul class="sub-menu">
                                          <li class="nav-item {{Request::is('admin/datos/importData') ? 'start active open' : 'null'}}">
                                                <a href="{{ route('importData') }}" class="nav-link ">
                                                <i class="fa fa-upload" aria-hidden="true"></i> 
                                                <span class="title">Importar Datos</span>
                                                </a>
                                          </li>
                                          </ul>
                                    </li>
                                    <li class="nav-item {{Request::is('admin/reports/*') ? 'start active' : 'null'}}">
                                          <a href="javascript:;" class="nav-link nav-toggle">
                                                <i class="fa fa-files-o" aria-hidden="true"></i>
                                                <span class="title">Reportes</span>
                                                <span class="selected"></span>
                                                <span class="arrow"></span>
                                          </a>
                                          <ul class="sub-menu">
                                                <li class="nav-item {{Request::is('admin/reports/datetimepickers') ? 'start active open' : 'null'}}">
                                                      <a href="{{ route('datetimepickers') }}" class="nav-link ">
                                                            <i class="fa fa-bar-chart" aria-hidden="true"></i> 
                                                            <span class="title">Day Time</span>
                                                      </a>
                                                </li>
                                                {{-- <li class="nav-item {{Request::is('admin/reports/mapaReport') ? 'start active open' : 'null'}}">
                                                      <a href="{{ route('mapaReport') }}" class="nav-link ">
                                                            <i class="fa fa-map" aria-hidden="true"></i> 
                                                            <span class="title">Report Map</span>
                                                      </a>
                                                </li> --}}
                                                <li class="nav-item {{Request::is('admin/reports/reportTable') ? 'start active open' : 'null'}}">
                                                      <a href="{{ route('reportTable') }}" class="nav-link ">
                                                            <i class="fa fa-table" aria-hidden="true"></i> 
                                                            <span class="title">Report Table</span>
                                                      </a>
                                                </li>
                                          </ul>
                                    </li>
                                    </ul>
                                    <!-- END SIDEBAR MENU -->
                                    <!-- END SIDEBAR MENU -->
                                    <!-- END SIDEBAR -->
                              </div>
                              </div>
                              <!-- END SIDEBAR -->
                              <!-- BEGIN CONTENT -->
                              <div class="page-content-wrapper">
                              <!-- BEGIN CONTENT BODY -->
                              <div class="page-content">
                                    <!-- BEGIN PAGE HEADER-->
                                    <!-- BEGIN PAGE TITLE-->
                                    <h1 class="page-title"> @yield('title')
                                    <small></small>
                                    </h1>
                                    <!-- END PAGE TITLE-->
                                    <!-- BEGIN PAGE BAR -->
                                    <div class="page-bar">
                                    <ul class="page-breadcrumb">
                                          <li>
                                          <a href="{{ route('dashboard') }}">Dashboard</a>
                                          <i class="fa fa-angle-right"></i>
                                          </li>
                                    </ul>
                                    {{-- <div class="page-toolbar">
                                    <div class="pull-right tooltips btn btn-fit-height green" data-placement="top">
                                          <i class="icon-calendar"></i>&nbsp;
                                          <span class="thin uppercase hidden-xs"></span>&nbsp;
                                          <i class="fa fa-angle-down"></i>
                                    </div>
                                    </div> --}}
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
                              <div class="page-footer-inner"> 2018 &copy; Dashboard Theme By
                              <a target="_blank" href="http://covenantsw.com">Covenant Software</a> &nbsp;|&nbsp;
                              {{-- <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a> --}}
                              </div>
                              <div class="scroll-to-top">
                              <i class="icon-arrow-up"></i>
                              </div>
                        </div>
                        <!-- END FOOTER -->
                        </div>
                        <!-- BEGIN CORE PLUGINS -->
                        {{--<script src="{{'js/corePlugins.js'}}"></script>--}}
                        <script src="{{asset('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
                        <script src="{{asset('assets/global/plugins/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
                        <script src="{{asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
                        <script src="{{asset('assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
                        <script src="{{asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
                        <script src="{{asset('assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
                        <script src="{{asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
                        <script src="{{asset('assets/global/plugins/Chart.min.js')}}" type="text/javascript"></script>
                        <script src="{{asset('assets/global/plugins/moment.js')}}" type="text/javascript"></script>
                        <script src="{{asset('assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js')}}" type="text/javascript"></script>
                        <script src="{{asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
                        <script src="{{asset('assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}" type="text/javascript"></script>
                        <script src="{{asset('assets/global/plugins/SpinKit/SpinKit.js')}}" type="text/javascript"></script>
                        <!-- END CORE PLUGINS -->
                        <!-- BEGIN PAGE LEVEL PLUGINS -->
                        {{--<script src="{{'js/pageLevelScript.js'}}"></script>--}}
                        <script src="{{asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
                        <script src="{{asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
                        <script src="{{asset('assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
                        <script src="{{asset('assets/global/plugins/backstretch/jquery.backstretch.min.js')}}" type="text/javascript"></script>
                        <!-- END PAGE LEVEL PLUGINS -->
                        <!-- BEGIN THEME GLOBAL SCRIPTS -->
                        <script src="{{asset('assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
                        <!-- END THEME GLOBAL SCRIPTS -->
                        <!-- BEGIN PAGE LEVEL SCRIPTS -->
                        <script src="{{asset('assets/global/plugins/bootstrap-growl/jquery.bootstrap-growl.min.js')}}" type="text/javascript"></script>
                        <script src="{{asset('assets/pages/scripts/components-date-time-pickers.min.js')}}" type="text/javascript"></script>
                        <script src="{{asset('assets/pages/scripts/ui-modals.min.js')}}" type="text/javascript"></script>
                        <script src="{{asset('assets/pages/scripts/ui-bootstrap-growl.min.js')}}" type="text/javascript"></script>
                        <!-- END PAGE LEVEL SCRIPTS -->
                        <!-- BEGIN THEME LAYOUT SCRIPTS -->
                        {{--<script src="{{'js/themeLayoutScript.js'}}"></script>--}}
                        <script src="{{asset('assets/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
                        <script src="{{asset('assets/layouts/layout/scripts/demo.min.js')}}" type="text/javascript"></script>
                        <script src="{{asset('assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
                        <!-- END THEME LAYOUT SCRIPTS -->

                        <!-- DATATABLES -->
                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
                        <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.18/af-2.3.0/b-1.5.2/b-colvis-1.5.2/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.4.0/r-2.2.2/rg-1.0.3/rr-1.2.4/sc-1.5.0/sl-1.2.6/datatables.min.js"></script>
                        <!-- END DATATABLES -->
                        <script src="{{asset('js/frameload.js')}}" type="text/javascript"></script>
                        <script src="{{asset('js/gets.js')}}" type="text/javascript"></script>
                        <script src="{{asset('js/binds.js')}}" type="text/javascript"></script>
                        <script src="{{asset('js/saves.js')}}" type="text/javascript"></script>
                        <script src="{{asset('js/tables/enum_columns.js')}}" type="text/javascript"></script>
                        <script src="{{asset('js/tables/enum_tables.js')}}" type="text/javascript"></script>
                        <script src="{{asset('js/tables/table-datatables-managed.js')}}" type="text/javascript"></script>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.26.10/dist/sweetalert2.min.js"></script>
                        @yield('scripts')
                  </body>
                  </html>