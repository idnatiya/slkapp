<script type="text/javascript">
	$(function () {

		/**
		 * Load Table Data 
		 * 
		 * @type DataTable
		 */
		var table = $('#master-barang-datatable').DataTable({
			processing: true,
			serverSide: true,
			ajax: '{{ url("master-barang-kategori-datatables") }}',
			columns: [
				{ data: 'id', name: 'Id'},
				{ data: 'nama', name: 'Nama Kategori'},
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
			url: '{{ url('master-barang-kategori') }}/' + id + '/edit', 
			method: 'GET'
		})
		.done(function(row) {
			var action = '{{ url("master-barang-kategori") }}' + '/' + row.id; 
			$('#editModal input[name="nama"]').val(row.nama);
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