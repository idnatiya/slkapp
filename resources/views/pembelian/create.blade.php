<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{ route('pembelian_barang.store') }}" method="POST" id="createForm">
				@csrf
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Pembelian</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Tgl Pemebelian<span class="required">*</span></label>
						{{-- <input type="text" name="tgl" class="form-control" placeholder="*Tgl Pembelian"> --}}
						<div class="input-group date" id="reservationdate" data-target-input="nearest">
	                        <input type="text" name="tgl_pembelian" class="form-control datetimepicker-input" data-target="#reservationdate" data-toggle="datetimepicker"/>
	                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
	                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
	                        </div>
	                    </div>
					</div>
					<div class="form-group">
						<label>Nama Barang<span class="required">*</span></label>
						<select name="master_barang_id" class="form-control" id="master_barang_select">
							<option></option>
							@foreach($master_barang as $data_barang)
								<option value="{{$data_barang->id}}">{{$data_barang->nama}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Nama Supplier</label>
						<select name="supplier" class="form-control" id="supplier_select">
							<option></option>
							@foreach($supplier as $data_supp)
								<option value="{{$data_supp->id}}">{{$data_supp->nama}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Harga Beli<span class="required">*</span></label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">Rp.</span>
							</div>
							<input type="text" name="harga_beli" class="form-control input-mask-currency" autocomplete="off" placeholder="Harga Beli" required>
						</div>
					</div>
					<div class="form-group">
						<label>Qty<span class="required">*</span></label>
						<input type="number" name="qty" class="form-control" placeholder="Qty">
					</div>
					<div class="alert alert-success" id="notifSuccess" style="display: none;">
						{{ __('Data berhasil disimpan') }}
					</div>
				</div>
				<div class="modal-footer">
					<input type="reset" style="display: none;" id="reset_form">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>