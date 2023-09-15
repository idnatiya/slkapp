@extends('index')

@section('titlepage', 'Data Transaksi Penjualan')

@section('content')
<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<strong>Data Penjualan</strong>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="penjualan-datatable" class="table table-bordered table-striped" style="width: 100%;">
							<thead>
								<tr>
									<th>Kwitansi</th>
									<th>Tanggal</th>
									<th>Nama Pembeli</th>
									<th>Total</th>
									<th style="width: 170px;">Aksi</th>
								</tr>
								<tbody>

								</tbody>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{ url('penjualan_barang/destroy') }}" method="POST" id="deleteForm">
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
	<!-- page script -->
	<script type="text/javascript">
		$(function () {
			var table = $('#penjualan-datatable').DataTable({
				/*searching: true,
				ordering: true,*/
				processing: true,
				serverSide: true,
				ajax: '{{ url("penjualan-datatable") }}',
				columns: [
					{ data: 'nomor_invoice', name: 'Kwitansi'},
					{ data: 'tanggal_penjualan', name: 'Tanggal'},
					{ data: 'nama_pembeli', name: 'Nama Pembeli'},
					{ data: 'vrekappenjualan.harga_total_jual', name: 'Total', render: $.fn.dataTable.render.number( ',', '.', 2, 'Rp. ')},
					{ data: 'aksi', name: 'Aksi'}
				]
			});

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
		function deleteConfirm(id)
		{
			$('#deleteForm input[name="id"]').val(id); 
			$('#deleteModal').modal('show'); 
		}
	</script>
@endpush