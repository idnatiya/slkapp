<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{ url('master-barang-kategori') }}" method="POST" id="createForm">
				@csrf
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Master Barang</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nama Kategori Barang</label>
						<input type="text" name="nama" class="form-control" placeholder="*Nama Kategori Barang">
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