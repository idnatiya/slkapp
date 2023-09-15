@extends('index')

@section('titlepage', 'Konfigurasi')

@section('content')
<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<form action="{{ route('konfigurasi.update') }}" method="POST">
					@method('PATCH')
					@csrf
					@if (request()->status == 'success')
						<div class="alert alert-success">
							Data Berhasil Disimpan
						</div>
					@endif
					<div class="card">
						<!-- /.card-header -->
						<div class="card-body">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label>Minimal Pembelian Grosir</label>
										<input type="number" name="input[minimal_pembelian_grosir]" value="{{ $konfigurasi->getConfig('minimal_pembelian_grosir') }}" class="form-control">
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<button class="btn btn-primary">
								<i class="fa fa-fw fa-save"></i> Simpan
							</button>
						</div> 
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection