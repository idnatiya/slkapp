@extends('index')

@section('titlepage', 'Pembelian')

@section('content')
<!-- Main content -->
<section class="content">
	<div class="container-fluid">
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
						<table id="pembelian-datatable" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>#ID</th>
									<th>Tgl</th>
									<th>Nama Barang</th>
									<th>Supplier</th>
									<th>Hrg Beli</th>
									<th>Qty</th>
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
<!-- Modal -->
@include('pembelian.create')
<!-- Delete Modal -->
@include('pembelian.delete')

@endsection

@push('css-datatable')
	<!-- DataTables -->
	<link rel="stylesheet" href="{{asset('admin_lte')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="{{asset('admin_lte')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endpush

@push('css-select2')
	<!-- DataTables -->
	<link rel="stylesheet" href="{{asset('admin_lte')}}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{asset('admin_lte')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush



@push('js-datatable')
	<!-- DataTables -->
	<script src="{{asset('admin_lte')}}/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="{{asset('admin_lte')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="{{asset('admin_lte')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="{{asset('admin_lte')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
	<!-- page script -->
	@include('pembelian.js')
@endpush

@push('js-select2')
	<!-- Select2 -->
	<script src="{{asset('admin_lte')}}/plugins/select2/js/select2.full.min.js"></script>
@endpush

