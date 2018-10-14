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
                <form action="#" class="form-horizontal form-bordered" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
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
                                            <input type="file"
                                            id="fileTransmition"
                                            name="fileTransmition" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" /> </span>
                                        <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">Remover </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-9 col-md-3 text-right">
                                <button id="btnImportDatos" type="button" class="btn btn-success">
                                    <i class="fa fa-check"></i> Subir archivo</button>
                                <button type="button" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancel</button>
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
<script src="{{asset('js/importDatos.js')}}" type="text/javascript"></script>
    <!-- <link href="{{asset('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/> -->
<!-- more scripts -->
@endsection