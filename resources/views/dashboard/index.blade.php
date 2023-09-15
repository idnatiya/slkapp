@extends('index')

@section('titlepage', 'Dashboard')

@section('content')
	<div class="row">
		@foreach ($boxs as $row)
			<div class="col-12 col-sm-6 col-md-3">
				<div class="info-box">
					<span class="info-box-icon bg-{{ $row['class'] }} elevation-1"><i class="ion ion-stats-bars"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">{{ $row['title'] }}</span>
						<span class="info-box-number">
							{{ display_currency($row['total']) }}
						</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
		@endforeach 
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card card-grafik">
				<div class="card-header d-flex p-0">
					<span class="p-2"><strong>GRAFIK ARUS KAS</strong></span>
					<ul class="nav nav-pills ml-auto">
						<li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Rentang Tanggal</a></li>
						<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Bulan</a></li>
					</ul>
				</div>
				<div class="card-body">
					<div class="tab-content">
						<div class="tab-pane active" id="tab_1">
							<div class="row">
								<div class="col-lg-12">
									<form class="form-inline mb-3" action="{{ route('dashboard.day') }}" id="formDay" method="POST">
										@csrf
										<div class="form-group">
											<div class="input-group input-group-sm">
												<input type="date" value="{{ date('Y-m-d', strtotime('-7 days')) }}" class="form-control form-control-sm" name="start">
												<div class="input-group-append">
													<span class="input-group-text" id="basic-addon1">s/d</span>
												</div>
												<input type="date" value="{{ date('Y-m-d', strtotime('+1 days')) }}" class="form-control form-control-sm" name="end">
											</div>
										</div>
										<button class="btn btn-sm btn-danger">
											<i class="fa fa-fw fa-search"></i> Lihat data
										</button>
									</form>
								</div>
							</div>
							<div id="day">
								
							</div>
						</div>
						<div class="tab-pane" id="tab_2">
							<div class="row">
								<div class="col-lg-12">
									<form class="form-inline mb-3" action="{{ route('dashboard.month') }}" id="formMonth" method="POST">
										@csrf
										<div class="form-group">
											<select name="year" class="form-control">
												@for ($a = 2020; $a <= 2020; $a++)
													<option value="{{ $a }}" {{ ($a == date('Y')) ? 'selected' : '' }}>{{ $a }}</option>
												@endfor
											</select>
										</div>
										<button class="btn btn-sm btn-danger">
											<i class="fa fa-fw fa-search"></i> Lihat data
										</button>
									</form>
								</div>
							</div>
							<div id="month">
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection	

@push('js-datatable')
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>
	<script src="https://code.highcharts.com/modules/accessibility.js"></script>
	<script type="text/javascript">

		/**
		 * Day Grafik 
		 *
		 * @return void
		 */
		$('#formDay').on('submit', function(e) {
			e.preventDefault(); 
			var formAction = $(this).attr('action'); 
			var formMethod = $(this).attr('method'); 
			var formData = $(this).serialize(); 
			$.ajax({
				url: formAction, 
				method: formMethod, 
				data: formData
			})
			.done(function(res) {
				Highcharts.chart('day', {
				    chart: {
				        type: 'area'
				    },
				    title: {
				        text: ''
				    },
				    xAxis: {
				        categories: res.categories,
				        crosshair: true
				    },
				    yAxis: {
				        min: 0,
				        title: {
				            text: 'Rupiah (Rp.)'
				        }
				    },
				    series: res.series
				});
			}); 
		}); 

		/**
		 * Day Grafik 
		 *
		 * @return void
		 */
		$('#formMonth').on('submit', function(e) {
			e.preventDefault(); 
			var formAction = $(this).attr('action'); 
			var formMethod = $(this).attr('method'); 
			var formData = $(this).serialize(); 
			$.ajax({
				url: formAction, 
				method: formMethod, 
				data: formData
			})
			.done(function(res) {
				Highcharts.chart('month', {
				    chart: {
				        type: 'area'
				    },
				    title: {
				        text: ''
				    },
				    xAxis: {
				        categories: res.categories,
				        crosshair: true
				    },
				    yAxis: {
				        min: 0,
				        title: {
				            text: 'Rupiah (Rp.)'
				        }
				    },
				    series: res.series
				});
			}); 
		}); 

		/**
		 * Submit Form Day 
		 */
		$('#formDay').submit(); 
		$('#formMonth').submit(); 

	</script>
@endpush