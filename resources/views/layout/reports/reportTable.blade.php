@extends('templates.mastertemplate')
@section('title', 'Reporte Tabla')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<style>
	 .table.dataTable thead tr {
		  background-color: green;
	 }
</style>

@endsection
@section('content-master')
<div class="row">
	 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		  <div class="portlet box yellow-gold">
				<div class="portlet-title">
					 <div class="caption">
						  <i class="fa fa-filter"></i>Filtros
					 </div>
					 <div class="tools">
						  <a href="" class="collapse" data-original-title="" title=""></a>
					 </div>
				</div>
				<div class="portlet-body form">
					 <!-- BEGIN FORM-->
					 <form action="{{ route('reporttime') }}" class="form-horizontal form-bordered frm_time_table" method="post">
						  <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
						  <div class="form-body">
								<div class="form-group">
									 <div class="col-md-3 col-lg-3 text-center hidden-xs hidden-sm">
										  <label><strong>Meses</strong></label>
									 </div>
								</div>
								<div class="form-group last">
									 <div class="col-md-3 col-lg-3 text-center">
										  <div class="input-group">
												<input id="dateRange" type="text" name="daterange" class="form-control" />
												<span class="input-group-btn">
													 <button class="btn default" type="button">
														  <i class="fa fa-calendar"></i>
													 </button>
												</span>
										  </div>
									 </div>
								</div>
						  </div>
						  <div class="form-actions">
								<div class="row">
									 <div class="col-md-offset-9 col-md-3 text-right">
										  <button id="btnFilterReportTime" type="submit" class="btn btn-success">
												<i class="fa fa-check"></i> Aceptar
										  </button>
										  <button type="button" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancel</button>
									 </div>
								</div>
						  </div>
					 </form>
					 <!-- END FORM-->
				</div>
		  </div>
	 </div>
</div>
@if (Session::has('datas'))
<div class="row">
	 <div class="col-md-12 col-lg-12">
		 @foreach (Session::get('datas')->all() as $datas)
		  <div class="table-scrollable">
			  <table class="table table-striped table-bordered table-advance table-hover">
				  <thead class="" >
					  <tr>
						  <th class="text-center"> HORA\DIA</th>
						  @foreach ($datas['Days'] as $day)
						  <th class="text-center">{{ $day }}</th>
						  @endforeach
						</tr>
					</thead>
					<tbody>
						@foreach ($datas['Times'] as $time)
						<tr>
							<td>
								<p><strong> {{ $time }} </strong></p>
							</td>
							@foreach ($datas['Datos'] as $datos)
							<td>
								@foreach ($datos['dayDatas'] as $dayDatas)
									@if($dayDatas['time'] == $time)
										@foreach ($dayDatas['timeDatas'] as $timeDatas)
											<div class="mt-element-ribbon bg-grey-steel">
                                                <div class="ribbon ribbon-border-hor ribbon-clip ribbon-color-success uppercase">
                                                    <div class="ribbon-sub ribbon-clip"></div>{{ $timeDatas['AA'] }}</div>
                                                <p class="ribbon-content">{{ $timeDatas['program'] }}</p>
                                            </div>
										@endforeach
									@endif
								@endforeach
							</td>
							@endforeach
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			@endforeach
		</div>
	</div>
	@endif
	@endsection
	@section('scripts')   
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	<script src="{{asset('js/reportTable.js')}}" type="text/javascript"></script>
	@endsection