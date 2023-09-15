@extends('index')

@section('titlepage', 'Master Barang')

@section('content')
<!-- Main content -->
<section class="content">
	<div class="container-fluid view-sm">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="#" data-toggle="modal" data-target="#createModal" class="btn btn-primary">
							<i class="fa fa-fw fa-plus"></i> Tambah
						</a>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="master-barang-datatable" class="table table-bordered table-striped" style="width: 100%;">
							<thead>
								<tr>
									<th>#ID</th>
									<th>Nama Barang</th>
									<th>Harga Beli</th>
									<th>Harga Jual</th>
									<th>Harga Jual Grosir</th>
									<th>Minimal Stok</th>
									<th>Stok</th>
									<th>Terjual</th>
									<th>Laba</th>
									<th style="width: 60px;">Aksi</th>
								</tr>
								<tbody>

								</tbody>
							</thead>
						</table>
						<div class="card">
							<div class="card-header">
								<strong>Grafik Rekapitulasi Laba / Barang</strong>
							</div>
							<div class="card-body">
								<div id="statistik"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form action="{{ url('master-barang') }}" method="POST" id="createForm">
				@csrf
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Master Barang</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Nama Barang<span class="required">*</span></label>
								<input type="text" name="nama" class="form-control" placeholder="* Nama Barang" required autocomplete="off">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Kategori Barang<span class="required">*</span></label>
								<select name="master_barang_kategori_id" class="form-control" required>
									<option value="">Pilih Kategori</option>
									@foreach ($master_barang_kategori as $row)
										<option value="{{ $row->id }}">{{ $row->nama }}</option>
									@endforeach 
								</select>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Satuan<span class="required">*</span></label>
								<input type="text" name="satuan" class="form-control" placeholder="* Satuan" required autocomplete="off">
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Harga Beli<span class="required">*</span></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Rp.</span>
									</div>
									<input type="text" name="harga_beli" class="form-control input-mask-currency" placeholder="Harga Beli" autocomplete="off" required>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Harga Jual<span class="required">*</span></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Rp.</span>
									</div>
									<input type="text" name="harga_jual" class="form-control input-mask-currency" autocomplete="off" placeholder="Harga Jual" required>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Harga Jual Grosir<span class="required">*</span></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Rp.</span>
									</div>
									<input type="text" name="harga_jual_grosir" class="form-control input-mask-currency" autocomplete="off" placeholder="Harga Jual Grosir" required>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label>Minimal Stok<span class="required">*</span></label>
								<input type="number" name="min_stok" class="form-control" placeholder="* Minimal Stok" required autocomplete="off">
								<small class="form-text text-muted">**Akan ada notifikasi di aplikasi apabila stok barang dibawah minimal.</small>
							</div>
						</div>
					</div>
					<div class="alert alert-success" id="notifSuccess" style="display: none;">
						{{ __('Data berhasil disimpan') }}
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form action="" method="POST" id="editForm">
				@csrf
				@method('PUT')
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Kategori Master Barang</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Nama Barang<span class="required">*</span></label>
								<input type="text" name="nama" class="form-control" placeholder="* Nama Barang" required autocomplete="off">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Kategori Barang<span class="required">*</span></label>
								<select name="master_barang_kategori_id" class="form-control" required>
									<option value="">Pilih Kategori</option>
									@foreach ($master_barang_kategori as $row)
										<option value="{{ $row->id }}">{{ $row->nama }}</option>
									@endforeach 
								</select>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Satuan<span class="required">*</span></label>
								<input type="text" name="satuan" class="form-control" placeholder="* Satuan" required autocomplete="off">
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Harga Beli<span class="required">*</span></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Rp.</span>
									</div>
									<input type="text" name="harga_beli" class="form-control input-mask-currency" autocomplete="off" placeholder="Harga Beli" required>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Harga Jual<span class="required">*</span></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Rp.</span>
									</div>
									<input type="text" name="harga_jual" class="form-control input-mask-currency" autocomplete="off" placeholder="Harga Jual" required>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Harga Jual Grosir<span class="required">*</span></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Rp.</span>
									</div>
									<input type="text" name="harga_jual_grosir" class="form-control input-mask-currency" autocomplete="off" placeholder="Harga Jual Grosir" required>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label>Minimal Stok<span class="required">*</span></label>
								<input type="number" name="min_stok" class="form-control" placeholder="* Minimal Stok" required autocomplete="off">
								<small class="form-text text-muted">**Akan ada notifikasi di aplikasi apabila stok barang dibawah minimal.</small>
							</div>
						</div>
					</div>
					<div class="alert alert-success" id="notifSuccess" style="display: none;">
						{{ __('Data berhasil disimpan') }}
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{ url('master-barang/destroy') }}" method="POST" id="deleteForm">
				@csrf
				@method('DELETE')
				<input type="hidden" name="id">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Apakah anda yakin akan menghapus data?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-danger">Ya, saya yakin ! </button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

@push('css-datatable')
	<!-- DataTables -->
	<link rel="stylesheet" href="{{asset('admin_lte')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="{{asset('admin_lte')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endpush

@push('js-datatable')
	<!-- DataTables -->
	<script src="{{asset('admin_lte')}}/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="{{asset('admin_lte')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="{{asset('admin_lte')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="{{asset('admin_lte')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
	<!-- Highchart -->
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>
	<script src="https://code.highcharts.com/modules/accessibility.js"></script>
	<!-- page script -->
	<script type="text/javascript">
		$(function () {

			$('body').addClass("sidebar-collapse"); 

			$.ajax({
				url: '{{ route("master_barang.statistik") }}',
				method: 'POST', 
				data: {
					_token: '{{ csrf_token() }}'
				}
			})
			.done(function(res) {
				Highcharts.chart('statistik', {
				    chart: {
				        type: 'column'
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

			$('.input-mask-currency').inputmask({ 
				alias : "currency", 
				prefix: '',
				digits: 0, 
				groupSeparator: '.' 
			}); 

			/**
			 * Load Table Data 
			 * 
			 * @type DataTable
			 */
			var table = $('#master-barang-datatable').DataTable({
				processing: true,
				serverSide: true,
				ajax: '{{ url("master-barang-datatables") }}',
				columns: [
					{ data: 'id', name: 'Id'},
					{ data: 'nama', name: 'Nama Barang'},
					{ data: 'harga_beli', name: 'Harga Beli' },
					{ data: 'harga_jual', name: 'Harga Jual' },
					{ data: 'harga_jual_grosir', name: 'Harga Jual Grosir' },
					{ data: 'min_stok', name: 'Minimal Stok' },
					{ data: 'stok', name: 'Stok Saat Ini' },
					{ data: 'terjual', name: 'Terjual' },
					{ data: 'laba', name: 'Laba' }, 
					{ data: 'aksi', name: 'Aksi'}
				]
			}); 

			/**
			 * Create Data 
			 * 
			 * @param  {Form} e) {				
			 * e.preventDefault(); 				
			 * var formAction 
			 * @return void
			 */
			$('#createForm').on('submit', function(e) {

				e.preventDefault(); 
				$('#createForm button[type="submit"]').addClass('disabled'); 

				var formAction = $(this).attr('action'); 
				var data = $(this).serialize(); 
				
				$.ajax({
					url: formAction, 
					method: 'POST', 
					data: data, 
				})
				.done(function() {
					// Reset 
					$('#createForm input[name="nama"]').val('');
					$('#createForm select[name="master_barang_kategori_id"]').val('');
					$('#createForm input[name="satuan"]').val('');
					$('#createForm input[name="harga_beli"]').val('');
					$('#createForm input[name="harga_jual"]').val('');
					$('#createForm input[name="harga_jual_grosir"]').val('');
					$('#createForm input[name="min_stok"]').val('');


					$('#createForm button[type="submit"]').removeClass('disabled'); 
					
					$('#notifSuccess').fadeIn('slow'); 
					$('#notifSuccess').delay(2000); 
					$('#notifSuccess').fadeOut('slow'); 
					
					// Success Create Message
					$(document).Toasts('create', {
						autohide: true, 
						title: 'Informasi ! ', 
					  	body: 'Data berhasil disimpan'
					}) 

					table.ajax.reload(); 
				}); 
			}); 

			/**
			 * Update Data 
			 * 
			 * @param  {Form} e) {				
			 * e.preventDefault(); 				
			 * var formAction 
			 * @return void
			 */
			$('#editForm').on('submit', function(e) {
				e.preventDefault(); 
				$('#editForm button[type="submit"]').addClass('disabled'); 

				var formAction = $(this).attr('action'); 
				var data = $(this).serialize(); 
				
				$.ajax({
					url: formAction, 
					method: 'PUT', 
					data: data, 
				})
				.done(function() {
					// Reset 
					$('#editForm input[name="nama"]').val('');
					$('#editForm button[type="submit"]').removeClass('disabled');
					
					// Success Create Message
					$(document).Toasts('create', {
						autohide: true, 
						title: 'Informasi ! ', 
					  	body: 'Data berhasil disimpan'
					}) 

					table.ajax.reload(); 

					$('#editModal').modal('hide'); 
				}); 
			}); 

			/**
			 * Delete Action
			 * 
			 * @param  integer id 
			 * @return void
			 */
			$('#deleteForm').on('submit', function(e) {
				e.preventDefault(); 
				var formAction = $(this).attr('action'); 
				var data = $(this).serialize(); 
				$.ajax({
					url: formAction, 
					method: 'DELETE', 
					data: data, 
				})
				.done(function() {
					// Success Create Message
					$(document).Toasts('create', {
						autohide: true, 
						title: 'Informasi ! ', 
					  	body: 'Data berhasil dihapus'
					}) 

					table.ajax.reload(); 

					$('#deleteModal').modal('hide'); 
				}); 
			}); 
		});

		/**
		 * Edit Modal 
		 * 
		 * @param  integer id 
		 * @return void
		 */
		function editModal(id)
		{
			$.ajax({
				url: '{{ url('master-barang') }}/' + id + '/edit', 
				method: 'GET'
			})
			.done(function(row) {
				var action = '{{ url("master-barang") }}' + '/' + row.id; 
				$('#editModal input[name="nama"]').val(row.nama);
				$('#editModal select[name="master_barang_kategori_id"]').val(row.master_barang_kategori_id);
				$('#editModal input[name="satuan"]').val(row.satuan);
				$('#editModal input[name="harga_beli"]').val(row.harga_beli);
				$('#editModal input[name="harga_jual"]').val(row.harga_jual);
				$('#editModal input[name="harga_jual_grosir"]').val(row.harga_jual_grosir);
				$('#editModal input[name="min_stok"]').val(row.min_stok);
				$('#editModal #editForm').attr('action', action); 
				$('#editModal').modal('show');  
			}); 
		}

		/**
		 * Delete Confirm
		 * 
		 * @param  integer id 
		 * @return void
		 */
		function deleteConfirm(id)
		{
			$('#deleteForm input[name="id"]').val(id); 
			$('#deleteModal').modal('show'); 
		}
	</script>
@endpush