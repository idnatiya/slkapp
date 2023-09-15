<script type="text/javascript">
	$(function () {

		$("#supplier_select").select2({
			placeholder: "Pilih Supplier",
    		// allowClear: true
		});

		$("#master_barang_select").select2({
			placeholder: "Pilih Barang",
    		// allowClear: true
		});

		$('#reservationdate').datetimepicker({
	        format: 'D-M-Y'
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
		var table = $('#pembelian-datatable').DataTable({
			/*searching: true,
			ordering: true,*/
			processing: true,
			serverSide: true,
			ajax: '{{ url("pembelian-datatable") }}',
			columns: [
				{ data: 'id', name: 'Id'},
				{ data: 'tanggal_pembelian', name: 'Tgl'},
				{ data: 'master_barang_id', name: 'Nama Barang'},
				{ data: 'supplier_id', name: 'Supplier'},
				{ data: 'harga_beli', name: 'Hrg Beli'},
				{ data: 'qty', name: 'Qty'},
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
				
				$('#createForm button[type="submit"]').removeClass('disabled'); 
				$('#createForm #reset_form').click(); 
				
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
		/*$('#editForm').on('submit', function(e) {
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
				$('#editForm input[name="kontak"]').val('');
				$('#editForm input[name="alamat"]').val('');
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
		}); */

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
	/*function editModal(id)
	{
		$.ajax({
			url: '{{ url('supplier') }}/' + id + '/edit', 
			method: 'GET'
		})
		.done(function(row) {
			var action = '{{ url("supplier") }}' + '/' + row.id; 
			$('#editModal input[name="nama"]').val(row.nama);
			$('#editModal input[name="kontak"]').val(row.kontak);
			$('#editModal input[name="alamat"]').val(row.alamat);
			$('#editModal #editForm').attr('action', action); 
			$('#editModal').modal('show');  
		}); 
	}*/

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