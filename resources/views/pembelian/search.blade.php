<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Tanggal Pembelian</th>
			<th>Sisa Stok</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		@php 
		$no = 1; 
		@endphp 
		@foreach ($pembelian as $row)
			<tr>
				<td>{{ $no++ }}</td>
				<td>{{ $row->tanggal_pembelian }}</td>
				<td>
					@if ($row->stokPenjualan)
						{{ $row->stokPenjualan->stok }}
					@else 
						{{ $row->qty }}
					@endif
				</td>
				<td>
					<a href="javascript::void(0)" onclick="tambahBarang('{{ $row->id }}', '{{ $row_id }}')" class="btn btn-xs btn-primary">
						<i class="fa fa-fw fa-plus"></i> Tambah
					</a>
				</td>
			</tr>
		@endforeach 
	</tbody>
</table>