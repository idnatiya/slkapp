@extends('index')

@section('titlepage', 'Supplier')

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
						<table id="supplier-datatable" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>#ID</th>
									<th>Nama Supplier</th>
									<th>Kontak</th>
									<th>Alamat</th>
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
@include('supplier.create')
<!-- Edit Modal -->
@include('supplier.edit')
<!-- Delete Modal -->
@include('supplier.delete')

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
	@include('supplier.js')
@endpush