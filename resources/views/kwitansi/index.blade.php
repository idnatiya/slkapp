@extends('index')

@section('titlepage', 'Setting Kwitansi')

@section('content')
<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<!-- /.card-header -->
					<div class="card-body">
						<form action="{{ route('kwitansi.store') }}" method="POST" id="createForm" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label>Logo<span class="required"></span></label>
							
							<input type="file" name="logo" class="form-control" placeholder="*Logo Kwitansi">							
						</div>
						<div class="form-group">
							@if($gambar == "masih kosong")
								<label>Logo Belum Di Set</label>
							@else
								<div class="col-6">
									<img src="{{url('images')}}\{{$gambar}}" class="img-fluid" />	
								</div>								

							@endif
						</div>

						<div class="form-group">
							<label>Alamat<span class="required"></span></label>
							<textarea class="form-control" name="alamat">{{$alamat}}</textarea>
						</div>

						

						<div class="form-group">
							<button class="btn btn-md btn-success">Simpan</button>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection
