@extends('index')

@section('content')
<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<form action="{{ route('penjualan.store') }}" id="formPenjualan" method="POST">
					@csrf
					<div class="card">
						<!-- /.card-header -->
						<div class="card-body">
							<div class="row">
								<div class="col-lg-4">
									<div class="form-group">
										<label>Tanggal</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="fa fa-fw fa-calendar"></i>
												</span>
											</div>
											<input type="date" name="tanggal_penjualan" class="form-control" placeholder="Tanggal Penjualan" autocomplete="off" required>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label>Nomor Invoice</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">#</span>
											</div>
											<input type="text" name="nomor_invoice" class="form-control" placeholder="Nomor Invoice" autocomplete="off" required>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label>Nama Pembeli</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="fa fa-fw fa-user"></i>
												</span>
											</div>
											<input type="text" name="nama_pembeli" class="form-control" placeholder="Nama pembeli" autocomplete="off" required>
										</div>
									</div>
								</div>
							</div>
							<hr>
							<input type="hidden" name="increment_index" value="1">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th style="width: 300px;">Barang</th>
										<th>Qty</th>
										<th>Harga Jual</th>
										<th>Diskon</th>
										<th>Total</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody id="tbody">
									<tr class="row-1">
										<td class="nama">
											<a href="#" data-toggle="modal" data-target="#addModal" data-id="1" class="btn btn-xs btn-primary">
												<i class="fa fa-fw fa-plus"></i> Tambah
											</a>
										</td>
										<td class="qty"></td>
										<td class="harga_jual"></td>
										<td class="diskon"></td>
										<td class="total"></td>
										<td class="action"></td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<td>
											<strong>GRAND TOTAL</strong>
										</td>
										<td>
											<input type="text" class="form-control total-qty" class="form-control" readonly>
										</td>
										<td>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">Rp.</span>
												</div>
												<input type="text" class="form-control total-harga_jual input-mask-currency" readonly>
											</div>
										</td>
										<td>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">Rp.</span>
												</div>
												<input type="text" class="form-control total-diskon input-mask-currency" readonly>
											</div>
										</td>
										<td colspan="2">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">Rp.</span>
												</div>
												<input type="text" class="form-control total-all input-mask-currency" readonly>
											</div>
										</td>
									</tr>
									<tr>
										<td class="text-right" colspan="4">
											<strong>TUNAI</strong>
										</td>
										<td colspan="2">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">Rp.</span>
												</div>
												<input type="text" name="tunai" class="form-control input-tunai input-mask-currency">
											</div>
										</td>
									</tr>
									<tr>
										<td class="text-right" colspan="4">
											<strong>KEMBALI</strong>
										</td>
										<td colspan="2">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">Rp.</span>
												</div>
												<input type="text" class="form-control input-kembalian input-mask-currency" readonly>
											</div>
										</td>
									</tr>
								</tfoot>
							</table>
						</div>
						<div class="card-footer text-right">
							<button type="submit" class="btn btn-success">
								<i class="fa fa-fw fa-save"></i> Simpan Transaksi
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Pilih Barang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-inline form-search" action="{{ route('pembelian.search') }}" method="POST">
					@csrf
					<input type="hidden" name="row_id">
					<div class="form-group">
						<select name="master_barang_id" class="form-control">
							<option value="">Pilih Jenis Barang</option>
							@foreach ($master_barang as $row)
								<option value="{{ $row->id }}">{{ $row->nama }}</option>
							@endforeach 
						</select>
					</div>
					<button type="submit" class="btn btn-primary">
						<i class="fa fa-fw fa-search"></i> Cari
					</button>
				</form>
				<hr>
				<div class="table-put">
					<div class="alert alert-info">
						Silahkan pilih jenis barang pada kolom pilihan diatas
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="kwitansiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Notifikasi</h5>
			</div>
			<div class="modal-body">
				Data penjualan berhasil disimpan, untuk download/cetak kwitansi silahkan tekan tombol dibawah ini 
			</div>
			<div class="modal-footer">
				<a href="" class="btn btn-kwitansi btn-block btn-success" target="_blank">
					<i class="fa fa-fw fa-print"></i> Cetak / Download Kwitansi
				</a>
			</div>
		</div>
	</div>
</div>
@endsection

@push('css-datatable')

@endpush

@push('js-datatable')
	<script type="text/javascript">

		/**
		 * Date Input 
		 * 
		 * @type Element 
		 */
		var date = $('input[name="tanggal_penjualan"]'); 

		/**
		 * On Change Date 
		 * @param e
		 * @return void
		 */
		date.on('change', function() {
			var value = $(this).val(); 
			$.ajax({
				url: '{{ route("penjualan.get-nomor") }}',
				method: 'POST', 
				data: { 
					date: value, 
					_token: '{{ csrf_token() }}'
				}
			})
			.done(function(nomor) {
				$('input[name="nomor_invoice"]').val(nomor); 
			}); 
		}); 
		
		/**
		 * Set Default Date 
		 */
		date.val('{{ date("Y-m-d") }}').change();

		/**
		 * Datepicker 
		 */
		$('.datepicker').datepicker(); 

		/**
		 * Focus On First Input 
		 * 
		 * @type void
		 */
		$('input[name="nama_pembeli"]').focus(); 

		/**
		 * Minimal Pembelian Grosir 
		 * 
		 * @type {String}
		 */
		var minimalPembelianGrosir = '{{ $konfigurasi->getConfig('minimal_pembelian_grosir') }}'; 

		$('input[name="tunai"]').on('blur', () => {
			var total = $('.total-all').val().replaceAll('.', ''); 
			if (total == "") {
				total = 0; 
			}
			var grandTotal = parseInt(total); 
			var tunai = parseInt($('input[name="tunai"]').val().replaceAll('.', '')); 
			var kembali = tunai - grandTotal; 

			$('.input-kembalian').val(kembali); 
		}); 

		$('.input-mask-currency').inputmask({ 
			alias : "currency", 
			prefix: '',
			digits: 0, 
			groupSeparator: '.' 
		});

		$('body').addClass("sidebar-collapse"); 

		/**
		 * Reset Row
		 * 
		 * @return void
		 */
		function resetRow() {
			var html = '<tr class="row-1">' +
							'<td class="nama">' +
								'<a href="#" data-toggle="modal" data-target="#addModal" data-id="1" class="btn btn-xs btn-primary">' +
									'<i class="fa fa-fw fa-plus"></i> Tambah' +
								'</a>' +
							'</td>' +
							'<td class="qty"></td>' +
							'<td class="harga_jual"></td>' +
							'<td class="diskon"></td>' +
							'<td class="total"></td>' +
							'<td class="action"></td>' +
						'</tr>'; 

			$('#tbody').html(html); 
		}

		$('#formPenjualan').on('submit', function(e) {
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
				resetRow(); 
				
				var inputs = $('tfoot input'); 
				$.each(inputs, (i, input) => {
					$(input).val(''); 
				}); 

				$('input[name="tanggal_penjualan"]').change(); 
				$('input[name="nama_pembeli"]').val('').focus(); 

				$('#kwitansiModal .btn-kwitansi').attr('href', res.kwitansi); 
				$('#kwitansiModal').modal('show'); 
			}); 
		}); 

		/**
		 * On Modal Show 
		 * 
		 * @param event 
		 * @return void
		 */
		$('#addModal').on('show.bs.modal', function(event) {
			var button = event.relatedTarget; 
			var buttonObject = $(button); 
			var id = buttonObject.data('id'); 
			$('#addModal input[name="row_id"]').val(id); 
		}); 

		/**
		 * Search Data Pembelian Barang 
		 * 
		 * @param  void
		 * @return void
		 */
		$('.form-search').on('submit', function(e) {
			e.preventDefault(); 
			var pembelianId = $('input[name="pembelian_id[]"]');
			var id = new Array(); 
			$.each(pembelianId, (i, row) => {
				id.push($(row).val()); 
			}); 

			var formAction = $(this).attr('action'); 
			var formMethod = $(this).attr('method'); 
			var data = $(this).serializeArray(); 

			data.push({
				name: 'pembelian_id', 
				value: id
			})

			$.ajax({
				url: formAction, 
				method: formMethod, 
				data: data
			})
			.done(function(html) {
				$('.table-put').html(html); 
			}); 
		}); 

		/**
		 * Grand Total 
		 * 
		 * @return void
		 */
		function grandTotal()
		{
			totalQty(); 
			totalHargaJual(); 
			totalDiskon(); 
			totalAll(); 
		}

		/**
		 * Total Qty 
		 * 
		 * @return void
		 */
		function totalQty()
		{
			var elements = $('.qty-input'); 
			var total = 0; 
			$.each(elements, function(key, value) {
				var input = parseInt($(value).val()); 
				total = total + input; 
			}); 
			$('.total-qty').val(total); 
		}

		/**
		 * Total Harga Jual
		 * 
		 * @return void
		 */
		function totalHargaJual()
		{
			var elements = $('.harga_jual-input'); 
			var total = 0; 
			$.each(elements, function(key, value) {
				var input = parseInt($(value).val().replaceAll('.', '')); 
				total = total + input; 
			}); 
			$('.total-harga_jual').val(total); 
		}	

		/**
		 * Total Diskon
		 * 
		 * @return void
		 */
		function totalDiskon()
		{
			var elements = $('.diskon-input'); 
			var total = 0; 
			$.each(elements, function(key, value) {
				var input = parseInt($(value).val().replaceAll('.', '')); 
				total = total + input; 
			}); 
			$('.total-diskon').val(total); 
		}

		/**
		 * Total All 
		 * 
		 * @return void
		 */
		function totalAll()
		{
			var elements = $('.total-input'); 
			var total = 0; 
			$.each(elements, function(key, value) {
				var input = parseInt($(value).val().replaceAll('.', '')); 
				total = total + input; 
			}); 
			$('.total-all').val(total);
		}

		/**
		 * Tambah Barang 
		 * 
		 * @param  integer
		 * @return void
		 */
		function tambahBarang(id, rowId)
		{
			var id = id; 
			var rowId = rowId; 
			$.ajax({
				url: '{{ route("pembelian.find") }}',
				method: 'POST', 
				data: { 
					id: id,
					_token: '{{ csrf_token() }}'
				}
			})
			.done(function(res) {

				var incrementIndex = $('input[name="increment_index"]');
				var now = parseInt(incrementIndex.val()); 
				var add = now + 1; 
				incrementIndex.val(add); 

				var nama = res.nama; 
				nama += '<input type="hidden" name="master_barang_id" class="master_barang_id-input" value="'+res.master_barang_id+'">';
				nama += '<input type="hidden" name="pembelian_id[]" class="pembelian_id-input" value="'+res.id+'">';

				$('.row-'+rowId+' .nama').html(nama);
				$('.row-'+rowId+' .qty').html('<input type="number" value="1" max-input-value="'+res.stok+'" name="qty[]" class="form-control qty-input" autocomplete="off" onchange="rowCalculate(\''+now+'\')">'); 
				$('.row-'+rowId+' .harga_jual').html('<div class="input-group"><div class="input-group-prepend"><span class="input-group-text">Rp.</span></div><input type="text" name="harga_jual[]" value="'+res.harga_jual+'" class="form-control harga_jual-input input-mask-currency" placeholder="Harga Jual" autocomplete="off" onchange="rowCalculate(\''+now+'\')" required></div>'); 
				$('.row-'+rowId+' .diskon').html('<div class="input-group"><div class="input-group-prepend"><span class="input-group-text">Rp.</span></div><input type="text" name="diskon[]" class="form-control diskon-input input-mask-currency" value="0" placeholder="Diskon" autocomplete="off" onchange="rowCalculate(\''+now+'\')" required></div>'); 
				$('.row-'+rowId+' .total').html('<div class="input-group"><div class="input-group-prepend"><span class="input-group-text">Rp.</span></div><input type="text" name="total" class="form-control total-input input-mask-currency" value="'+res.harga_jual+'" placeholder="Total" autocomplete="off" readonly></div>'); 
				$('.row-'+rowId+' .action').html('<button type="button" class="btn btn-sm btn-danger" onclick="deleteRow(\''+rowId+'\')"><i class="fa fa-fw fa-trash"></i></button>'); 

				add_new_row(add);

				var alert = '<div class="alert alert-info">' + 
								'Silahkan pilih jenis barang pada kolom pilihan diatas' + 
							'</div>'; 
				$('.table-put').html(alert); 
				$('#addModal select[name="master_barang_id"]').val(''); 

				$('.input-mask-currency').inputmask({ 
					alias : "currency", 
					prefix: '',
					digits: 0, 
					groupSeparator: '.' 
				}); 

				grandTotal(); 

				$('#addModal').modal('hide');		
			}); 
		}

		/**
		 * Delete Row 
		 * 
		 * @param id
		 * @return void
		 */
		function deleteRow(id) {
			$('.row-' + id).remove()
				.promise().done(function() {
					grandTotal();
				}); 
		}

		/**
		 * Row Calculate 
		 * 
		 * @param  integer
		 * @return void
		 */
		function rowCalculate(index)
		{
			var master_barang_id = $('.row-' + index + ' .master_barang_id-input');
			var pembelian_id = $('.row-' + index + ' .pembelian_id-input');
			var qty = $('.row-' + index + ' .qty-input');
			var harga_jual = $('.row-' + index + ' .harga_jual-input'); 
			var total = $('.row-' + index + ' .total-input');
			var diskon = $('.row-' + index + ' .diskon-input');

			var valQty = parseInt(qty.val());
			var valHargaJual = parseInt(harga_jual.val().replaceAll('.', ''));
			var valDiskon = parseInt(diskon.val().replaceAll('.', ''));

			var maxInputQty = parseInt(qty.attr('max-input-value')); 
			if (valQty > maxInputQty) {
				alert('Stok barang tidak mencukupi'); 
				qty.val(maxInputQty).change(); 
			} else {
				var hargaNormal = 0; 
				var hargaGrosir = 0; 

				$.ajax({
					url: '{{ route("master_barang.find") }}',
					method: 'POST', 
					async: false, 
					data: {
						_token: '{{ csrf_token() }}',
						master_barang_id: master_barang_id.val()
					}
				})
				.done(function(res) {
					hargaNormal = res.harga_jual; 
					hargaGrosir = res.harga_jual_grosir; 
				}); 

				var minimal = parseInt(minimalPembelianGrosir);
				if (valQty >= minimal) {
					valHargaJual = parseInt(hargaGrosir); 
				} else {
					valHargaJual = parseInt(hargaNormal); 
				}

				harga_jual.val(valHargaJual); 

				var ttl = (valQty * valHargaJual) - valDiskon; 

				total.val(ttl); 

				grandTotal(); 
			}
		}

		/**
		 * Add New Row 
		 * 
		 * @param integet
		 * @return void
		 */
		function add_new_row(index)
		{
			var row = '<tr class="row-'+index+'">' + 
						'<td class="nama">' + 
							'<a href="#" data-toggle="modal" data-target="#addModal" data-id="'+index+'" class="btn btn-xs btn-primary">' + 
								'<i class="fa fa-fw fa-plus"></i> Tambah' +
							'</a>' +
						'</td>' +
						'<td class="qty"></td>' +
						'<td class="harga_jual"></td>' +
						'<td class="diskon"></td>' +
						'<td class="total"></td>' +
						'<td class="action"></td>' +
					'</tr>'; 

			$('#tbody').append(row); 
		}

	</script>
@endpush