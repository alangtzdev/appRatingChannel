@extends('templates.mastertemplate')
@section('title', 'Importar datos')
@section('css')
<!-- import scripts that you needed -->
<link href="{{asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('content-master')
<div class="row">
    <div class="col-md-12">
        <div class="portlet box purple">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-star"></i>Cargar los datos de ratings</div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="{{ route('importarDatosExcel') }}" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data"> @csrf
 
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('error') }}</p>
                        </div>
                    @endif
     
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Agregar archivo de excel</label>
                            <div class="col-md-6">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="input-group input-large">
                                        <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                            <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                            <span class="fileinput-filename"> </span>
                                        </div>
                                        <span class="input-group-addon btn default btn-file">
                                            <span class="fileinput-new">Seleccionar archivo...</span>
                                            <span class="fileinput-exists"> Cambiar </span>
                                            <input type="file" name="fileTransmition" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" /> </span>
                                        <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">Remover </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-5 col-md-4">
                                <button href="javascript:;" class="btn green">
                                    <i class="fa fa-check"></i> Subir archivo</button>
                                <a href="javascript:;" class="btn btn-outline grey-salsa">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- body of content -->
@endsection
@section('scripts')  
<script src="{{asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script> 
    <!-- <link href="{{asset('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/> -->
<!-- more scripts -->
@endsection