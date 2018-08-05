@extends('templates.mastertemplate')
@section('title', 'Usuarios')
@section('content-master')
<div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <a href="{{ route('usercreate' )}}" class="btn blue"> Crear usuario </a>
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
<!-- ALERTS -->
@include('layout.alerts')
<!-- END ALERTS -->
@endsection
@section('scripts')
<script src="{{asset('js/users.js')}}" type="text/javascript"></script>
@endsection