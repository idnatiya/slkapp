@extends('index')

@section('titlepage', 'Laporan')

@section('content')
<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<form action="{{route('laporan.penjualan')}}" method="GET" target="_blank">@csrf
							<div class="row">
								<label class="col-md-2">Penjualan</label>
								<div class="col-md-2">
									<div class="input-group date" id="penjualan_date_start" data-target-input="nearest">
				                        <input type="text" name="tglpenjualn_start" class="form-control datetimepicker-input" data-target="#penjualan_date_start" data-toggle="datetimepicker"/>
				                        <div class="input-group-append" data-target="#penjualan_date_start" data-toggle="datetimepicker">
				                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
				                        </div>
				                    </div>
								</div>
								<div class="col-md-1" style="text-align: center;">
									<label>S/D</label>
								</div>
								<div class="col-md-2">
									<div class="input-group date" id="penjualan_date_end" data-target-input="nearest">
				                        <input type="text" name="tglpenjualn_end" class="form-control datetimepicker-input" data-target="#penjualan_date_end" data-toggle="datetimepicker"/>
				                        <div class="input-group-append" data-target="#penjualan_date_end" data-toggle="datetimepicker">
				                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
				                        </div>
				                    </div>
								</div>
								<div class="col-md-3"></div>
								<div class="col-md-2">
									<button type="submit" class="btn btn-md btn-info">Lihat</a>
								</div>
							</div>
						</form>
		                <hr>
		                <form action="{{route('laporan.laba')}}" method="GET" target="_blank">@csrf
		                	<div class="row">
								<label class="col-md-2">Laba</label>
								<div class="col-md-2">
									<div class="input-group date" id="laba_date_start" data-target-input="nearest">
				                        <input type="text" name="tglpenjualn_start" class="form-control datetimepicker-input" data-target="#laba_date_start" data-toggle="datetimepicker"/>
				                        <div class="input-group-append" data-target="#laba_date_start" data-toggle="datetimepicker">
				                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
				                        </div>
				                    </div>
								</div>
								<div class="col-md-1" style="text-align: center;">
									<label>S/D</label>
								</div>
								<div class="col-md-2">
									<div class="input-group date" id="laba_date_end" data-target-input="nearest">
				                        <input type="text" name="tglpenjualn_end" class="form-control datetimepicker-input" data-target="#laba_date_end" data-toggle="datetimepicker"/>
				                        <div class="input-group-append" data-target="#laba_date_end" data-toggle="datetimepicker">
				                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
				                        </div>
				                    </div>
								</div>
								<div class="col-md-3"></div>
								<div class="col-md-2">
									<button type="submit" class="btn btn-md btn-info">Lihat</button>
								</div>
		                	</div>
		                </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


@push('js-datatable')
<script type="text/javascript">
	$(document).ready(function() {

		$('#penjualan_date_start').datetimepicker({
	        format: 'DD/MM/YYYY'
	    });

	    $('#penjualan_date_end').datetimepicker({
	        format: 'DD/MM/YYYY'
	    });

	    $('#laba_date_start').datetimepicker({
	        format: 'DD/MM/YYYY'
	    });

	    $('#laba_date_end').datetimepicker({
	        format: 'DD/MM/YYYY'
	    });
	});
</script>
@endpush

@endsection



